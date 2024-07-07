<?php

return [
    'menu' => [
        [
            'label' => 'Dashboard',
            'icon' => '<span class="ti ti-dashboard fs-2"></span>',
            'url' => '/site/index',
            'encode' => false,
        ],
        [
            'label' => 'User Management',
            'icon' => '<span class="ti ti-users fs-2"></span>',
            'url' => '/user/index',
            'encode' => false,
        ],
        [
            'label' => 'Content Manager',
            'icon' => '<span class="ti ti-category fs-2"></span>',
            'url' => '/content/index',
            'encode' => false,
        ],
        [
            'label' => 'Product Manager',
            'icon' => '<span class="ti ti-box fs-2"></span>',
            'url' => '/product/index',
            'encode' => false,
        ],
        [
            'label' => 'Order Manager',
            'icon' => '<span class="ti ti-clipboard-data fs-2"></span>',
            'url' => '/order/index',
            'encode' => false,
        ],
        [
            'label' => 'System Setting',
            'icon' => '<span class="ti ti-settings fs-2"></span>',
            'url' => '/setting/index',
            'encode' => false,
        ],
        [
            'label' => 'Permissions Manage',
            'icon' => '<span class="ti ti-manual-gearbox fs-2"></span>',
            'url' => '#',
            'encode' => false,
            'items' => [
                [
                    'label' => 'Role',
                    'url' => ['/rbac/role/index']
                ],
//                [
//                    'label' => 'Auth Item Child',
//                    'url' => ['/rbac/auth-item-child/index']
//                ],
            ],
        ]
    ]
];