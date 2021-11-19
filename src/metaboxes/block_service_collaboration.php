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
                    'name'    => 'Type',
                    'id'      => 'type',
                    'type'    => 'select',
                    'default' => 'none',
                    'show_option_none' => true,
                    'options' => [
                        'Agile always' => 'Agile always',
                        'Efficient processes' => 'Efficient processes',
                        'Direct collaboration' => 'Direct collaboration',
                        'Comms quality' => 'Comms quality',
                    ]
                ],
                [
                    'name' => 'Subtitle',
                    'id'   => 'subTitle',
                    'type' => 'text'
                ],
                [
                    'name' => 'Description',
                    'id'   => 'description',
                    'type' => 'textarea_small'
                ],
            ]
            
        ],
    ]
];
