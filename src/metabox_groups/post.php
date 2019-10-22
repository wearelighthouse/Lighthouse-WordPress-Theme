<?php

function registerPostMetaboxes()
{

    $groupInfo = [
        'object_types' => ['post'],
        'context'      => 'after_title'
    ];

    $groupID = basename(__FILE__, '.php');

    addMetaboxes($groupInfo, [
        'post',
    ], $groupID);

}

add_action('cmb2_admin_init', 'registerPostMetaboxes');
