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
                'sortable'      => true,
            ],
            'sub_fields' => [
                [
                    'name' => 'Social proof icon',
                    'id'   => 'icon',
                    'type' => 'file',
                    'desc' => '<a href="https://jakearchibald.github.io/svgomg" target="_blank">Compressed</a> SVGs with an <a href="https://en-gb.wordpress.org/plugins/svg-support/">xml tag</a>, and alt tags in WordPress e.g. \'KPMG\' or \'V&A\''
                ],
                [
                    'name' => 'Social proof score',
                    'id'   => 'score',
                    'type' => 'select',
                    'show_option_none' => true,
                    'options'          => [
                        '5'   => '5',
                        '4.5' => '4.5',
                        '4'   => '4',
                    ],
                ],
                [
                    'name' => 'Text',
                    'id'   => 'text',
                    'type' => 'wysiwyg',
                    'options' => [
                        'media_buttons' => false,
                        'textarea_rows' => 3,
                    ],
                ],
                [
                    'name' => 'URL',
                    'id'   => 'url',
                    'type' => 'text_url',
                ],
            ]
        ]
    ]
];
