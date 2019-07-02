<?php

  $text = getPostMeta('hero_hero_content');

?>

<section class="o-container-section o-container-section--bordered o-container-section--100vh">
  <div class="c-hero">
    <div class="o-container-content o-container-content--v-pad c-hero__content">
      <?php if ($text) : ?>
        <div class="c-hero__text s-banner">
          <?= $text ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
