<?php

if (!isset($sectorArray)) {
    $sectorArray = [];

    $sectorPosts = new WP_Query([
        'post_type' => 'sector',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1
    ]);

    foreach ($sectorPosts->posts as $sectorPost){
        $sectorArray[$sectorPost->ID]  = $sectorPost->post_title;
    }
}

return [
    'title' => 'Sector List',
    'fields' => [
        [
            'name' => 'Sector',
            'id'   => 'sector',
            'type' => 'select',
            'repeatable' => true,
            'show_option_none' => true,
            'options' => $sectorArray
        ]
    ]
];
