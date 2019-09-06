<?php

$teamTitleShort = getPostMeta('team_team_title_short', $post->ID);
$teamTitle = getPostMeta('team_team_title', $post->ID);
$teamName = getPostMeta('team_team_name', $post->ID);
$teamSocial = getPostMeta('team_team_social', $post->ID);

$heroImage = '<div class="team-image">' . get_the_post_thumbnail($post->ID) . '</div>';

?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

		<section class="o-container-section o-container-section--bordered">
      <div class="o-container-content c-content-grid">

    		<ul class="o-team-links">

					<?php if (isset($teamSocial[0]['link'])) : ?>
						<?php foreach($teamSocial as $social) : ?>
							<?php
							  $linkPre = $social['type'] === 'Email' ? 'mailto:' : '';
							?>

							<li>
								<a class="o-team-links__<?= strToLower($social['type']) ?>"
									 href="<?= $social['link'] ?>">
									<?= $social['type'] ?>
								</a>
							</li>

						<?php endforeach; ?>
					<?php endif; ?>
    		</ul>

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
