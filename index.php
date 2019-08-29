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
  
  <section class="o-container-section o-container-section--bordered o-blog">
    
    <nav class="o-blog-nav">
      <span class="current">All</span>
      <a href="/blog/category/article/">Articles</a>
      <a href="/blog/category/podcast/">Podcasts</a>
    </nav>
    
  </section>
	
	<section class="o-container-section o-container-section--bordered o-blog">
  <?php while (have_posts()) : the_post(); 
    
    $categories = get_the_category();
    // pr($categories);
    if ( count($categories) > 1) {
      $category = $categories[1]->name;
    } else {
      $category = $categories[0]->name;
    }
    
  ?>
  
    <div class="o-blog__post">
      <div class="o-blog__info">
      <p><?= the_date(); ?></p>
      <p class="o-blog__category"><?= $category; ?></p>
      </div>
      <div class="o-blog__title">
      <h2><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h2>
      <p><?= the_excerpt(); ?></p>
      </div>
    </div>
  
  <?php endwhile; ?>
	</section>

  <section class="o-container-section o-container-section--bordered o-blog pagination blog-grid">
    
    <nav class="o-blog-nav compact blog-grid__right">
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