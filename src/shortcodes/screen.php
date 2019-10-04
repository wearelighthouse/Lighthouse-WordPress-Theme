<?php

function screenShortcode($atts)
{

  $atts = shortcode_atts([
		'id' => '',            // attachment id or array of ids
		'device' => 'desktop', // 'desktop' (default) or 'mobile'
		'type' => '',          // an alias for 'device'
		'background' => '',    // background image id (preferably an SVG)
		'theme' => 'dark',     // 'dark' (default) or 'light'
  ], $atts);

	if (!$atts['device']) {
		$atts['device'] = $atts['type'];
	}

	$mediaIdArray = array_map('trim', explode(',', $atts['id'])); // Image or video IDs
	$deviceArray = array_map('trim', explode(',', $atts['device'])); // 'phone' or 'desktop' screen type

	// If there's more media-s than screen types specified, make all the media
  // have the same screen type as the first.
	if (count($mediaIdArray) > count($deviceArray)) {
		$deviceArray = array_pad($deviceArray, count($mediaIdArray), $deviceArray[0]);
	}

	$output = '<div class="c-screens">';

	if ($atts['background']) {
		$output .= '<div class="c-screens__background"><img src=' . wp_get_attachment_url($atts['background'])  .  '></div>';
	}

	foreach ($mediaIdArray as $i => $mediaId) {
		$mediaType = get_post_mime_type($mediaId);

		$screenClass = 'c-screens__screen';
		$screenClass .= ' c-screens__screen--' . $deviceArray[$i];
		$screenClass .= ' c-screens__screen--' . $deviceArray[$i] . '--' . $atts['theme'];

		$deviceClass = 'c-screens__device';
		$deviceClass .= ' c-screens__device--' . $deviceArray[$i];
		$deviceClass .= ' c-screens__device--' . $deviceArray[$i] . '--' . $atts['theme'];

		// "Screen" i.e. the whole thing
		$output .= '<div class="' . $screenClass . '">';
		// "Device" inside, i.e. the thing with the phone or desktop border
		$output .= '<div class="' . $deviceClass . '">';

		// If its a video, wrap in <video> tags
		if (strpos($mediaType, 'video') !== false) {
			$output .= '<video width="320" height="240" autoplay>';
			$output .= '<source src="' . wp_get_attachment_url($mediaId) . '" type="' . $mediaType . '">';
			$output .= '</video>';

		// If it's an image, get the <img>
		} elseif (strpos($mediaType, 'image') !== false) {
			$output .= wp_get_attachment_image($mediaId, 'original' , '', ['loading' => 'lazy']);

		// If it's something else, just print the string
		} else {
			$output .= '<div class="c-screens__screen__unknown">' . $mediaId . '</div>';
		}

		// Closing tags for this single screen
		$output .= '</div></div>';
	}

	// Closing tag for this set of screens
	$output .= '</div>';

	// Always close previous c-content-grid container, output screens, start new c-content grid:
	$output = '</div><div class="o-container-content--v-margin">' . $output;
	$output .= '</div><div class="o-container-content o-container-content--v-margin c-content-grid">';

	return $output;
}
