<?php

function registerSocialOptions()
{
    $cmb = new_cmb2_box([
        'id'           => 'social',
        'title'        => 'Social',
        'object_types' => ['options-page'],
        'option_key'   => 'social',
        'position'     => 28,
        'icon_url'     => 'dashicons-twitter'
    ]);

    $cmb->add_field([
        'name'    => 'Social URLs',
        'id'      => 'socials_title',
        'type'    => 'title',
        'desc'    => 'Leaving a URL field blank will result in buttons for that specific social media network not being shown.'
    ]);

    $cmb->add_field([
        'name' => 'Twitter',
        'id' => 'twitter',
        'type' => 'text_url'
    ]);

    $cmb->add_field([
        'name' => 'Facebook',
        'id' => 'facebook',
        'type' => 'text_url'
    ]);

    $cmb->add_field([
        'name' => 'LinkedIn',
        'id' => 'linkedin',
        'type' => 'text_url'
    ]);

    $cmb->add_field([
        'name' => 'Instagram',
        'id' => 'instagram',
        'type' => 'text_url'
    ]);
}

add_action('cmb2_init', 'registerSocialOptions');
