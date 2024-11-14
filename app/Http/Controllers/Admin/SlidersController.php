<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SlidersController extends Controller
{
    public function index(Request $request)
    {
        $query = Slider::query();
        if (request('search')) {
            $search = request("search");
            $search = str_replace("#", "", $search);
            $query->where("title", 'LIKE', "%{$search}%");
        }

        $sliders = $query->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'collection' => view('dashboard.sliders.partials._sliders', compact("sliders"))->render(),
                'pagination' => (string) $sliders->appends(['search' => request('search')])->links(),
            ]);
        }


        return view('dashboard.sliders.index', compact('sliders'));
    }
    public function create()
    {
        return view('dashboard.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => "required|max:255",
            'image' => "required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096",
        ]);
        $slide_image = ConvertAndStore($request->file('image'), "sliders/images/");

        $slider = Slider::create([
            'title' => $request->title,
            'image' => $slide_image,
        ]);

        return redirect()->route('dashboard.sliders.index')->with('success', 'Slider created successfully');
    }
    public function edit(Request $request, $id)
    {
        $slider = Slider::find($id);
        return view('dashboard.sliders.edit', compact('slider'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => "required|max:255",
            'image' => "required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096",
        ]);

        $slider = Slider::find($id);
        if ($request->hasFile('image')) {
            $slider->delete_image();

            $slide_image = ConvertAndStore($request->file('image'), "sliders/images/");
            $data["image"] = $slide_image;
        }
        $slider->update($data);
        return redirect()->route('dashboard.sliders.index')->with('success', 'Slider updated successfully');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete_image();
        $slider->delete();
        return response()->json(['message' => 'Slider deleted successfully']);
    }
    public function changeStatus($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->status = $slider->status == 1 ? 0 : 1;
        $slider->save();
        return response()->json(['message' => 'Slider status changed successfully']);
    }
}
