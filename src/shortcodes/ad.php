<?php

function adShortcode($atts, $content = null)
{
	$atts = shortcode_atts([
		'id' => '',
		'align' => 'right',  // 'right' (default - Inline w/ <p>), 'left', 'center'.
		'read_more' => 'Read more'
	], $atts);

	// Get the page object
	$adPage = get_page($atts['id']);

	if (!$adPage) {
		return false;
	}

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

			// If the post we're linking to is a podcast:
			if (isset($cats[0]) && strtolower($cats[0]->name) === 'podcast') {
				$label = 'Product leadership podcast';

				// If read more text is default, get rid of it
				if ($atts['read_more'] === 'Read more') {
					$atts['read_more'] = '';
				}
			// Otherwise we assume it's a blog post
			} else {
				$label = 'Blog post';
			}
			break;
	}

	if ($label) {
		$label = '<div class="c-promo__label">' . $label . '</div>';
	}

	if ($postType !== 'work') {
		$button = '<div class="c-button c-button--underlined-light">' . $atts['read_more'] . '</div>';
	} else {
		$button = '';
	}

	$link = get_permalink($atts['id']);
	$title = '<h3 class="c-promo__title">' . $adPage->post_title . '</h3>';

  $ad = '<a href="' . $link . '" class="c-promo c-promo--' . $postType . '"><div class="c-promo__background"></div>';
	$ad .= $label . $title . wpautop($content) . $button;
	$ad .= '</a>';

	return $ad;
}
