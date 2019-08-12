<?php

$text = getPostMeta('contact_us_banner_text');
$buttonText = getPostMeta('contact_us_banner_button_text');
$buttonURL = getPostMeta('contact_us_banner_button_url');
$clients = getPostMeta('contact_us_banner_clients');

?>

<section class="o-container-section o-container-section--bordered">
  <div class="c-cta-banner">
    <div class="o-container-content o-container-content--v-pad">

      <div class="">
        <?php if ($text) : ?>
          <div class="c-cta-banner__text s-banner">
            <?= wpautop($text) ?>
          </div>
        <?php endif; ?>

        <?php if ($buttonURL && $buttonText) : ?>
          <a href="<?= $buttonURL ?>"
             class="c-cta-banner__button c-button c-button--underlined-light">
            <?= $buttonText ?>
          </a>
        <?php endif; ?>
      </div>

      <?php if ($clients && isset($clients[0])) : ?>
        <div class="c-cta-banner__clients">
          <?php foreach ($clients as $client) : ?>
            <!-- client SVG & name as screenreader-only-text -->
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>

