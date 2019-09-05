<?php

function registerSectorPostType()
{

    $supports = [
        'title',
        'editor',
        'excerpt'
    ];

    register_post_type('sector', [
        'labels' => [
            'name' => 'Sector',
            'singular_name' => 'Sector',
            'menu_name' => 'Sectors',
            'add_new' => 'Add New Sector',
            'add_new_item' => 'Add New Sector',
            'edit_item' => 'Edit Sector'
        ],
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'sector',
            'with_front' => false
        ],
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-carrot',
        'supports' => $supports,
        'taxonomies' => [],
        'hierarchical' => true
    ]);

}

add_action('init', 'registerSectorPostType');
