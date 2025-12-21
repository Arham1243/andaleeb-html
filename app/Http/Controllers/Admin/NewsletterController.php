<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::get();
        return view('admin.newsletters.list', compact('newsletters'));
    }

    public function changeStatus(Newsletter $newsletter)
    {
        $newsletter->update([
            'status' => $newsletter->status === 'active' ? 'inactive' : 'active',
        ]);
        return redirect()->route('admin.newsletters.index')->with('notify_success', 'Newsletter status changed successfully!');
    }
}
