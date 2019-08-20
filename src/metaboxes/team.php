<?php

return [
    'title' => 'Team Member Settings',
    'fields' => [
        /*[
            'name' => 'Colour',
            'id'   => 'color',
            'type' => 'select',
            'options' => [
                'green',
                'red',
                'orange',
                'blue'
            ]
        ],*/
        [
            'name' => 'Full Name',
            'id'   => 'name',
            'type' => 'text'
        ],
        [
            'name' => 'Title',
            'id'   => 'title',
            'type' => 'text'
        ],
        [
            'name' => 'Title short',
            'id'   => 'title_short',
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
                        'Generic',
                        'Email',
                        'Twitter',
                        'LinkedIn',
                        'Dribble',
                        'GitHub',
                        'Instagram',
                        'Stackoverflow'
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
