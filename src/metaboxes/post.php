<?php

if (!isset($transcriptArray)) {
    $transcriptArray = [];

    $transcriptPosts = new WP_Query([
        'post_type' => 'transcript',
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1
    ]);

    foreach ($transcriptPosts->posts as $transcriptPost){
        $transcriptArray[$transcriptPost->ID]  = $transcriptPost->post_title;
    }
}

return [
    'title' => 'Article Settings',
    'fields' => [
        [
            'name' => 'Podcast embed',
            'id'   => 'podcast_embed',
            'type' => 'textarea_code'
        ],
        [
            'name' => 'Podcast transcript',
            'id'   => 'podcast_transcript',
            'type' => 'wysiwyg'
        ],
        [
            'name' => 'Featured logo',
            'id'   => 'logo',
            'type' => 'file',
            'desc' => '<a href="https://jakearchibald.github.io/svgomg" target="_blank">Compressed</a> SVGs with an <a href="https://en-gb.wordpress.org/plugins/svg-support/">xml tag</a>, and alt tags in WordPress e.g. \'KPMG\' or \'V&A\''
        ],
        [
            'name' => 'URL',
            'id'   => 'url',
            'type' => 'text_url',
        ],
        [
            'name' => 'Text',
            'id'   => 'text',
            'type' => 'text',
        ],
    ]
];
