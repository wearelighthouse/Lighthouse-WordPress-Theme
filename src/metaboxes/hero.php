<?php

return [
    'title' => 'Header',
    'fields' => [
        [
            'name' => 'Text Content',
            'id'   => 'content',
            'type' => 'wysiwyg',
            'desc' => 'Use italics to indicate that text should display <b>black</b> rather than the standard <b>white</b> header text color.<br>Use shift + enter for putting in newlines without splitting into separate headings or paragraphs!',
            'options' => [
              'textarea_rows' => 9
            ]
        ],
        [
            'name' => 'Background Color',
            'id'   => 'background-color',
            'type' => 'radio',
            'default' => 'placeholder',
            'options' => [
                'placeholder' => '<div class="cmb2-radio-bg cmb2-radio-bg--gray">Placeholder</div>',
                'orange-pink' => '<div class="cmb2-radio-bg cmb2-radio-bg--orange">Orange → Pink</div>',
                'blue-turquoise' => '<div class="cmb2-radio-bg cmb2-radio-bg--blue">Blue → Turquoise</div>',
                'grey' => '<div class="cmb2-radio-bg cmb2-radio-bg--blue">Grey → Other Grey?</div>'
            ]
        ],
        [
	        'name'    => 'Background colour 1', 'cmb2',
			'id'      => 'background_colour_1',
			'type'    => 'colorpicker',
			'default' => '#ffffff',
        ],
        [
	        'name'    => 'Background colour 2', 'cmb2',
			'id'      => 'background_colour_2',
			'type'    => 'colorpicker',
			'default' => '#ffffff',
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
