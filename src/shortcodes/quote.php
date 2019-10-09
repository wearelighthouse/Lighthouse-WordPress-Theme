<?php

function quoteShortcode($atts, $content = null)
{
	global $team;

	// get Clutch score
	global $post;
	$clutch = getPostMeta('work_single_work_clutch_score', $post->ID);
	$clutchScore = '';

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
		$image = '<div class="c-blockquote__image c-blockquote__team-image">' . get_the_post_thumbnail( $personID, 'bio-tiny' ) . '</div>';
		$personUrl = get_permalink($personID);
		$personName = '<div class="c-blockquote__person"><a href="' . $personUrl . '" class="c-blockquote__name">' . $name . '</a>' . getPostMeta('team_team_title_short', $personID); '</div>';
		$clutchScore = '';
	} else {
		$image = '';
		$personName = '<div class="c-blockquote__person"><span class="c-blockquote__name">' . $name . '</span>';
		if ($title != '') {
			$personName .= $title;
		}
		if ($company_url != '') {
		  $company = '<a href="' . $company_url . '" target="_blank">' . $company . '</a>';
		}
		if ($company != '') {
		  $personName .= ', ' . $company;
		}
		$personName .= '</div>';

		if ($clutch > 0) {
      $clutchScore = '<div class="c-clutch u-ml-auto"><div class="c-clutch__logo"></div><div class="c-clutch__score" style="width:' . (65 * (($clutch/10) * 2)) . 'px"></div></div>';
    }
	}

  $quote =  '	<blockquote class="c-blockquote">' . "\n";
	$quote .= apply_filters('the_content',$content);
	$quote .= '<footer>' . $image . $personName . $clutchScore . '</footer>';
	$quote .= '	</blockquote>' . "\n";

	wp_reset_query();
	return $quote;
}
