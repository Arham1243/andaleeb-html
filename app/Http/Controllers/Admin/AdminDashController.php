<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Tour;
use App\Models\User;

class AdminDashController extends Controller
{
    public function dashboard()
    {
        $users = User::where('status', 'active')->get();
        $data = compact('users');

        return view('admin.dashboard')->with('title', 'Dashboard')->with($data);
    }
}
