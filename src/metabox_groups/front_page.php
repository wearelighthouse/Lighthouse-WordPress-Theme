<?php

function registerFrontPageMetaboxes()
{

    $groupInfo = [
        'object_types' => ['page'],
        'show_on'	     => ['id' => get_option('page_on_front')]
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'test'
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerFrontPageMetaboxes');
