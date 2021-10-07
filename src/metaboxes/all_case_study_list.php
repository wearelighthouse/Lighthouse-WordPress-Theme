<?php

if (!isset($caseStudyArray)) {
    $caseStudyArray = [];

     $caseStudies = new WP_Query([
        'post_type'             => array( 'work' ),
        'post_status'           => array( 'publish', 'draft' ),
        'posts_per_page'        => '-1'
     ]);

    foreach ($caseStudies->posts as $caseStudy){
        $caseStudyArray[$caseStudy->ID]  = $caseStudy->post_title;
    }
}

return [
    'title' => 'All Case Study List',
    'fields' => [
        [
            'name' => 'Title',
            'id' => 'title',
            'type' => 'text',
            'placeholder' => 'E.g. Ideas launched...'
        ],
        [
            'name' => 'Clients',
            'id' => 'clients',
            'type' => 'select',
            'repeatable' => true,
            'show_option_none' => true,
            'options' => $caseStudyArray
        ]
    ]
];
