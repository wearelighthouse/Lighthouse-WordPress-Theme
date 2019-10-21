<?php

if (!isset($transcriptArray)) {
    $transcriptArray = [];

    $transcriptPosts = new WP_Query([
        'post_type' => 'transcript',
        'posts_per_page' => -1,
    ]);

    foreach ($transcriptPosts->posts as $transcriptPost){
        $transcriptArray[$transcriptPost->ID]  = $transcriptPost->post_title;
    }
}

return [
    'title' => 'Article Settings',
    'fields' => [
        [
            'name' => 'Podcast embed',
            'id'   => 'podcast_embed',
            'type' => 'textarea_code'
        ],
        [
            'name' => 'Transcript',
            'id'   => 'transcript',
            'type' => 'select',
            'show_option_none' => true,
            'options' => $transcriptArray
        ]
    ]
];
