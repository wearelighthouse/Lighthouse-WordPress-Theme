<?php

  $text = getPostMeta('hero_hero_content');
  $bgcolor = getPostMeta('hero_hero_background-color');

  // Format the text nicely, similar to wpautop
  $text = str_replace(' er <h1> or something', '', $text);

?>

<section class="o-container-section o-container-section--bordered o-container-section--100vh">
  <div class="c-hero <?= $bgcolor ? 'u-bg-gradient--' . $bgcolor : '' ?>">
    <div class="o-container-content o-container-content--v-pad c-hero__content">
      <?php if ($text) : ?>
        <div class="c-hero__text s-banner">
          <?= $text ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
