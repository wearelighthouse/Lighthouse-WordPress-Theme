
<?php
  $post = get_page_by_title('Team');
  setup_postdata($post);
?>

<?php get_header(); ?>

<?php

  // Setup postdata so the_content() will work outside the loop. Don't need to
  // wp_reset_postdata() because the loop doesn't need to keep going after this

  $post = get_page_by_title('Team');
  setup_postdata($post);
?>

<main>

  <?php include(locate_template('src/template_parts/hero.php')) ?>

	<section class="o-container-section o-container-section--bordered">
    <?php include(locate_template('src/template_parts/block_team_list.php')) ?>
	</section>

  <section class="o-container-section o-container-section--bordered">
    <div class="o-container-content o-container-content--v-pad c-content-grid">
      <?= the_content() ?>
    </div>
	</section>

</main>

<?php get_footer(); ?>

