<?php

return [
    'title' => 'Contact Template Options',
    'fields' => [
        [
            'id' => 'blocks',
            'type' => 'group',
            'options' => [
                'group_title'   => 'Block {#}',
                'add_button'    => 'Add New Block',
                'remove_button' => 'Remove Block',
                'sortable'      => true
            ],
            'sub_fields' => [
                [
                    'name'    => 'Type',
                    'id'      => 'type',
                    'type'    => 'select',
                    'default' => 'Generic',
                    'options' => [
                        'Generic' => 'Generic',
                        'Email' => 'Email',
                        'Dribbble' => 'Dribbble',
                        'GitHub' => 'GitHub',
                        'Instagram' => 'Instagram',
                        'LinkedIn' => 'LinkedIn',
                        'Location' => 'Location',
                        'Twitter' => 'Twitter'
                    ]
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
                    'name' => 'Link URL',
                    'id'   => 'link_url',
                    'type' => 'text_url'
                ]
            ]
        ]
    ]
];
