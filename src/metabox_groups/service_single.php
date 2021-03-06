<?php

/**
 * Register metaboxes for the single service posts
 */
function registerServiceMetaboxes()
{
    $groupInfo = [
        'object_types' => ['service'],
        'context'      => 'after_title'
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'blocks_service',
        'case_study_list',
        'contact_us_banner',
    ], $groupID);
}

add_action('cmb2_admin_init', 'registerServiceMetaboxes');
