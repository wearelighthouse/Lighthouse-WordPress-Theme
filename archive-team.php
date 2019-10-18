
<?php get_header(); ?>

<main>

  <?php include(locate_template('src/template_parts/hero.php')) ?>

  <section class="o-container-section o-container-section--bordered">
    <?php include(locate_template('src/template_parts/block_team_list.php')) ?>

    <div class="o-container-content o-container-content--v-margin c-content-grid">
      <?= the_content() ?>
    </div>
	</section>

</main>

<?php get_footer(); ?>
