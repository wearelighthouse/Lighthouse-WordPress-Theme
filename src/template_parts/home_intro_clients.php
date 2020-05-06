<?php
  $clients = getPostMeta('front_page_home_intro_clients', $home->ID);
  print_r($clients);
?>
      <?php if ($clients && isset($clients[0])) : ?>
        <div class="c-intro__clients c-cta-banner__right">
          <?php foreach ($clients as $client) : ?>
            <?php
              $logoSrc = $client['logo'];
              $logoAlt = get_post_meta($client['logo_id'], '_wp_attachment_image_alt', true);
              $logoMeta = wp_get_attachment_metadata($client['logo_id']);
              $logoSize = 1.2;
              $logoMask = "-webkit-mask-image: url({$logoSrc}); mask-image: url({$logoSrc}); mask-size: contain; -webkit-mask-size: contain; mask-repeat: no-repeat; -webkit-mask-repeat: no-repeat; width: " . ($logoMeta['width'] * $logoSize) . "px; height: " . ($logoMeta['height'] * $logoSize) . "px";
              $alt = get_post_meta($client['logo_id'], '_wp_attachment_image_alt', true);
            ?>
            <div class="c-intro__clients__img-container" style="<?= $logoMask; ?>">
              <span><?= $alt ?> logo</span>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
