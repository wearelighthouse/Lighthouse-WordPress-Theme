<?php
  $caseStudySize = isset($caseStudySize) ? $caseStudySize : 'small';

  $logoSrc = getPostMeta('work_work_options_logo', $caseStudyId);
  $logoId = getPostMeta('work_work_options_logo_id', $caseStudyId);
  if ($logoSrc) {
    //$logoAlt = get_post_meta($caseStudyId, '_wp_attachment_image_alt', true);
    //$logoAltAttr = $logoAlt ? 'alt="' . $caseStudy->post_title . ' logo"' : '';
    $logoMeta = wp_get_attachment_metadata($logoId);
    $logoMask = "-webkit-mask-image: url({$logoSrc}); mask-image: url({$logoSrc}); width: {$logoMeta['width']}px; height: {$logoMeta['height']}px";
  }
  $title = getPostMeta('work_work_options_link_block_title', $caseStudyId);
  $linkText = 'Find out more';
  $linkURL = get_the_permalink($caseStudyId);
  //$imgLarge = getPostMeta('work_work_options_image_background', $caseStudyId);
  $imgBackgroundId = getPostMeta('work_work_options_image_background_id', $caseStudyId);
  //$imgLarge = getPostMeta('work_work_options_image_large', $caseStudyId);
  $imgLargeId = getPostMeta('work_work_options_image_large_id', $caseStudyId);
  //$ImgMedium = getPostMeta('work_work_options_image_medium', $caseStudyId);
  $ImgMediumId = getPostMeta('work_work_options_image_medium_id', $caseStudyId);
  //$ImgSmall = getPostMeta('work_work_options_image_small', $caseStudyId);
  $ImgSmallId = getPostMeta('work_work_options_image_small_id', $caseStudyId);
?>

<div class="c-case-study-block c-case-study-block--<?= $caseStudySize; ?>">
  <div class="c-case-study-block__background">
    <?php if ($bgImg) : ?>
      <div class="c-case-study-block__background-image">
        <?= wp_get_attachment_image($bgImgId, $size = 'link-block-case-study-bg-large') ?>
      </div>
    <?php endif; ?>
    <?php if ($fgImgLargeId) : ?>
      <div class="c-case-study-block__foreground-image-large">
        <?= wp_get_attachment_image($fgImgLargeId, $size = 'link-block-case-study-fg-large') ?>
      </div>
    <?php endif; ?>
  </div>
  <div class="c-case-study-block__content">
    <?php if ($logoSrc) : ?>
      <div class="c-case-study-block__logo"
           style="<?= $logoMask ?>">
      </div>
    <?php endif; ?>
    <?php if ($fgImgSmallId) : ?>
      <div class="c-case-study-block__foreground-image-small">
        <?= wp_get_attachment_image($fgImgSmallId, $size = 'link-block-case-study-fg-small') ?>
      </div>
    <?php endif; ?>
    <?php if ($title) : ?>
      <h3 class="c-case-study-block__title">
        <a href="<?= $linkURL  ?>" class="c-case-study-block__title__link"><?= $title ?></a>
        <span class="c-case-study-block__title__plain"><?= $title ?></span>
      </h3>
    <?php endif; ?>
    <?php if ($linkText && $linkURL) : ?>
      <a class="c-case-study-block__link c-button c-button--underlined-dark" href="<?= $linkURL ?>">
        <?= $linkText ?>
      </a>
    <?php endif; ?>
  </div>
</div>
