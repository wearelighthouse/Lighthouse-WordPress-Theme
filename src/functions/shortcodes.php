<?php

function shortcode_screen_function($atts) {

	extract(shortcode_atts(array(
		'id' => '',
		'type' => '',
		'bg' => '',
	), $atts));
	
	// screen images
	$screens = explode(',',$id);
	$screenCount = count($screens);
	$screenType = strtolower($type) == 'mobile' ? 'mobile' : 'desktop';
	
	// background image
	if ($bg):
		$bgUrl = wp_get_attachment_image_url($bg, 'original');
	endif;
	
	$output = '<div class="' . $screenType . ' count-' . $screenCount . '">';
	
	foreach ($screens as $screen):
	
		$output .= wp_get_attachment_image($screen, 'original');
	
	endforeach;
	
	$output .= '</div>';
	
	return $output;
	
}

// register them all here
function register_shortcodes(){
  add_shortcode('screen', 'shortcode_screen_function');
}

add_action( 'init', 'register_shortcodes');

?>