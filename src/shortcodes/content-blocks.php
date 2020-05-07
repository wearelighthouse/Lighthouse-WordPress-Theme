<?php

function contentBlocksShortcode($atts, $content = null)
{
	$atts = shortcode_atts([
		'columns' => '3'
	], $atts);

	$blocksContent = explode( '[block]', $content);
	array_shift($blocksContent);
	//print_r($blocksContent);

	$blocks = '</section>
		 <section class="o-container-section o-container-section--h-bordered">
		    <div class="o-container-content o-container-services o-container-services--' . $atts['columns'] . '-column">';

	foreach ($blocksContent as $block) {
		$blocks .= '<div class="c-service-block">';

		$block = str_replace( '[/block]' , '', $block );
		$block = str_replace( '<p>' , '', $block );
		$block = str_replace( '</p>' , '', $block );
		$block = str_replace( '<h3>', '<h3 class="c-service-block__title type-title">' ,$block );
		$block = str_replace( '</h3>', '</h3><div class="c-service-block__desc type-p"><p>' , $block );

		$blocks .= $block;
		$blocks .= '</p>    </div>
		  </div>';
	}

  $blocks .= '	          </div>
		  </section>
			<section class="o-container-section o-container-section--h-bordered">
			<div class="o-container-content o-container-content--v-margin c-content-grid">';

  //echo $blocks;

	return $blocks;
}
