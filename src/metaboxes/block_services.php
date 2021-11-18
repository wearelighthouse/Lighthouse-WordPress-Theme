<?php

return [
    'title' => 'Block Services',
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
            'default' => '2-column'
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
                    'name'    => 'Type',
                    'id'      => 'type',
                    'type'    => 'select',
                    'default' => 'none',
                    'show_option_none' => true,
                    'options' => [
                        'Discovery' => 'Discovery',
                        'UX design' => 'UX design',
                        'UI Design' => 'UI Design',
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
            ]
        ],
        [
            'name' => 'Action',
            'id'   => 'action',
            'type' => 'text'
        ],
    ]
];
