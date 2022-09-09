<?php

function clientsShortcode($atts, $content = null)
{
	$home = get_page_by_title('Home');

	ob_start();
		echo '</div>
				<div class="c-intro o-container-content">';
		include(get_template_directory().'/src/template_parts/home_intro_clients.php');
		echo '</div><div class="o-container-content o-container-content--v-margin c-content-grid">';
	return ob_get_clean();
}
