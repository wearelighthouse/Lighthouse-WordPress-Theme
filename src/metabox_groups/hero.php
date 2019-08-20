<?php

function registerHeroMetaboxes()
{

    $groupInfo = [
        'object_types' => ['page', 'service', 'work', 'team'],
        'context'      => 'after_title',
        'exclude_ids'  => [], // Exclude metabox on these post-ids
      	'show_on_cb'   => 'cmb2_exclude_for_ids' // function should return a bool value
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'hero',
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerHeroMetaboxes');
