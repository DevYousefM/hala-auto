<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\Style;
use App\Rules\UniqueVariantCombination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OffersController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        if (request('search')) {
            $search = request("search");
            $search = str_replace("#", "", $search);
            $query->where("name", 'LIKE', "%{$search}%")
                ->orWhere("slug", 'LIKE', "%{$search}%")
                ->orWhereHas('style', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                })->orWhereHas('material', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                });
        }

        $products = $query->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'collection' => view('dashboard.products.partials._products', compact("products"))->render(),
                'pagination' => (string) $products->appends(['search' => request('search')])->links(),
            ]);
        }


        return view('dashboard.products.index', compact('products'));
    }
    public function create()
    {
        return view('dashboard.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|max:255",
            'slug' => "required|max:255|unique:products",
            'material_id' => "required|exists:materials,id",
            'style_id' => "required|exists:styles,id",
            'description' => "nullable",
            'thumbnail' => "required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096",
            'product_images' => "required|array",
            'product_images.*' => "required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096",
        ]);
        $thumbnail = ConvertAndStore($request->file('thumbnail'), "products/thumbnails/");

        $product = Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'material_id' => $request->material_id,
            'style_id' => $request->style_id,
            'description' => $request->description,
            'thumbnail' => $thumbnail,
        ]);

        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $image) {
                $product_image = ConvertAndStore($image, "products/images/");

                $product->product_images()->create([
                    'filename' => $product_image
                ]);
            }
        }

        return redirect()->route('dashboard.products.index')->with('success', 'Product created successfully');
    }
    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        $materials = Material::all();
        $styles = Style::all();
        return view('dashboard.products.edit', compact('product', 'materials', 'styles'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => "required|max:255",
            'slug' => "required|max:255|unique:products,slug," . $id,
            'material_id' => "required|exists:materials,id",
            'style_id' => "required|exists:styles,id",
            'description' => "nullable",
            'thumbnail' => "nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096",
        ]);

        $product = Product::find($id);
        if ($request->hasFile('thumbnail')) {
            $old_filename = basename($product->thumbnail);
            Storage::disk('public')->delete('products/thumbnails/' . $old_filename);

            $thumbnail = ConvertAndStore($request->file('thumbnail'), "products/thumbnails/");
            $data["thumbnail"] = $thumbnail;
        }
        $product->update($data);
        return redirect()->route('dashboard.products.index')->with('success', 'Product updated successfully');
    }
    public function uploadImage(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'product_images.*' => 'required|image|mimes:png,jpg,jpeg,gif,webp|max:4096',
        ]);

        if ($validation->fails()) {
            return response()->json(['message' => $validation->errors()->first()], 400);
        }
        $product = Product::findOrFail($id);
        $uploadedUrls = [];
        $uploadedIds = [];

        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $file) {
                $file = ConvertAndStore($file, "products/images/");
                $image = $product->product_images()->create([
                    'filename' => $file
                ]);

                $uploadedUrls[] = $image->url;
                $uploadedIds[] = $image->id;
            }
        }

        return response()->json(['urls' => $uploadedUrls, 'ids' => $uploadedIds], 200);
    }
    public function deleteImage(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'image_id' => 'required|exists:product_images,id',
        ]);

        if ($validation->fails()) {
            return response()->json(['message' => $validation->errors()->first()], 400);
        }
        $image = ProductImage::where('id', $request->image_id)->first();
        $image->delete_file();
        $image->delete();
        return response()->json(['message' => 'Product image deleted successfully']);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete_thumbnail();
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
    public function changeStatus($id)
    {
        $product = Product::findOrFail($id);
        if ($product->variants->count() == 0) {
            return response()->json(['message' => "Product don't have variants"], 400);
        }
        $product->status = $product->status == 1 ? 0 : 1;
        $product->save();
        return response()->json(['message' => 'Product status changed successfully']);
    }

    public function save_variants(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'variants.*.color_id' => 'required|exists:colors,id',
            'variants.*.size_id' => 'required|exists:sizes,id',
            'variants.*.quantity' => 'required|integer',
            'variants.*.price' => 'required|numeric',
            'variants.*.price_after_discount' => 'required|numeric',
            'variants' => new UniqueVariantCombination
        ]);
        if ($validation->fails()) {
            return response()->json(['message' => $validation->errors()->first()], 400);
        }
        $product = Product::findOrFail($id);
        $product->variants()->delete();

        foreach ($request->variants as $variant) {
            $product->variants()->create([
                'color_id' => $variant['color_id'],
                'size_id' => $variant['size_id'],
                'quantity' => $variant['quantity'],
                'price' => $variant['price'],
                'price_after_discount' => $variant['price_after_discount']
            ]);
        }
        return response()->json(['message' => 'Product variants saved successfully']);
    }
    public function delete_variant($id)
    {

        $variant = ProductVariant::findOrFail($id);
        $product = $variant->product;
        $variant->delete();
        if ($product->variants()->count() == 0) {
            $product->status = 0;
            $product->save();
        }
        return response()->json(['message' => 'Product variant deleted successfully']);
    }
}
