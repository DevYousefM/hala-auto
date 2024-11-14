<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->get();
        return view('landing.index', compact('sliders'));
    }
}
