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
                    'desc' => 'Client logos or Service icons. Preferably SVGs compressed with <a href="https://jakearchibald.github.io/svgomg" target="_blank">jakearchibald.github.io/svgomg</a>.'
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
                ],
                [
                    'name' => 'Illustration BG [desktop]',
                    'id'   => 'image_bg_large',
                    'type' => 'file',
                    'desc' => 'Background image that sits inside the gray backgrounded Link Block Illustration.'
                ],
                [
                    'name' => 'Illustration FG [desktop]',
                    'id'   => 'image_fg_large',
                    'type' => 'file',
                    'desc' => 'Foreground image positioned on top of the gray backgrounded Link Block'
                ],
                [
                    'name' => 'Illustration BG [mobile]',
                    'id'   => 'image_bg_small',
                    'type' => 'file',
                    'desc' => 'Mobile (small) version of the Illusatration background'
                ],
                [
                    'name' => 'Illustration FG [mobile]',
                    'id'   => 'image_fg_small',
                    'type' => 'file',
                    'desc' => 'Mobile (small) version of the Illusatration foreground'
                ]
            ]
        ]
    ]
];
