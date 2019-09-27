<?php

/**
 * Register metaboxes for service posts
 */
function registerServiceMetaboxes()
{

    $groupInfo = [
        'object_types' => ['service']
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'blocks_service',
        'case_study_list',
        'contact_us_banner',
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerServiceMetaboxes');

/**
 * Register metaboxes for service archive page
 */
 