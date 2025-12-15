<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function index()
    {
        return view('frontend.packages.index');
    }
    public function category()
    {
        return view('frontend.packages.category');
    }
}
