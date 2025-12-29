<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartData = session()->get('cart', [
            'tours' => [],
            'applied_coupons' => [],
            'total' => [
                'subtotal' => 0,
                'discount' => 0,
                'vat' => 0,
                'service_tax' => 0,
                'tax' => 0,
                'grand_total' => 0,
            ]
        ]);

        if (empty($cartData['tours'])) {
            return redirect()->route('frontend.cart.index')
                ->with('notify_error', 'Your cart is empty. Please add some tours before checkout.');
        }

        $tours = \App\Models\Tour::whereIn('id', array_keys($cartData['tours']))->get();

        return view('frontend.checkout.index', compact('cartData', 'tours'));
    }
}
