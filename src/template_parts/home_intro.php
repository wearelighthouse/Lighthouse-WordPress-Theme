<?php
  $home = $post;
  $introText = getPostMeta('front_page_home_intro_text', $home->ID);
?>

<div class="c-home-intro o-container-content o-container-content--v-pad">
  <?= apply_filters('the_content', $introText); ?>

  <?php include(locate_template('src/template_parts/home_intro_clients.php')) ?>
</div>
