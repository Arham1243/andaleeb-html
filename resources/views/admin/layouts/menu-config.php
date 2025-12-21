<?php

return [
    [
        'title' => 'Dashboard',
        'icon' => 'bx bxs-home',
        'route' => route('admin.dashboard'),
    ],
    [
        'title' => 'Users',
        'icon' => 'bx bxs-group',
        'route' => route('admin.users.index'),
    ],
    [
        'title' => 'Site Settings',
        'icon' => 'bx bxs-cog',
        'submenu' => [
            [
                'title' => 'Logo Management',
                'icon' => 'bx bx-image',
                'route' => route('admin.settings.logo'),
            ],
            [
                'title' => 'Contact & Socials',
                'icon' => 'bx bxs-contact',
                'route' => route('admin.settings.details'),
            ],
        ],
    ],
];
