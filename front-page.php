<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <?php $globalLinkBlocks = getPostMeta('link_blocks_group')?>
    <?php include(locate_template('src/template_parts/link_blocks_grid.php')) ?>

    <?php include(locate_template('src/template_parts/contact_us_banner.php')) ?>

    <div class="placeholder" style="height: 200px;"></div>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>