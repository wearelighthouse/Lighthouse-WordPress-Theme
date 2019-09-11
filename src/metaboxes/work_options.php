<?php

return [
    'title' => 'Case Study Settings',
    'fields' => [
        [
            'name' => 'Logo',
            'id'   => 'logo',
            'type' => 'file',
            'desc' => 'Preferably a <a href="https://jakearchibald.github.io/svgomg" target="_blank">compressed</a> SVG with <code>&lt;?xml version=&quot;1.0&quot; encoding=&quot;utf-8&quot;?&gt;</code> at the start, and <code>fill="#fff"</code>'
        ],
        [
            'name' => 'Link Block Title',
            'id'   => 'link_block_title',
            'type' => 'text',
            'desc' => 'Shown in Case Study Link Blocks'
        ],
        [
            'name' => 'Illustration Background',
            'id'   => 'image_background',
            'type' => 'file',
            'desc' => 'Background image that sits inside the gray background section in Case Study Link Blocks.'
        ],
        [
            'name' => 'Illustration (Large)',
            'id'   => 'image_large',
            'type' => 'file',
            'desc' => 'Shows in large Case Study Link Blocks, and in the heeader if no header illustration is set.'
        ],
        [
            'name' => 'Illustration (Medium)',
            'id'   => 'image_medium',
            'type' => 'file',
            'desc' => 'Medium version of the illustration for small Case Study Link Blocks'
        ],
        [
            'name' => 'Illustration (Small)',
            'id'   => 'image_small',
            'type' => 'file',
            'desc' => 'Mobile (small) version of the illustration'
        ],
        [
            'name' => 'Clutch score',
            'id'   => 'clutch_score',
            'type' => 'select',
            'show_option_none' => true,
            'options'          => array(
        				'5'   => '5',
        				'4.5' => '4.5',
        				'4'   => '4',
      			),
        ],
        [
            'name' => 'Clutch URL',
            'id'   => 'clutch_url',
            'type' => 'text_url'
        ],
        [
            'id' => 'stats',
            'type' => 'group',
            'options' => [
                'group_title'   => 'Stat {#}',
                'add_button'    => 'Add Stat',
                'remove_button' => 'Remove Stat',
                'sortable'      => true,
            ],
            'sub_fields' => [
                [
                    'name' => 'Number',
                    'id'   => 'stat_number',
                    'type' => 'text_small',
                ],
                [
                    'name' => 'Text',
                    'id'   => 'stat_text',
                    'type' => 'text',
                ],
            ]
        ]
    ]
];
