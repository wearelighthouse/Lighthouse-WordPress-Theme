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
    'title' => 'Case Study List',
    'fields' => [
      [
          'name' => 'Client',
          'id'   => 'client',
          'type' => 'select',
          'repeatable' => true,
          'options' => $workArray
      ],
    ]
];
