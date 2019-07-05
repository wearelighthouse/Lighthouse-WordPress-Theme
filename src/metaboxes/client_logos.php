<?php

return [
    'title' => 'Client Logos',
    'fields' => [
        [
            'id' => 'group',
            'type' => 'group',
            'options' => [
                'group_title'   => 'Client Logo {#}',
                'add_button'    => 'Add New Logo',
                'remove_button' => 'Remove Logo',
                'sortable'      => true,
            ],
            'sub_fields' => [
                [
                    'name' => 'Logo',
                    'id'   => 'logo',
                    'type' => 'file',
                    'desc' => 'Client logos. Preferably SVGs.'
                ],
            ]
        ]
    ]
];
