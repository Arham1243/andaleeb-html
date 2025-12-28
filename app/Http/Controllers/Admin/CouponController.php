<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $title = 'Manage Coupons';
        $coupons = Coupon::latest()->get();
        return view('admin.coupons.list', compact('coupons', 'title'));
    }

    public function create()
    {
        $title = 'Add New Coupon';
        return view('admin.coupons.add', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:coupons,code',
            'type' => 'required|in:percentage,amount',
            'rate' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        Coupon::create([
            'title' => $request->title,
            'code' => strtoupper($request->code),
            'type' => $request->type,
            'rate' => $request->rate,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.coupons.index')->with('notify_success', 'Coupon created successfully!');
    }

    public function edit(Coupon $coupon)
    {
        $title = 'Edit Coupon - ' . $coupon->title;
        return view('admin.coupons.edit', compact('coupon', 'title'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:coupons,code,' . $coupon->id,
            'type' => 'required|in:percentage,amount',
            'rate' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $coupon->update([
            'title' => $request->title,
            'code' => strtoupper($request->code),
            'type' => $request->type,
            'rate' => $request->rate,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.coupons.index')->with('notify_success', 'Coupon updated successfully!');
    }

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with('notify_success', 'Coupon deleted successfully!');
    }

    public function changeStatus(Coupon $coupon)
    {
        $newStatus = $coupon->status === 'active' ? 'inactive' : 'active';
        $coupon->update(['status' => $newStatus]);
        return redirect()->route('admin.coupons.index')->with('notify_success', 'Coupon status changed successfully!');
    }
}
