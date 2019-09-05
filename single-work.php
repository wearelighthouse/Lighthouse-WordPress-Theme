<?php
	$heroContent = '<h1>' . get_the_excerpt() . '</h1>';
	//$heroImage = getPostMeta('work_work_image_large', $post->ID);

	// get the stats
	$stats = getPostMeta('work_work_stats', $post->ID);

	$clutch = getPostMeta('work_work_clutch_score', $post->ID);
	$clutchScore = '';
	if ($clutch > 0) {
    $clutchScore = '<div class="clutch"><span class="clutch-score" style="width:' . (65 * (($clutch/10) * 2)) . 'px"></div>';
  }
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

	<section class="o-container-content content-grid">

		<?php echo the_content(); ?>

	</section>

<?php
	if ($stats):
?>	<section class="o-container-content o-container-results">

			<div class="o-work-results">
		<?php foreach($stats as $stat): ?>
  			<div class="o-work-results__result">
  				<p><span class="o-work-results__number"><?= $stat['stat_number']; ?></span><span class="o-work-results__text"><?= $stat['stat_text']; ?></span></p>
  			</div>
		<?php endforeach; ?>

		<?php
		if ($clutch) {
			?>
			<div class="o-work-results__result o-work-results__result--clutch">
				<p><span class="o-work-results__number" style="width:<?= ($clutch*24);?>px"><?= $clutch;?></span><span class="o-work-results__text">
				<span class="o-work-results__text"></span></p>
			</div>
			<?php

		}
		?>
			</div>
	</section><?php
	endif;
?>

<?php

$linkList = '';
// get the service
$services = getPostMeta('work_service_list_service', $post->ID);
foreach ($services as $service) {
	$linkList .= '<li><a href="' . get_permalink($service) . '">' . get_the_title($service) . '</a></li>';
}
$sectors = getPostMeta('work_sector_list_sector', $post->ID);
foreach ($sectors as $sector) {
	$linkList .= '<li><a href="' . get_permalink($sector) . '">' . get_the_title($sector) . '</a></li>';
}

// get the sector

?>

<section class="o-container-content o-work-footer">

	<div class="o-work-footer__column">
		<h3>See more&hellip;</h3>
		<ul class="o-work-footer__list">
			<?= $linkList; ?>
		</ul>
	</div>

	<div class="o-work-footer__column">

		<h2>If you've got a product idea you want to bring to life, talk to us</h2>
		<p><a href="#" class="c-case-study-block__link c-button c-button--underlined-dark" href="/contact/">Get in touch</a></p>
	</div>

</section>

  <?php endwhile; ?>

</main>

<?php get_footer(); ?>
