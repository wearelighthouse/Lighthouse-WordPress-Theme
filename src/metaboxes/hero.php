<?php

return [
    'title' => 'Hero',
    'fields' => [
        [
            'name' => 'Text Content',
            'id'   => 'content',
            'type' => 'wysiwyg'
        ],
        [
            'name' => 'Color',
            'id'   => 'color',
            'type' => 'radio',
            'show_option_none' => false,
            'default' => 'orange-pink',
            'options' => [
                'orange-pink' => '<div class="cmb2-radio-bg cmb2-radio-bg--orange">Orange → Pink</div>',
                'blue-turquoise' => '<div class="cmb2-radio-bg cmb2-radio-bg--blue">Blue → Turquoise</div>'
            ]
        ]
    ]
];
