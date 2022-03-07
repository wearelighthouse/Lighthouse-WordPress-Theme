<?php

return [
    'title' => 'Client testimonial',
    'fields' => [
        [
            'name' => 'Quote',
            'id'   => 'quote',
            'type' => 'wysiwyg',
            'options' => [
              'textarea_rows' => 9
            ]
        ],
        [
            'name' => 'Name',
            'id'   => 'name',
            'type' => 'text',
        ],
        [
            'name' => 'Title',
            'id'   => 'title',
            'type' => 'text',
        ],
    ]
];
