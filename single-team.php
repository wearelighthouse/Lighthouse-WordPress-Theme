<?php
  // Get <head>, WordPress stuff, opening <body>
  get_header();

  $teamTitle = getPostMeta('team_team_title', $post->ID);
  $socials = getPostMeta('team_team_social', $post->ID);
  $teamImage = get_the_post_thumbnail($post);
  $heroImage = '<div class="c-hero__team-image"><div class="c-team-image c-team-image--desktop-only">' . $teamImage . '</div></div>';

  // Get the actual site header
  get_template_part('src/template_parts/header');
?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

		<section class="o-container-section o-container-section--bordered">
      <div class="o-container-content o-container-content--v-margin">
        <div class="o-container-content c-team-image c-team-image--mobile-only">
          <?= $teamImage ?>
        </div>
      </div>

      <div class="o-container-content o-container-content--v-margin c-content-grid">
				<div class="c-content-grid__left u-display-none--upto-medium">
					<?php $socialLinksStyle = 'dark' ?>
					<?php include(locate_template('src/template_parts/social_links.php')) ?>
				</div>

				<?= apply_filters('the_content', $post->post_content ); ?>
			</div>

      <div class="o-container-content o-container-content--v-margin u-display-none--from-medium">
        <?php $socialLinksStyle = 'dark' ?>
        <?php include(locate_template('src/template_parts/social_links.php')) ?>
      </div>

      <?php include(locate_template('src/template_parts/block_team_list.php')) ?>
		</section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
