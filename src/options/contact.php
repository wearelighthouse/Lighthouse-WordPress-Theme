<?php

function registerContactOptions()
{
    $cmb = new_cmb2_box([
    		'id'           => 'contact',
    		'title'        => 'Contact Details',
    		'object_types' => ['options-page'],
    		'option_key'   => 'contact',
        'position'     => 28,
    		'icon_url'     => 'dashicons-email-alt'
  	]);

    $group = $cmb->add_field([
        'show_names' => true,
        'id'      => 'group',
        'type'    => 'group',
        'show_names' => false,
        'options' => [
            'group_title'   => 'Contact Info Block {#}',
            'add_button'    => 'Add another Block',
            'remove_button' => 'Remove Block',
        		'sortable'      => true
        ],
        'classes' => 'cmb-repeat--single cmb-row--nowrap',
        'description' => 'These contact info blocks show on the home page and on the contact us page'
  	]);

    // Id's for group's fields only need to be unique for the group. Prefix is not needed.
    $cmb->add_group_field($group, [
    	'name' => 'Text',
    	'id'   => 'text',
    	'type' => 'wysiwyg',
      'options' => [
        'media_buttons' => false,
        'textarea_rows' => 4
      ]
    ]);
}

add_action('cmb2_init', 'registerContactOptions');
