<?php
// Admin menu items

return [

    'menu1' => [
        'url' => "admin.dashboard",
        'icon' => 'tachometer-alt',
        'title' => 'Dashboard',
        'is_submenu' => false
    ],

    'menu2' => [
        'url' => '#',
        'icon' => 'folder',
        'title' => 'Category',
        'is_submenu' => true,
        'child_menus' => [
            'child1' => [
                'title' => 'List',
                'url' => 'admin.category.index'
            ],
            'child2' => [
                'title' => 'Add',
                'url' => 'admin.category.create'
            ]
        ]
    ]

];
