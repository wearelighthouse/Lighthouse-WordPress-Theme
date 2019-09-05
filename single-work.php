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
      <?= the_content(); ?>
    </section>

    <?php if ($stats): ?>
      <section class="o-container-content o-container-results content-grid">
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
      </section>
    <?php	endif; ?>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>