<?php
  // Get <head>, WordPress stuff, opening <body>
  get_header();

  // Setup postdata so the_content() will work outside the loop. Don't need to
  // wp_reset_postdata() because the loop doesn't need to keep going after this
  $post = get_page_by_title('Team');
  setup_postdata($post);

  // Get the actual site header
  get_template_part('src/template_parts/header');
?>

<main>

  <?php include(locate_template('src/template_parts/hero.php')) ?>

  <section class="o-container-section o-container-section--bordered">
    <?php include(locate_template('src/template_parts/block_team_list.php')) ?>

    <div class="o-container-content c-content-grid">
      <?= the_content() ?>
    </div>
	</section>

</main>

<?php get_footer(); ?>

