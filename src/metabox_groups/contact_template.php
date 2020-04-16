<?php

function registerContactMetaboxes()
{

    $groupInfo = [
        'object_types' => ['page'],
        'show_on' => [
          'key' => 'page-template',
          'value' => 'template-contact.php'
        ]
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'contact_template'
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerContactMetaboxes');
