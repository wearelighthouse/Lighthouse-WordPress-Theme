<?php

return [
    'title' => 'Case Study Settings',
    'fields' => [
        [
            'name' => 'Large image',
            'id'   => 'image_large',
            'type' => 'file'
        ],
        [
            'name' => 'Medium image',
            'id'   => 'image_medium',
            'type' => 'file'
        ],
		[
            'name' => 'Small image',
            'id'   => 'image_small',
            'type' => 'file'
        ],
        [
            'name' => 'URL',
            'id'   => 'url',
            'type' => 'text_url'
        ],
        [
            'name' => 'URL text',
            'id'   => 'url_text',
            'type' => 'text_medium'
        ],
        [
            'name' => 'Clutch score',
            'id'   => 'clutch_score',
            'type' => 'select',
            'show_option_none' => true,
            'options'          => array(
				'5' => '5',
				'4.5'   => '4.5',
				'4'     => '4',
			),
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