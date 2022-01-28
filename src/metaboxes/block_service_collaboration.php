<?php

return [
    'title' => 'Service Collaboration',
    'fields' => [
        [
            'name' => 'Title',
            'id'   => 'title',
            'type' => 'text',
        ],
        [
            'id' => 'group',
            'type' => 'group',
            'options' => [
                'group_title'   => 'Type {#}',
                'add_button'    => 'Add New Type',
                'remove_button' => 'Remove Type',
                'sortable'      => true
            ],
            'sub_fields' => [
                [
                    'name' => 'Colaboration Icon',
                    'id'   => 'icon',
                    'type' => 'file',
                    'desc' => 'Preferably <a href="https://jakearchibald.github.io/svgomg" target="_blank">compressed SVGs</a>.'
                ],
                [
                    'name' => 'SubTitle',
                    'id'   => 'sub-title',
                    'type' => 'text'
                ],
                [
                    'name'    => 'Text',
                    'id'      => 'text',
                    'type'    => 'wysiwyg',
                    'options' => [
                        'media_buttons' => false,
                        'textarea_rows' => 3,
                    ],
                ],
            ]
            
        ],
    ]
];
