<?php
  // Get <head>, WordPress stuff, opening <body>
  get_header();

  $heroContent = '<h1>' . get_the_excerpt() . '</h1>';
  //$heroImage = getPostMeta('work_work_image_large', $post->ID);

  // get the stats
  $stats = getPostMeta('work_single_work_options_stats', $post->ID);

  $clutch = getPostMeta('work_single_work_options_clutch_score', $post->ID);
  $clutchScore = '';
  if ($clutch > 0) {
    $clutchScore = '<div class="c-clutch"><div class="c-clutch__logo"></div><div class="c-clutch__score" style="width:' . (65 * (($clutch/10) * 2)) . 'px"></div></div>';
  }

  // Get the actual site header
  get_template_part('src/template_parts/header');
?>

<?php // Work pages can have full-width stuff that needs the --scrollbar-width variable ?>
<script src="<?= get_template_directory_uri()?>/dist/js/scrollbar-width.min.js"></script>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <section class="o-container-section o-container-section--bordered">
      <div class="o-container-content o-container-content--v-margin c-content-grid">
        <?= the_content(); ?>
      </div>
    </section>

    <?php if ($stats): ?>
      <section class="o-container-section o-container-section--bordered">
        <div class="o-container-content c-work-results">

          <?php foreach($stats as $stat): ?>
  					<div class="c-work-results__result">
              <strong class="c-work-results__number"><?= $stat['stat_number']; ?></strong>
              <span class="c-work-results__text"><?= $stat['stat_text']; ?></span>
  					</div>
          <?php endforeach; ?>

          <?php if ($clutch) : ?>
      			<div class="c-work-results__result c-work-results__result--clutch">
              <span class="c-work-results__number" style="width:<?= ($clutch*24);?>px"><?= $clutch;?></span>
              <span class="c-work-results__text"></span>
      			</div>
      		<?php endif; ?>

        </div>
      </section>
    <?php	endif; ?>

<?php

	$linkList = '';

	$services = getPostMeta('work_service_list_service', $post->ID);
  if ($services) {
    foreach ($services as $service) {
      $linkList .= '<li><a href="' . get_permalink($service) . '">' . get_the_title($service) . '</a></li>';
    }
  }

	$sectors = getPostMeta('work_sector_list_sector', $post->ID);
  if ($sectors) {
  	foreach ($sectors as $sector) {
  		$linkList .= '<li><a href="' . get_permalink($sector) . '">' . get_the_title($sector) . '</a></li>';
  	}
  }

?>

<section class="o-container-content o-work-footer">

  <?php if ($linkList) : ?>
  	<div class="o-work-footer__column">
  		<h3>See more&hellip;</h3>
  		<ul class="o-work-footer__list">
  			<?= $linkList; ?>
  		</ul>
  	</div>
  <?php endif; ?>

	<div class="o-work-footer__column">

		<h2>If you've got a product idea you want to bring to life, talk to us</h2>
		<p><a href="#" class="c-case-study-block__link c-button c-button--underlined-dark" href="/contact/">Get in touch</a></p>
	</div>

</section>

  <?php endwhile; ?>

</main>

<?php get_footer(); ?>
