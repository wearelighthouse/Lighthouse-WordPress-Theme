<?php

return [
    'title' => 'Header',
    'fields' => [
        [
            'name' => 'Text Content',
            'id'   => 'content',
            'type' => 'wysiwyg',
            'desc' => 'Use italics to indicate that text should display <b>black</b> rather than the standard <b>white</b> header text color.<br>Shift + enter puts in newlines without splitting into separate headings or paragraphs.<br>If no <b>Heading 1</b> is included, the page title will be used.',
            'options' => [
              'textarea_rows' => 9
            ]
        ],
        [
            'name' => 'Style',
            'id'   => 'style',
            'type' => 'radio',
            'default' => 'orange-pink',
            'options' => [
                'orange-pink'   => '<div class="cmb2-radio-bg cmb2-radio-bg--orange">Orange → Pink</div>',
                'gray-standard' => '<div class="cmb2-radio-bg cmb2-radio-bg--gray-standard"><span>Grey With Standard h1</div>',
                'gray-gradient' => '<div class="cmb2-radio-bg cmb2-radio-bg--gray-gradient"><span>Grey With Gradient h1</span></div>'
            ]
        ],
        [
	        'name'    => 'Custom Gradient Start', 'cmb2',
          'id'      => 'bg_color_1',
          'type'    => 'colorpicker',
          'default' => '#ffffff'
        ],
        [
	        'name'    => 'Custom Gradient End', 'cmb2',
          'id'      => 'bg_color_2',
          'type'    => 'colorpicker',
          'default' => '#ffffff'
        ],
        [
            'name' => 'Illustration',
            'id'   => 'image',
            'type' => 'file',
            'desc' => 'Large image displayed on the right of the header. 1200x1200 for case studies. Preferably <a href="https://tinypng.com/">compressed</a>!'
        ]
    ]
];
