<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class TourCategoryController extends Controller
{
    public function index()
    {
        return view('frontend.tour-category.index');
    }
}
