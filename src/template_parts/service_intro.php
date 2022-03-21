<?php
  $introText = getPostMeta('service_archive_home_intro_text');
  $serviceItroTitle = getPostMeta('service_archive_home_intro_title');
  $button = getPostMeta('service_archive_blocks_service_action');
  $clients = getPostMeta('service_archive_home_intro_clients');
?>

<?php if ($serviceItroTitle || $introText) : ?>
  <section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-content">
      <div class="c-service-intro">
        <?php if ($serviceItroTitle) : ?>
            <h2 class="c-service-intro__title c-service-template__title">
              <?= $serviceItroTitle ?>
            </h2>
        <?php endif; ?>

        <?php if ($introText) : ?>
          <div class="c-service-intro__text type-p">
            <?= wpautop($introText) ?>
          </div>
        <?php endif; ?>

        <?php if ($clients && isset($clients[0])) : ?>
          <div class="c-service-intro__clients">
            <?php foreach ($clients as $client) : ?>
              <?php
                $logoSrc = isset($client['logo']) ? $client['logo'] : '';
                $logoId = isset($client['logo_id']) ? $client['logo_id'] : 0;
                $logoAlt = get_post_meta($logoId, '_wp_attachment_image_alt', true);
                $logoMeta = wp_get_attachment_metadata($client['logo_id']);
                $logoSize = 1.2;
                $logoWidth = isset($logoMeta['width']) ? $logoMeta['width'] : 0;
                $logoHeight = isset($logoMeta['height']) ? $logoMeta['height'] : 0;
                $logoMask = "-webkit-mask-image: url({$logoSrc}); mask-image: url({$logoSrc}); mask-size: contain; -webkit-mask-size: contain; mask-repeat: no-repeat; -webkit-mask-repeat: no-repeat; width: " . ($logoWidth * $logoSize) . "px; height: " . ($logoHeight * $logoSize) . "px";
                $alt = get_post_meta($logoId, '_wp_attachment_image_alt', true);
              ?>

              <div class="c-service-intro__clients__img-container" style="<?= $logoMask; ?>">
                <span class="o-dictate"><?= $alt ?> logo</span>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

      </div>

      <?php if ($button) : ?>
        <div class="c-service-template__button-container">
          <button class="c-service-template__button">
              <a href="https://wearelighthouse.com/contact/"><?= $button ?></a>
          </button>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>
