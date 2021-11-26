<?php

return [
    'title' => 'Team stats',
    'fields' => [
        [
            'id' => 'team_stats',
            'type' => 'group',
            'options' => [
                'group_title'   => 'Team {#}',
                'add_button'    => 'Add New Stats',
                'remove_button' => 'Remove Stats',
                'sortable'      => true
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
        ],
    ]
];