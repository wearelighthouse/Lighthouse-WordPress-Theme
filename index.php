<?php
  $blog = get_page_by_title('Blog');
  $heroContent = getPostMeta('hero_hero_content', $blog->ID);
  $bgcolor = getPostMeta('hero_hero_background-color', $blog->ID);
  $heroClass = $bgcolor ? ' u-bg-gradient--' . $bgcolor : '' ;
  $heroStyle = '';
?>

<?php get_header(); ?>

<main>

  <?php include(locate_template('src/template_parts/hero.php')) ?>
  
  <section class="o-container-section o-container-section--bordered">
    
    <nav class="o-blog-nav">
      <span class="current">All</span>
      <a href="/blog/category/article/">Articles</a>
      <a href="/blog/category/podcast/">Podcasts</a>
    </nav>
    
  </section>
	
	<section class="o-container-section o-container-section--bordered o-blog">
  <?php while (have_posts()) : the_post(); ?>
  
    <div class="o-blog__info">
    <p><?= the_date(); ?></p>
    </div>
    <div class="o-blog__title">
    <h2><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h2>
    <p><?= the_excerpt(); ?></p>
    </div>
  
  <?php endwhile; ?>
	</section>

  <section class="o-container-section o-container-section--bordered">
    
    <nav class="o-blog-nav compact">
    <?php 				
      $args = array(
      	'prev_text' => __('←'),
      	'next_text' => __('→'),
      );
      echo paginate_links( $args ); 
		?>
    </nav>
    
  </section>

</main>

<?php get_footer(); ?>