<?php

function registerSectorMetaboxes()
{

    $groupInfo = [
        'object_types' => ['sector']
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'case_study_list'
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerSectorMetaboxes');
