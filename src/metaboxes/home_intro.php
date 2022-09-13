<?php

return [
    'title' => 'Home intro',
    'fields' => [
        [
            'name' => 'Title',
            'id'   => 'title',
            'type' => 'text',
        ],
        [
            'name' => 'Intro paragraph',
            'id'   => 'text',
            'type' => 'wysiwyg',
            'options' => [
              'textarea_rows' => 9
            ]
        ],
        [
            'name' => 'Client Logos',
            'id'   => 'clients',
            'type' => 'group',
            'options' => [
                'group_title'   => 'Client Logo {#}',
                'add_button'    => 'Add Client Logo',
                'remove_button' => 'Remove Client Logo',
                'sortable'      => true
            ],
            'sub_fields' => [
                [
                    'name' => 'Logo',
                    'id'   => 'logo',
                    'type' => 'file',
                    'desc' => '<a href="https://jakearchibald.github.io/svgomg" target="_blank">Compressed</a> SVGs with a stroke or fill color and an <a href="https://en-gb.wordpress.org/plugins/svg-support/">xml tag</a>, and alt tags in WordPress e.g. \'KPMG\' or \'V&A\''
                ]
            ]
        ]
    ]
];
