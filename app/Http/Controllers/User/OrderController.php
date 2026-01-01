<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Country;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Get orders for this user (both authenticated and guest orders by email)
        $orders = Order::with('orderItems.tour')
            ->where(function($query) use ($user) {
                $query->where('user_id', $user->id)
                      ->orWhere('passenger_email', $user->email);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.orders.list', compact('orders'))->with('title', 'My Orders');
    }

    public function show($id)
    {
        $user = auth()->user();
        
        // Get order only if it belongs to this user (by user_id or email)
        $order = Order::with('orderItems.tour')
            ->where(function($query) use ($user) {
                $query->where('user_id', $user->id)
                      ->orWhere('passenger_email', $user->email);
            })
            ->findOrFail($id);
        
        // Get country name from country ID
        $country = null;
        if ($order->passenger_country) {
            $country = Country::find($order->passenger_country);
        }

        // Get config for tax percentages
        $config = \Illuminate\Support\Facades\View::shared('config', []);

        return view('user.orders.show', compact('order', 'country', 'config'))->with('title', 'Order ' . $order->order_number);
    }
}
