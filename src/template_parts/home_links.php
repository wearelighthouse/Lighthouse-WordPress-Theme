<?php
  $links = getPostMeta('front_page_home_links_links');
?>

<div class="c-award-links o-container-content--v-pad">
  <?php if ($links && isset($links[0])) : ?>
    <?php foreach ($links as $link) : ?>
      <?php
        $logoSrc = $link['graphic'];
        $logoAlt = get_post_meta($link['graphic_id'], '_wp_attachment_image_alt', true);
        $logoMeta = wp_get_attachment_metadata($link['graphic_id']);
        $alt = get_post_meta($link['graphic_id'], '_wp_attachment_image_alt', true);
      ?>

      <a href="<?= $link['url']; ?>" class="c-award-links__link">
        <?= lazyLoad(wp_get_attachment_image($link['graphic_id'], '')) ?>
      </a>

    <?php endforeach; ?>
  <?php endif; ?>
</div>
