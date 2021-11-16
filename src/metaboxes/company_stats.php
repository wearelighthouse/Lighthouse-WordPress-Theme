<?php

return [
    'title' => 'Company stats',
    'fields' => [
       [
            'id' => 'company_stats',
            'type' => 'group',
            'options' => [
                'group_title'   => 'Company {#}',
                'add_button'    => 'Add New Stats',
                'remove_button' => 'Remove Stats',
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
                        'Revenue' => 'Revenue',
                        'Size' => 'Size',
                        'Sector' => 'Sector',
                        'Audience' => 'Audience',
                        'Location' => 'Location',
                    ]
                ],
            
                [
                    'name' => 'Text',
                    'id'   => 'company-text',
                    'type' => 'text',
                ],  
            ]
        ]
    ]
];