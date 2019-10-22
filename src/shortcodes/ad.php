<?php

function adShortcode($atts, $content = null)
{
	$atts = shortcode_atts([
		'id' => '',
		'align' => 'right',  // 'right' (default - Inline w/ <p>), 'left', 'center'.
	], $atts);

	// Get the page object
	$adPage = get_page($atts['id']);

	// Figure out the post type
	$postType = $adPage->post_type;

	// The orange text at the top of the ad
	$label = '';

	switch ($postType) {
		case 'service':
			$label = 'Our services';
			break;
		case 'post':
			$cats = get_the_category($atts['id']);
			if (isset($cats[0]) && $cats[0] === 'podcast') {
				$label = 'Product leadership podcast';
			} else {
				$label = 'Blog post';
			}
			break;
	}

	if ($label) {
		$label = '<div class="c-ad__label">' . $label . '</div>';
	}

	if ($postType !== 'work') {
		$button = '<div class="c-button c-button--underlined-light">Read more</div>';
	} else {
		$button = '';
	}

	$link = get_permalink($atts['id']);
	$title = '<h3 class="c-ad__title">' . $adPage->post_title . '</h3>';

  $ad = '<a href="' . $link . '" class="c-ad c-ad--' . $postType . '"><div class="c-ad__background"></div>';
	$ad .= $label . $title . wpautop($content) . $button;
	$ad .= '</a>';

	return $ad;
}
