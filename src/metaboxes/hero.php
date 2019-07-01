<?php

return [
    'title' => 'Header',
    'fields' => [
        [
            'name' => 'Text Content',
            'id'   => 'content',
            'type' => 'wysiwyg',
            'desc' => 'Use <b>bold</b> to indicate that text should display <b>black</b> rather than the standard <b>white</b> header text color',
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
        ],
        [
            'name' => 'Background Style',
            'id'   => 'background-style',
            'type' => 'radio',
            'options' => [
                'header-a' => 'Header A',
                'header-b' => 'Header B'
            ]
        ],
        [
            'name' => 'Logo',
            'id'   => 'logo',
            'type' => 'file',
            'desc' => 'Client logo or related image that sits underneath the text. Preferably an SVG with <code>fill="currentColor"</code>'
        ],
        [
            'name' => 'Illustration',
            'id'   => 'image',
            'type' => 'file',
            'desc' => 'Large image displayed on the right of the header'
        ]
    ]
];
