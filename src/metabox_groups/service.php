<?php

function registerServiceMetaboxes()
{

    $groupInfo = [
        'object_types' => ['service']
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'blocks_service',
        'blocks_case_study_small',
        'contact_us_banner',
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerServiceMetaboxes');
