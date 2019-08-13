<?php

$text = getPostMeta('contact_us_banner_text');
$buttonText = getPostMeta('contact_us_banner_button_text');
$buttonURL = getPostMeta('contact_us_banner_button_url');
$clients = getPostMeta('contact_us_banner_clients');

?>

<section class="o-container-section o-container-section--bordered">
  <div class="c-cta-banner">
    <div class="c-cta-banner__inner o-container-content o-container-content--v-pad">

      <div class="c-cta-banner__left">
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
        <div class="c-cta-banner__clients c-cta-banner__right">
          <?php foreach ($clients as $client) : ?>
            <?php
              $alt = get_post_meta($client['logo_id'], '_wp_attachment_image_alt', true);
              $altAttr = $alt ? 'alt="' . $alt . '"' : '';
            ?>
            <div class="c-cta-banner__clients__img-container">
              <img class="c-cta-banner__clients__img"
                   src="<?= $client['logo'] ?>"
                   <?= $altAttr ?>/>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>

