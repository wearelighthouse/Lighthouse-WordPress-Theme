<?php
  $clients = getPostMeta('front_page_home_intro_clients', $home->ID);
?>
<?php if ($clients && isset($clients[0])) : ?>
  <div class="c-home-intro__clients c-cta-banner__right">
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

      <div class="c-home-intro__clients__img-container" style="<?= $logoMask; ?>">
        <span class="o-dictate"><?= $alt ?> logo</span>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
