<?php

if (!isset($workArray)) {
    $workArray = [];

    $workPosts = new WP_Query([
        'post_type' => 'work',
        'posts_per_page' => -1,
    ]);

    foreach ($workPosts->posts as $workPost){
        $workArray[$workPost->ID]  = $workPost->post_title;
    }
}

return [
    'title' => 'Case Study List',
    'fields' => [
        [
            'name' => 'Client',
            'id'   => 'client',
            'type' => 'select',
            'repeatable' => true,
            'show_option_none' => true,
            'options' => $workArray
        ]
    ]
];