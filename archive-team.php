<?php
  $teamPage = get_page_by_title('Team');
  $heroContent = getPostMeta('hero_hero_content', $teamPage->ID);
  $bgcolor = getPostMeta('hero_hero_background-color', $teamPage->ID);
  $heroClass = $bgcolor ? ' u-bg-gradient--' . $bgcolor : '' ;
  $heroStyle = '';
?>

<?php get_header(); ?>

<main>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

	<section class="o-container-section o-container-section--bordered">
	    <?php include(locate_template('src/template_parts/block_team_list.php')) ?>
	</section>

	<section class="o-container-section o-container-section--bordered content-grid">
	   <?= apply_filters('the_content', $teamPage->post_content); ?>
	</section>

</main>

<?php get_footer(); ?>
