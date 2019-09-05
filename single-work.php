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

<section class="o-container-content o-work-footer">

	<div class="o-work-footer__column">
		<h3>See more&hellip;</h3>
		<ul class="o-work-footer__list">
				<li><a href="">Idea to Launch</a></li>
				<li><a href="">Automotive</a></li>
				<li><a href="">UX / UI design</a></li>
				<li><a href="">Charity</a></li>
				<li><a href="">MVP development</a></li>
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
