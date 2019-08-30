<?php
	$heroContent = '<h1>' . get_the_excerpt() . '</h1>';
	$heroImage = getPostMeta('work_work_image_large', $post->ID);
	
	// get the stats
	$stats = getPostMeta('work_work_stats', $post->ID);
	
	$clutch = getPostMeta('work_work_clutch_score', $post->ID);
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>
  
    <?php include(locate_template('src/template_parts/hero.php')) ?>

	<div class="o-container-content content-grid">
		
		<?php echo the_content(); ?>
	
	</div>
	
<?php
	if ($stats):
?>	<div class="o-container-content content-grid">
  		<h2>Results</h2>
			<div class="o-work-results">
		<?php foreach($stats as $stat): ?>
  			<div class="o-work-results__result">
  				<p><span class="o-work-results__number"><?= $stat['stat_number']; ?></span>
          <span class="o-work-results__text"><?= $stat['stat_text']; ?></span></p>
  			</div>
		<?php endforeach; ?>
			</div>	
	</div><?php
	endif;		
?>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>