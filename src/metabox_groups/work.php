<?php

function registerWorkMetaboxes()
{

    $groupInfo = [
        'object_types' => ['work']
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'work'
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerWorkMetaboxes');
