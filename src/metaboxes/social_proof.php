<?php

return [
    'title' => 'Social Proof',
    'fields' => [
       [
            'name' => 'Social Proofs',
            'id' => 'social_proof',
            'type' => 'group',
            'options' => [
                'group_title'   => 'Social Proof {#}',
                'add_button'    => 'Add New Social Proof',
                'remove_button' => 'Remove Social Proof',
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
                        'Manifest' => 'Manifest',
                        'Clutch' => 'Clutch',
                        'GoodFirms' => 'GoodFirms',
                        'TopDevelopers' => 'TopDevelopers',
                    ]
                ],
                [
                    'name' => 'Social proof score',
                    'id'   => 'social-proof_score',
                    'type' => 'select',
                    'show_option_none' => true,
                    'options'          => array(
                                '5'   => '5',
                                '4.5' => '4.5',
                                '4'   => '4',
                          ),
                ],
                [
                    'name' => 'Number 1',
                    'id'   => 'number-1',
                    'type' => 'text_small',
                ],
                [
                    'name' => 'Text 1',
                    'id'   => 'text-1',
                    'type' => 'text',
                ],
                [
                    'name' => 'Number 2',
                    'id'   => 'number-2',
                    'type' => 'text_small',
                ],
                [
                    'name' => 'Text 2',
                    'id'   => 'text-2',
                    'type' => 'text',
                ],   
            ]
        ]
    ]
];