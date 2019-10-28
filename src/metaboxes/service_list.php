<?php

if (!isset($serviceArray)) {
    $serviceArray = [];

    $servicePosts = new WP_Query([
        'post_type' => 'service',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1
    ]);

    foreach ($servicePosts->posts as $servicePost){
        $serviceArray[$servicePost->ID]  = $servicePost->post_title;
    }
}

return [
    'title' => 'Service List',
    'fields' => [
        [
            'name' => 'Service',
            'id'   => 'service',
            'type' => 'select',
            'repeatable' => true,
            'show_option_none' => true,
            'options' => $serviceArray
        ]
    ]
];
