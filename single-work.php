<?php
	$heroContent = '<h1>' . get_the_excerpt() . '</h1>';
	$heroImage = getPostMeta('work_work_image_large', $post->ID);
	
	// get the stats
	$stats = getPostMeta('work_work_stats', $post->ID);
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>
  
    <?php include(locate_template('src/template_parts/hero.php')) ?>

	<div class="o-container-content">
		
		<?php echo the_content(); ?>
	
	</div>
	
<?php
	if ($stats):
?>	<div class="o-container-content">
		
		<div>
		<?php foreach($stats as $stat): ?>
			<div>
				<?= $stat['stat_number']; ?><br />
				<?= $stat['stat_text']; ?>
			</div>
		<?php endforeach; ?>
		</div>
	
	</div><?php
	endif;		
?>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>