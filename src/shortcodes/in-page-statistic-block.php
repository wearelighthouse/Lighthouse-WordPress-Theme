<?php

function statisticBlockShortcode($wp_atts, $content = null)
{
	$atts = shortcode_atts([
		'title' => '',
		'description' => '',
		'statistics' => '',
	], $wp_atts);


	$statistic = '</section>
		 <section class="o-container-section o-container-section--bordered c-bold-stat-bg">
		  	<div class="o-container-content o-container-content--v-margin c-bold-stat">';

	$title = '<h3 class="c-stats-bold__title">' . $atts['title'] . '</h3>';
	$descriptions = '<p class="c-stats-bold__description">' . $atts['description'] . '</p>';
	$statistics = '<p class="c-stats-bold__statistic">' . $atts['statistics'] . '</p>';

	$statistic .= $title;
	$statistic .= $descriptions;
	$statistic .= $statistics;

  	$statistic .= '</div>
		  </section>
			<section class="o-container-section o-container-section--bordered">
			<div class="o-container-content o-container-content--v-margin c-content-grid">';

	return $statistic;
}
