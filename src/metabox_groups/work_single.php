<?php

function registerWorkSingleMetaboxes()
{

    $groupInfo = [
        'object_types' => ['work']
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'work_options',
        'sector_list',
        'service_list'
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerWorkSingleMetaboxes');
