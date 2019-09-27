<?php

return [
    'title' => 'Service Blocks',
    'fields' => [
        [
            'name' => 'Layout',
            'id' => 'layout',
            'type' => 'radio_inline',
            'options' => [
                'single' => 'single',
                '2-column' => '2 column',
                '3-column' => '3 column'
            ],
            'default' => '2x2'
        ],
        [
            'id' => 'group',
            'type' => 'group',
            'options' => [
                'group_title'   => 'Service {#}',
                'add_button'    => 'Add New Service',
                'remove_button' => 'Remove Service',
                'sortable'      => true
            ],
            'sub_fields' => [
                [
                    'name' => 'Service Icon',
                    'id'   => 'icon',
                    'type' => 'file',
                    'desc' => 'Preferably <a href="https://jakearchibald.github.io/svgomg" target="_blank">compressed SVGs</a>.'
                ],
                [
                    'name' => 'Title',
                    'id'   => 'title',
                    'type' => 'text'
                ],
                [
                    'name' => 'Description',
                    'id'   => 'description',
                    'type' => 'textarea_small'
                ],
                [
                    'name' => 'Link Text',
                    'id'   => 'link_text',
                    'type' => 'text_medium',
                    'desc' => 'E.g. "Find out more". Both Link Text & Link URL must be set for the the link to appear.'
                ],
                [
                    'name' => 'Link URL',
                    'id'   => 'link_url',
                    'type' => 'text_url'
                ]
            ]
        ]
    ]
];
