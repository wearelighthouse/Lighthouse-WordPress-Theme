<?php

  $text = getPostMeta('hero_hero_content');
  $bgcolor = getPostMeta('hero_hero_background-color');

  // From page has a 100vh header instead of as-big-as-it-needs-to-be
  $frontPageSectionClass = is_front_page() ? ' o-container-section--100vh' : '';

?>

<section class="o-container-section o-container-section--bordered <?= $frontPageSectionClass ?>">
  <div class="c-hero <?= $bgcolor ? 'u-bg-gradient--' . $bgcolor : '' ?>">
    <div class="o-container-content o-container-content--v-pad c-hero__content">
      <?php if ($text) : ?>
        <div class="c-hero__text s-banner">
          <?= wpautop($text) ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
