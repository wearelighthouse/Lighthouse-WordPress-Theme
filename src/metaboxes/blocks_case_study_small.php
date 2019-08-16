<?php

return [
    'title' => 'Case Study Blocks (Small)',
    'fields' => [
        [
            'id' => 'intro',
            'type' => 'wysiwyg',
            'desc' => 'Use <b>Heading 3</b> as a title to the case study blocks section',
            'options' => [
              'textarea_rows' => 9
            ]
        ],
        [
            'id' => 'group',
            'type' => 'group',
            'options' => [
                'group_title'   => 'Case Study {#}',
                'add_button'    => 'Add New Case Study',
                'remove_button' => 'Remove Case Study',
                'sortable'      => true
            ],
            'sub_fields' => [
                [
                    'name' => 'Client Logo',
                    'id'   => 'logo',
                    'type' => 'file',
                    'desc' => 'Preferably <a href="https://jakearchibald.github.io/svgomg" target="_blank">compressed SVGs</a>.'
                ],
                [
                    'name' => 'Title',
                    'id'   => 'title',
                    'type' => 'text'
                ],
                [
                    'name' => 'Link URL',
                    'id'   => 'link_url',
                    'type' => 'text_url'
                ],
                [
                    'name' => 'Illustration [mobile]',
                    'id'   => 'image_fg_small',
                    'type' => 'file',
                    'desc' => 'Mobile (small) version of the foreground illustration'
                ]
            ]
        ]
    ]
];
