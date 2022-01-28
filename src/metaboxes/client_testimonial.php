<?php

return [
    'title' => 'Client testimonial',
    'fields' => [
        [
            'name' => 'Intro paragraph',
            'id'   => 'text',
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
            'name' => 'Role',
            'id'   => 'role',
            'type' => 'text',
        ],
        [
            'name' => 'Company',
            'id'   => 'company',
            'type' => 'text',
        ],
    ]
];
