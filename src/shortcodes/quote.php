<?php

function quoteShortcode($atts, $content = null)
{
	// Get the lighthouse team names
	$teamPosts = new WP_Query([
	    'post_type' => 'team',
	    'post_status' => 'any, trash', // Include binned (old) Lighthouse people
	    'posts_per_page' => -1
	]);

	$teamPosts = $teamPosts->posts;

	$team = [];

	foreach ($teamPosts as $person) {
	 	$team[$person->ID] = $person->post_title;
	}

	// get Clutch score
	global $post;
	$clutch = getPostMeta('work_single_work_clutch_score', $post->ID);
	$clutchScore = '';

	$atts = shortcode_atts([
		'name' => '',
		'title' => '',
		'company' => '',
		'company_url' => ''
	], $atts);

	// is it one of us?
	$lighthouseID = array_search($atts['name'], $team);

	if ($lighthouseID !== false) {
		$image = '<div class="c-blockquote__image c-blockquote__team-image">';
		$image .= get_the_post_thumbnail($lighthouseID, 'bio-tiny');
		$image .= '</div>';

		$href = 'href="' . get_permalink($lighthouseID) . '"';

		$personTitle = getPostMeta('team_team_title', $lighthouseID);
		$personTitle = $personTitle ? '<span class="c-blockquote__title">' . $personTitle . '</span>' : '';

		$personName = '<span class="c-blockquote__name">' . $atts['name'] . '</span>';

		$clutchScore = '';
	} else {
		$image = '';
		$personName = '<span class="c-blockquote__name">' . $atts['name'] . '</span>';

		$personTitle = implode(', ', array_filter([$atts['title'], $atts['company']]));
		$personTitle = $personTitle ? '<span class="c-blockquote__title">' . $personTitle . '</span>' : '';

	  $href = $atts['company_url'] ? 'href="' . $atts['company_url'] . '" target="_blank"' : '';

		if ($clutch > 0) {
      $clutchScore = '<div class="c-clutch u-ml-auto"><div class="c-clutch__logo"></div><div class="c-clutch__score" style="width:' . (65 * (($clutch/10) * 2)) . 'px"></div></div>';
    }
	}

	if ($href) {
		$person = '<a ' . $href . ' class="c-blockquote__person">' . $image . $personName . $personTitle . '</a>';
	} else {
		$person = '<div class="c-blockquote__person">' . $image . $personName . $personTitle . '</div>';
	}

	$footer = '<footer>' . $person . $clutchScore . '</footer>';

	$quote = '<blockquote class="c-blockquote">' . wpautop($content) . $footer . '</blockquote>';

	wp_reset_query();
	return $quote;
}
