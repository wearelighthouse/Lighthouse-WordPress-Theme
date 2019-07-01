<?php

function registerPageMetaboxes()
{

    $groupInfo = [
        'object_types' => ['page'],
        'context'      => 'normal',
        'show_names'   => true
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'hero'
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerPageMetaboxes');
