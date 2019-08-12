<?php

$text = getPostMeta('contact_us_banner_text');
$buttonText = getPostMeta('contact_us_banner_button_text');
$buttonURL = getPostMeta('contact_us_banner_button_url');
$clients = getPostMeta('contact_us_banner_clients');

pr($text);

?>

<section class="o-container-section o-container-section--bordered">
  <div class="c-cta-banner">
    <div class="o-container-content o-container-content--v-pad">

      <div class="">
        <div class="c-cta-banner__text s-banner">
          <?= wpautop($text) ?>
        </div>

        <a href="<?= $buttonURL ?>"
           class="c-cta-banner__button c-button c-button--underlined c-button--underlined--light">
          <?= $buttonText ?>
        </a>
      </div>

      <div class="c-cta-banner__clients">

      </div>

    </div>
  </div>
</section>

