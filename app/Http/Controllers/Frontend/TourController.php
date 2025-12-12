<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class TourController extends Controller
{
    public function index()
    {
        return view('frontend.tour.listing');
    }
}
