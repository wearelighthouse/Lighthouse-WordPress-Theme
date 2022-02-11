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
            'name' => 'Mask image right',
            'id'   => 'mask_image_right',
            'type' => 'file',
        ],
        [
            'name' => 'Mask image left',
            'id'   => 'mask_image_left',
            'type' => 'file',
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
