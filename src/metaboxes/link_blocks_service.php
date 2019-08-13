<?php

return [
    'title' => 'Service Link Blocks',
    'fields' => [
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
                    'name'    => 'Link Text',
                    'id'      => 'link_text',
                    'default' => 'Find out more',
                    'type'    => 'text_medium'
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
