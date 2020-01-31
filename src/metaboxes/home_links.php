<?php

return [
    'title' => 'Home links',
    'fields' => [
        [
            'name' => 'Links',
            'id'   => 'links',
            'type' => 'group',
            'options' => [
                'group_title'   => 'Link {#}',
                'add_button'    => 'Add Link',
                'remove_button' => 'Remove Link',
                'sortable'      => true
            ],
            'sub_fields' => [
                [
                    'name' => 'Graphic',
                    'id'   => 'graphic',
                    'type' => 'file',
                    'desc' => '<a href="https://jakearchibald.github.io/svgomg" target="_blank">Compressed</a> SVGs with a stroke or fill color and an <a href="https://en-gb.wordpress.org/plugins/svg-support/">xml tag</a>, and alt tags in WordPress e.g. \'KPMG\' or \'V&A\''
                ],
                [
                    'name' => 'URL',
                    'id'   => 'url',
                    'type' => 'text_url',
                ]
            ]
        ]
    ]
];
