<?php

  $text = getPostMeta('hero_hero_content');

  // If the hero content doesn't include an h1 (or doesn't exist at all),
  // then preappend the post_title as an <h1>
  if (strpos($text, '<h1>') === false) {
    $text = "<h1>$post->post_title</h1>" . $text;
  }

  $imageId = isset($heroImage) ? $heroImage : getPostMeta('hero_hero_image_id');

  $heroStyle = getPostMeta('hero_hero_style');
  $modifierClass = $heroStyle ? ' c-hero--' . $heroStyle : '';

  $bgcolor1 = getPostMeta('hero_hero_bg_color_1');
  $bgcolor2 = getPostMeta('hero_hero_bg_color_2');
  if ($bgcolor1 && $bgcolor1 !== '#ffffff' && $bgcolor2 && $bgcolor2 !== '#ffffff') {
    $customGradient = ' style="background: linear-gradient(135deg, ' . $bgcolor1 . ', ' . $bgcolor2 . ');"';
  } else {
    $customGradient = '';
  }

  // From page has a 100vh header instead of as-big-as-it-needs-to-be
  $frontPageSectionClass = is_front_page() ? ' o-container-section--100vh' : '';

  $clientLogoId = getPostMeta('work_work_options_logo_id');
  $clientLogoSrc = getPostMeta('work_work_options_logo');
  $clientLogoAlt = get_post_meta($clientLogoId, '_wp_attachment_image_alt', true);
  $clientLogoAltAttr = $clientLogoAlt ? 'alt="' . $clientLogoAlt . '"' : '';
?>

<section class="o-container-section o-container-section--bordered <?= $frontPageSectionClass ?>">
  <div class="c-hero<?= $modifierClass ?>">
    <div class="c-hero__background" <?= $customGradient ?>></div>
    <div class="o-container-content o-container-content--v-pad c-hero__content">
      <?php if ($text) : ?>
        <div class="c-hero__text s-banner">
          <?= wpautop($text) ?>
        </div>
      <?php endif; ?>
      <?php if ($clientLogoId) : ?>
        <img class="c-hero__client-logo"
             src="<?= $clientLogoSrc ?>"
             <?= $clientLogoAltAttr ?>/>
      <?php endif; ?>
      <?php if ($imageId) : ?>
        <div class="c-hero__image">
            <?= wp_get_attachment_image($imageId, $size = 'case-study-header') ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
