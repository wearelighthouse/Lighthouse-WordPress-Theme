<?php

return [
    'title' => 'Link Blocks',
    'fields' => [
        [
            'id' => 'group',
            'type' => 'group',
            'options' => [
                'group_title'   => 'Link Block {#}',
                'add_button'    => 'Add New Link Block',
                'remove_button' => 'Remove Link Block',
                'sortable'      => true
            ],
            'sub_fields' => [
                [
                    'name'    => 'Type',
                    'id'      => 'type',
                    'type'    => 'radio_inline',
                    'default' => 'case-study',
                    'options' => [
                        'case-study' => 'Case Study',
                        'service' => 'Service'
                    ]
                ],
                [
                    'name' => 'Logo',
                    'id'   => 'logo',
                    'type' => 'file',
                    'desc' => 'Client logos or Service icons. Preferably SVGs.'
                ],
                [
                    'name' => 'Illustration Small',
                    'id'   => 'illustration_small',
                    'type' => 'file'
                ],
                [
                    'name' => 'Illustration Large',
                    'id'   => 'illustration_large',
                    'type' => 'file'
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
