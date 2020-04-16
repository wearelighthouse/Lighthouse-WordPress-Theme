<?php

function registerTranscriptPostType()
{

    $supports = [
        'title',
        'editor'
    ];

    register_post_type('transcript', [
        'labels' => [
            'name' => 'Podcast Transcripts',
            'menu_name' => 'Transcripts',
            'add_new' => 'Add New Transcript',
            'add_new_item' => 'Add New Transcript',
            'edit_item' => 'Edit Transcript'
        ],
        'has_archive' => false,
        'rewrite' => [
            'slug' => 'transcript',
            'with_front' => false
        ],
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-testimonial',
        'supports' => $supports,
        'taxonomies' => [],
        'hierarchical' => true
    ]);

}

add_action('init', 'registerTranscriptPostType');
