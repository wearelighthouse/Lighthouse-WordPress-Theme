<?php

return [
    'title' => 'Team Member Settings',
    'fields' => [
        [
            'name' => 'Job Title',
            'id'   => 'title',
            'type' => 'text'
        ],
        [
            'name' => 'Social',
            'id'   => 'social',
            'type' => 'group',
            'options' => [
                'group_title'   => 'Social Link {#}',
                'add_button'    => 'Add New Social Link',
                'remove_button' => 'Remove Social Link',
            		'sortable'      => true,
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
                        'Phone' => 'Phone',
                        'Twitter' => 'Twitter'
                    ]
                ],
                [
                    'name' => 'Link',
                    'id'   => 'link',
                    'type' => 'text'
                ]
            ]
        ]
    ]
];
