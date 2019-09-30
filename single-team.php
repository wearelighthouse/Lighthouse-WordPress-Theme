<?php
  // Get <head>, WordPress stuff, opening <body>
  get_header();

  $teamTitleShort = getPostMeta('team_team_title_short', $post->ID);
  $teamTitle = getPostMeta('team_team_title', $post->ID);
  $teamName = getPostMeta('team_team_name', $post->ID);
  $socials = getPostMeta('team_team_social', $post->ID);
  $heroImage = '<div class="team-image">' . get_the_post_thumbnail($post->ID) . '</div>';

  // Get the actual site header
  get_template_part('src/template_parts/header');
?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

		<section class="o-container-section o-container-section--bordered">
      <div class="o-container-content o-container-content--v-pad c-content-grid">

				<div class="c-content-grid__left">
					<?php $socialLinksStyle = 'dark' ?>
					<?php include(locate_template('src/template_parts/social_links.php')) ?>
				</div>

				<?= apply_filters('the_content', $post->post_content ); ?>
			</div>
		</section>

		<section class="o-container-section o-container-section--bordered">
			<div class="o-container-content">
	    <?php include(locate_template('src/template_parts/block_team_list.php')) ?>
		</section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
