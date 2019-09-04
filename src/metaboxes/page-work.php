<?php

$args = [
  'post_type' => 'work',
  'posts_per_page' => -1,
];

$workPosts = new WP_Query($args);
$workArray = [];

foreach ($workPosts->posts as $workPost){
  $workArray[$workPost->ID]  = $workPost->post_title;
}

return [
    'title' => 'Work page Settings',
    'fields' => [
      [
          'name' => 'Client',
          'id'   => 'case_study',
          'type' => 'select',
          'repeatable' => true,
          'options' => $workArray
      ],
    ]
];
