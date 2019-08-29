<?php

?>

<?php get_header(); ?>

<main>

    <?php include(locate_template('src/template_parts/hero.php')) ?>
    
	<section class="o-container-section o-container-section--bordered">
	    <?php include(locate_template('src/template_parts/block_team_list.php')) ?>
	</section>
	
	<section class="o-container-section o-container-section--bordered content-grid">
	    <?php
			$teamPage = get_page_by_title('Team');
			echo apply_filters('the_content', $teamPage->post_content);
		?>
	</section>

</main>

<?php get_footer(); ?>