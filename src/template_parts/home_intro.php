<?php
  $home = $post;
  $intro = getPostMeta('front_page_home_intro_text', $home->ID);
?>

    <div class="c-intro o-container-content o-container-content--v-pad">
      <?php echo apply_filters('the_content', $intro); ?>

      <?php include(locate_template('src/template_parts/home_intro_clients.php')) ?>

    </div>
