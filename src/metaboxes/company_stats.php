<?php

return [
    'title' => 'Company stats',
    'fields' => [
        [
            'name' => 'Company Title',
            'id'   => 'company',
            'type' => 'text'
        ],
        [
            'id' => 'company_stats',
            'type' => 'group',
            'options' => [
                'group_title'   => 'Stats {#}',
                'add_button'    => 'Add New Stats',
                'remove_button' => 'Remove Stats',
                'sortable'      => true
            ],
            'sub_fields' => [
                [
                    'name' => 'Stat Icon',
                    'id'   => 'company_icon',
                    'type' => 'file',
                    'desc' => 'Preferably <a href="https://jakearchibald.github.io/svgomg" target="_blank">compressed SVGs</a>.'
                ],
                [
                    'name' => 'Text',
                    'id'   => 'company_text',
                    'type' => 'text',
                ],
            ]
        ],
    ]
];