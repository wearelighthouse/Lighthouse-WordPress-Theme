<?php

function registerPifPostType()
{

    $supports = [
        'title',
        'editor',
        'excerpt'
    ];

    register_post_type('pif', [
        'labels' => [
            'name' => 'PIF',
            'singular_name' => 'PIF',
            'menu_name' => 'PIF',
            'add_new' => 'Add New Chapter',
            'add_new_item' => 'Add New Chapter',
            'edit_item' => 'Edit PIF Chapter'
        ],
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'pif',
            'with_front' => false
        ],
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-album',
        'supports' => $supports,
        'taxonomies' => [],
        'hierarchical' => true
    ]);

}

add_action('init', 'registerPifPostType');
