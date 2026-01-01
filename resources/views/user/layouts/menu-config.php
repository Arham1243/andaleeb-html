<?php

use Illuminate\Support\Facades\Auth;

$user = Auth::user();

$menu = [
    [
        'title' => 'Dashboard',
        'icon' => 'bx bxs-home',
        'route' => route('user.dashboard'),
    ],
    [
        'title' => 'My Orders',
        'icon' => 'bx bxs-shopping-bag',
        'route' => route('user.orders.index'),
    ],
];

if ($user && $user->auth_provider !== 'google') {
    $menu[] = [
        'title' => 'Account Settings',
        'icon' => 'bx bxs-cog',
        'submenu' => [
            [
                'title' => 'Change Password',
                'icon' => 'bx bx-key',
                'route' => route('user.profile.changePassword'),
            ],
        ],
    ];
}

return $menu;