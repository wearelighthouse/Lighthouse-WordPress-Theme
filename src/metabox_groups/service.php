<?php

function registerServiceMetaboxes()
{

    $groupInfo = [
        'object_types' => ['service']
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'test'
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerServiceMetaboxes');
