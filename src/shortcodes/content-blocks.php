<?php

function contentBlocksShortcode($atts, $content = null)
{
	$atts = shortcode_atts([
		'columns' => '3'
	], $atts);

	$blocksContent = explode( '[block]', $content);
	array_shift($blocksContent);

	$blocks = '</section>
		 <section class="o-container-section o-container-section--h-bordered">
		    <div class="o-container-content o-container-services o-container-services--' . $atts['columns'] . '-column">';

	foreach ($blocksContent as $block) {
		$blocks .= '<div class="s-content s-content--marginless">';
		$block = str_replace( '[/block]' , '', $block );
		$block = str_replace( '<p></p>' , '', $block );
		$pos = strpos($block, '</p>');
		$block = substr_replace($block, '', $pos, strlen('</p>'));
		$pos = strrpos($block, '<p>');
		$block = substr_replace($block, '', $pos, strlen('<p>'));
		$blocks .= $block;
		$blocks .= '</div>';
	}

  $blocks .= '	          </div>
		  </section>
			<section class="o-container-section o-container-section--h-bordered">
			<div class="o-container-content o-container-content--v-margin c-content-grid">';

	return $blocks;
}
