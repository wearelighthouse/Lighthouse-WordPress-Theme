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
		case 'work':
			$logoId = getPostMeta('work_single_work_options_logo_id', $atts['id']);
			$logoSrc = $logoId ? getPostMeta('work_single_work_options_logo', $atts['id']) : false;
			if ($logoSrc) {
				$logoAlt = get_post_meta($logoId, '_wp_attachment_image_alt', true);
				$logoAltAttr = $logoAlt ? 'alt="' . $logoAlt . '"' : '';
				$logoMeta = wp_get_attachment_metadata($logoId);
				$logoMask = "-webkit-mask-image: url({$logoSrc}); mask-image: url({$logoSrc}); width: {$logoMeta['width']}px; height: {$logoMeta['height']}px";
				$logo = '<div class="c-case-study-block__logo" style="' . $logoMask . '"></div>';
			}
			break;
	}

	if ($label) {
		$label = '<div class="c-promo__label">' . $label . '</div>';
	}

	$link = get_permalink($atts['id']);

  $ad = '<a href="' . $link . '" class="c-promo c-promo--' . $postType . '"><div class="c-promo__background"></div>';

	if ($postType === 'work') {
		$button = '<div class="c-button c-button--underlined-dark">' . $atts['read_more'] . '</div>';
		$title = '<h3 class="c-promo__work-title">' . (($content && $content !== '') ? $content : $adPage->post_title) . '</h3>';
		$imgMediumId = getPostMeta('work_single_work_options_image_medium_id', $atts['id']);
		$img = '<div class="c-promo__side-image">' . wp_get_attachment_image($imgMediumId, 'link-block-case-study-fg-medium') . '</div>';
		$ad .= $img . $logo . $title . $button;
	} else {
		$button = '<div class="c-button c-button--underlined-light">' . $atts['read_more'] . '</div>';
		$title = '<h3 class="c-promo__title">' . $adPage->post_title . '</h3>';
		$ad .= ($logo ? $logo : $label) . $title . wpautop($content) . $button;
	}

	$ad .= '</a>';

	return $ad;
}
