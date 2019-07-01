<?php

function registerWorkPostType()
{

    $supports = [
        'title',
        'editor'
    ];

    register_post_type('work', [
        'labels' => [
            'name' => 'Case Study',
            'singular_name' => 'Case Study',
            'menu_name' => 'Case Studies',
            'add_new' => 'Add New Case Study',
            'add_new_item' => 'Add New Case Study',
            'edit_item' => 'Edit Case Study'
        ],
        'has_archive' => true,
        'rewrite' => [
            'slug' => 'our-work',
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

add_action('init', 'registerWorkPostType');
