<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsAndConditions;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TermsAndConditionsController extends Controller
{
    public function index()
    {
        $terms = TermsAndConditions::first();
        if (!$terms) {
            $terms = TermsAndConditions::create([]);
        }
        return view('dashboard.terms.edit', compact('terms'));
    }

    public function update(Request $request, $id)
    {
        $rules = [];
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            $rules["{$localeCode}.content"] = "required";
        }
        $data = $request->validate($rules);
        // return $data;
        $terms = TermsAndConditions::first();
        if (!$terms) {
            abort(404);
        }

        $terms->update($data);

        return redirect()->route('dashboard.terms.index', $terms->id)->with('success', 'Terms and conditions updated successfully!');
    }
}
