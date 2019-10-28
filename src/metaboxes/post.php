<?php

if (!isset($transcriptArray)) {
    $transcriptArray = [];

    $transcriptPosts = new WP_Query([
        'post_type' => 'transcript',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1
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
        ]
    ]
];
