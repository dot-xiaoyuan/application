<?php

return [
    'menu' => [
        [
            'label' => 'Dashboard',
            'icon' => '<span class="ti ti-dashboard fs-1"></span>',
            'url' => ['/site/index'],
            'encode' => false,
        ],
        [
            'label' => 'User Management',
            'icon' => '<span class="ti ti-users fs-1"></span>',
            'url' => ['/user/index'],
            'encode' => false,
        ],
        [
            'label' => 'Content Manager',
            'icon' => '<span class="ti ti-category fs-1"></span>',
            'url' => ['/content/index'],
            'encode' => false,
        ],
        [
            'label' => 'Product Manager',
            'icon' => '<span class="ti ti-box fs-1"></span>',
            'url' => ['/product/index'],
            'encode' => false,
        ],
        [
            'label' => 'Order Manager',
            'icon' => '<span class="ti ti-clipboard-data fs-1"></span>',
            'url' => ['/order/index'],
            'encode' => false,
        ],
        [
            'label' => 'System Setting',
            'icon' => '<span class="ti ti-settings fs-1"></span>',
            'url' => ['/setting/index'],
            'encode' => false,
        ],
    ]
];