<?php

function quoteShortcode($wp_atts, $content = null)
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
	$clutch = getPostMeta('work_single_work_options_clutch_score', $post->ID);
	$clutchScore = '';

	$atts = shortcode_atts([
		'name' => '',
		'title' => '',
		'company' => '',
		'company_url' => '',
		'width' => ''
	], $wp_atts);

	if ($atts['name']) {
		// is it one of us?
		$lighthouseID = array_search($atts['name'], $team);

		if ($lighthouseID !== false) {
			$class = 'c-blockquote c-blockquote--lighthouse';
			$image = '<div class="c-blockquote__image c-blockquote__team-image">';
			$image .= get_the_post_thumbnail($lighthouseID, 'bio-tiny');
			$image .= '</div>';

			$href = 'href="' . get_permalink($lighthouseID) . '"';

			$personTitle = getPostMeta('team_team_title', $lighthouseID);
			$personTitle = $personTitle ? '<div class="c-blockquote__title">' . $personTitle . '</div>' : '';

			$personName = '<div class="c-blockquote__name">' . $atts['name'] . '</div>';

			$clutchScore = '';
		} else {
			$class = 'c-blockquote c-blockquote--client ';
			$image = '';
			$personName = '<div class="c-blockquote__name">' . $atts['name'] . '</div>';

			$personTitle = implode(', ', array_filter([$atts['title'], $atts['company']]));
			$personTitle = $personTitle ? '<div class="c-blockquote__title">' . $personTitle . '</div>' : '';

			$href = $atts['company_url'] ? 'href="' . $atts['company_url'] . '" target="_blank"' : '';

			if (!in_array('disable_clutch', $wp_atts) && $clutch > 0) {
				$clutchScore = '<div class="c-clutch"><div class="c-clutch__logo"></div><div class="c-clutch__score" style="width:' . (65 * (($clutch/10) * 2)) . 'px"></div></div>';
			}
		}

		if ($href) {
			$person = '<a ' . $href . ' class="c-blockquote__person">' . $image . '<div class="c-blockquote__text">' . $personName . $personTitle . '</div></a>';
		} else {
			$person = '<div class="c-blockquote__person">' . $image . '<div class="c-blockquote__text">' . $personName . $personTitle . '</div></div>';
		}

		$footer = '<footer>' . $person . $clutchScore . '</footer>';
	} else {
		$class = 'c-blockquote c-blockquote--unattributed';
		$footer = '';
	}

	if ($atts['width']) {
		$fullWidth = 'c-blockquote--full-width';
	}

	$quote = '<blockquote class="' . $class . ' ' . $fullWidth . '">' . wpautop($content) . $footer . '</blockquote>';

	wp_reset_query();
	return $quote;
}
