<?php

function registerTeamPostType()
{

    $supports = [
        'title',
        'editor',
        'thumbnail',
        'page-attributes',
    ];

    register_post_type('team', [
        'labels' => [
            'name' => 'Team',
            'singular_name' => 'Team Member',
            'menu_name' => 'Team',
            'add_new' => 'Add New Team Member',
            'add_new_item' => 'Add New Team Member',
            'edit_item' => 'Edit Team Member'
        ],
        'has_archive' => false,
        'rewrite' => [
            'slug' => 'team',
            'with_front' => false
        ],
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => $supports,
        'taxonomies' => [],
        'hierarchical' => true
    ]);

}

add_action('init', 'registerTeamPostType');
