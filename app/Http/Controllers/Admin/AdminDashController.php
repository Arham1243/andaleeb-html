<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;

class AdminDashController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        return view('admin.dashboard', ['title' => 'Dashboard', 'users' => $users]);
    }
}
