<?php

function registerServicePostType()
{

    $supports = [
        'title',
        'editor'
    ];

    register_post_type('service', [
        'labels' => [
            'name' => 'Service',
            'singular_name' => 'Service',
            'menu_name' => 'Services',
            'add_new' => 'Add New Service',
            'add_new_item' => 'Add New Service',
            'edit_item' => 'Edit Service'
        ],
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'services',
            'with_front' => false
        ],
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-image-filter',
        'supports' => $supports,
        'taxonomies' => [],
        'hierarchical' => true
    ]);

}

add_action('init', 'registerServicePostType');
