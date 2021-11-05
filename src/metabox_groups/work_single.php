<?php

/**
 * Register metaboxes for the single work (i.e. case study) posts
 */
function registerWorkSingleMetaboxes()
{
    $groupInfo = [
        'object_types' => ['work']
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'work_options',
        'sector_list',
        'service_list',
        'company_stats',
        'team_stats'
    ], $groupID);
}

add_action('cmb2_admin_init', 'registerWorkSingleMetaboxes');
