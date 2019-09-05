<?php
  $heroContent = '<h1>' . get_the_excerpt() . '</h1>';
  //$heroImage = getPostMeta('work_work_image_large', $post->ID);

  // get the stats
  $stats = getPostMeta('work_work_stats', $post->ID);

  $clutch = getPostMeta('work_work_clutch_score', $post->ID);
  $clutchScore = '';
  if ($clutch > 0) {
    $clutchScore = '<div class="c-clutch"><div class="c-clutch__logo"></div><div class="c-clutch__score" style="width:' . (65 * (($clutch/10) * 2)) . 'px"></div></div>';
  }
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <section class="o-container-section o-container-section--bordered">
      <div class="o-container-content c-content-grid">
        <?= the_content(); ?>
      </div>
    </section>

    <?php if ($stats): ?>
      <section class="o-container-section o-container-section--bordered">
        <div class="o-container-content c-content-grid">
          <h2>Results</h2>
      		<?= $clutchScore; ?>
          <div class="o-work-results">
            <?php foreach($stats as $stat): ?>
    					<div class="o-work-results__result">
        				<p>
                  <span class="o-work-results__number"><?= $stat['stat_number']; ?></span>
                  <span class="o-work-results__text"><?= $stat['stat_text']; ?></span>
                </p>
    					</div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    <?php	endif; ?>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>