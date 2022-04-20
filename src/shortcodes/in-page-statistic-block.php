<?php

function statisticBlockShortcode($wp_atts, $content = null)
{
	$atts = shortcode_atts([
		'title' => '',
		'description' => '',
		'statistics' => '',
	], $wp_atts);


	$statistic = '</section>
		 <section class="o-container-section o-container-section--bordered">
		 <div class="c-bold-stat-bg">
		  	<div class="o-container-content o-container-content--v-pad c-bold-stat">';

	$title = '<h3 class="c-bold-stat__title">' . $atts['title'] . '</h3>';
	$descriptions = '<p class="c-bold-stat__description">' . $atts['description'] . '</p>';
	$statistics = '<p class="c-bold-stat__statistic">' . $atts['statistics'] . '</p>';

	$statistic .= $title;
	$statistic .= $descriptions;
	$statistic .= $statistics;

  	$statistic .= '</div> 
	  			</div>
		  </section>
			<section class="o-container-section o-container-section--bordered">
			<div class="o-container-content o-container-content--v-margin c-content-grid">';

	return $statistic;
}
