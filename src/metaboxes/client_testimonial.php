<?php

return [
    'title' => 'Client testimonial',
    'fields' => [
        [
            'name' => 'Title',
            'id'   => 'title',
            'type' => 'text',
        ],
        [
            'name' => 'Intro paragraph',
            'id'   => 'text',
            'type' => 'wysiwyg',
            'options' => [
              'textarea_rows' => 9
            ]
        ],
    ]
];
