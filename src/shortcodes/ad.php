<?php

function adShortcode($atts, $content = null)
{

	// get the vars
	extract(shortcode_atts(array(
		'id' => '',
		'text' => '',
		'align' => '',
	), $atts));

	// Get the page
	$adPage = get_page($id);

	$adAlign = $align == 'center' ? 'center' : 'left';

	switch ($align) {
		case 'center':
			$adAlign = 'center';
			break;
		case 'left':
			$adAlign = 'left';
			break;
		default:
			$adAlign = 'right';

	}

	$adType = $adPage->post_type == 'work' ? ' ad__service' : ' ad__work';

	$ad = '<div class="ad ad__' . $adAlign . $adType . '">';
	$ad .= '<div class="ad__content">';

	if ($adPage->post_type == 'work') {
  	// get case study block

	} else {
		$ad .= '<p class="ad__sub-title">What we do</p>';
		$ad .= '<h3>' . $adPage->post_title . '</h3>';
  	$ad .= '<p>' . strip_tags($text) . '</p>';
  	$ad .= '<a href="' . get_permalink($id) . '">Read more</a>';
	}

  $ad .= '</div></div>';

	wp_reset_query();
	return $ad;
}
