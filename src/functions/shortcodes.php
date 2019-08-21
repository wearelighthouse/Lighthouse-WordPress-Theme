<?php

function shortcode_screen_function($atts) 
{

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

function shortcode_quote_function($atts, $content = null) 
{
	
	// $team = array( 'Christy', 'Dan', 'Russ', 'Tom', 'Anthony', 'Simon', 'Magda', 'Laura', 'Steve', 'Josh' );
	global $team;

	// get the vars
	extract(shortcode_atts(array(
		'name' => '',
		'title' => '',
		'after' => '',
		'company' => '',
		'company_url' => '',
	), $atts));
	
	// is it one of us?
	$lighthouse = array_search($name,$team) !== false ? true : false;
	$personID = array_search ($name, $team);
	
	if ($lighthouse) {
		$image = '<div>' . get_the_post_thumbnail( $personID, 'bio-tiny' ) . '</div>';
		$personUrl = get_permalink($personID);
		$personName = '<a href="' . $personUrl . '">' . $name . '</a>';
		$personName .= '<div>' . getPostMeta('team_team_title_short', $personID); '</div>';
	} else {
		$image = '';
		$personName = $name;
		if ($title != '') {
			$personName .= '<div>' . $title;
		}
		if ($company_url != '') {
		  $company = '<a href="' . $company_url . '" target="_blank">' . $company . '</a>';	
		}
		if ($company != '') {
		  $personName .= ', ' . $company;
		}
		 $personName .= '</div>';
		
	}
   
    $quote =  '	<blockquote>' . "\n";
	$quote .= apply_filters('the_content',$content);
	$quote .= '<footer>' . $image . $personName . '</footer>';
	$quote .= '	</blockquote>' . "\n";

	wp_reset_query();
	return $quote;
}

// register them all here
function register_shortcodes(){
  add_shortcode('screen', 'shortcode_screen_function');
  add_shortcode('quote', 'shortcode_quote_function');
}

add_action( 'init', 'register_shortcodes');

?>