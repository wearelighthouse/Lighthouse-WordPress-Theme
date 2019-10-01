<?php

function registerTeamMetaboxes()
{

    $groupInfo = [
        'object_types' => ['team'],
        'context'      => 'after_title'
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'team'
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerTeamMetaboxes');
