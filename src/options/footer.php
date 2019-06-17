<?php

function registerFooterOptions()
{
    $cmb = new_cmb2_box([
    		'id'           => 'footer',
    		'title'        => 'Footer',
    		'object_types' => ['options-page'],
    		'option_key'   => 'footer',
        'position'     => 28,
    		'icon_url'     => 'dashicons-editor-insertmore'
  	]);

    $cmb->add_field([
        'name'    => 'Main content',
        'id'      => 'content_title',
        'type'    => 'title'
    ]);

    $cmb->add_field([
        'show_names' => false,
    		'name'    => 'Main Content',
    		'id'      => 'content',
    		'type'    => 'wysiwyg',
        'options' => [
            'media_buttons' => false,
            'editor_css' => '<script>background-color: blue;</script>',
            'textarea_rows' => 5,
        ]
  	]);

    $cmb->add_field([
        'name' => 'Copyright Text',
        'id'   => 'copyright_text',
        'type' => 'text',
        'default' => 'Ⓒ 2019 Lighthouse London Studio Ltd'
    ]);
}

add_action('cmb2_init', 'registerFooterOptions');
