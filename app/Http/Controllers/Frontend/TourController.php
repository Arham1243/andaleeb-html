<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class TourController extends Controller
{
    public function uae_services()
    {
        return view('frontend.uae-services');
    }

    public function holiday_packages()
    {
        return view('frontend.holiday-packages');
    }
}
