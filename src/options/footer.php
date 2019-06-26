<?php

function registerFooterOptions()
{
    $cmb = new_cmb2_box([
    		'id'           => 'footer',
    		'title'        => 'Footer',
    		'object_types' => ['options-page'],
    		'option_key'   => 'footer',
        'position'     => 29,
    		'icon_url'     => 'dashicons-editor-insertmore'
  	]);

    $cmb->add_field([
        'name'    => 'Main Content',
    		'id'      => 'main_content',  // "content" conflicts with WP default id
    		'type'    => 'wysiwyg',
        'options' => [
            'media_buttons' => false,
            'textarea_rows' => 5
        ]
  	]);

    $cmb->add_field([
        'name'    => 'Contact Details',
        'id'      => 'contact_details_title',
        'type'    => 'title',
        'desc'    => 'Pulled from the <a href="/wp-admin/admin.php?page=contact">contact details options</a>',
        'classes' => 'cmb2-type-title--simple'
    ]);

    $cmb->add_field([
        'name' => 'Copyright Text',
        'id'   => 'copyright',
        'type' => 'text',
        'default' => 'Ⓒ 2019 Lighthouse London Studio Ltd'
    ]);

    $cmb->add_field([
        'name'    => 'Links',
        'id'      => 'links',
        'type'    => 'wysiwyg',
        'options' => [
            'media_buttons' => false,
            'textarea_rows' => 5
        ],
        'desc'    => 'Comma, newline, or paragraph separated list of links'
    ]);
}

add_action('cmb2_init', 'registerFooterOptions');
