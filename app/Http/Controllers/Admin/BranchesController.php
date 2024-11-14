<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BranchesController extends Controller
{
    public function index(Request $request)
    {
        $query = Branch::query();
        if (request('search')) {
            $search = request("search");
            $search = str_replace("#", "", $search);
            $query->whereTranslationLike("title", "%{$search}%");
        }

        $branches = $query->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'collection' => view('dashboard.branches.partials._branches', compact("branches"))->render(),
                'pagination' => (string) $branches->appends(['search' => request('search')])->links(),
            ]);
        }


        return view('dashboard.branches.index', compact('branches'));
    }
    public function create()
    {
        return view('dashboard.branches.create');
    }

    public function store(Request $request)
    {
        $rules = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules["{$localeCode}.branch_name"] = "required|max:255";
            $rules["{$localeCode}.branch_address"] = "required|max:255";
            $rules["{$localeCode}.branch_phone"] = "required|max:255";
            $rules["{$localeCode}.branch_services"] = "required|max:255";
        }
        $data = $request->validate($rules);

        Branch::create($data);
        return redirect()->route('dashboard.branches.index')->with('success', 'Branch created successfully');
    }
    public function edit(Request $request, $id)
    {
        $branch = Branch::find($id);
        return view('dashboard.branches.edit', compact('Branch'));
    }
    public function update(Request $request, $id)
    {
        $rules = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules["{$localeCode}.branch_name"] = "required|max:255";
            $rules["{$localeCode}.branch_address"] = "required|max:255";
            $rules["{$localeCode}.branch_phone"] = "required|max:255";
            $rules["{$localeCode}.branch_services"] = "required|max:255";
        }

        $data = $request->validate($rules);

        $branch = Branch::find($id);
        $branch->update($data);
        return redirect()->route('dashboard.branches.index')->with('success', 'Branch updated successfully');
    }

    public function destroy($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        return response()->json(['message' => 'Branch deleted successfully']);
    }
    public function changeStatus($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->status = $branch->status == 1 ? 0 : 1;
        $branch->save();
        return response()->json(['message' => 'Branch status changed successfully']);
    }
}
