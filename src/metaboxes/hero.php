<?php

return [
    'title' => 'Hero',
    'fields' => [
        [
            'name' => 'Text Content',
            'id'   => 'content',
            'type' => 'wysiwyg',
            'options' => [
              'textarea_rows' => 9
            ]
        ],
        [
            'name' => 'Background Color',
            'id'   => 'background-color',
            'type' => 'radio',
            'default' => 'orange-pink',
            'options' => [
                'orange-pink' => '<div class="cmb2-radio-bg cmb2-radio-bg--orange">Orange → Pink</div>',
                'blue-turquoise' => '<div class="cmb2-radio-bg cmb2-radio-bg--blue">Blue → Turquoise</div>'
            ]
        ]
    ]
];
