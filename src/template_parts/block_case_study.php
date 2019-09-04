<?php
  //$caseStudySize = isset($caseStudySize) ? 'large' : 'small';

  //get the case study vars
  $caseStudy = get_page($caseStudyId);

  $logoSrc = getPostMeta('hero_hero_logo', $caseStudy->ID);
  $logoId = getPostMeta('hero_hero_logo_id', $caseStudy->ID);
  if ($logoSrc) {
    //$logoAlt = get_post_meta($caseStudy->ID, '_wp_attachment_image_alt', true);
    //$logoAltAttr = $logoAlt ? 'alt="' . $caseStudy->post_title . ' logo"' : '';
    $logoMeta = wp_get_attachment_metadata($logoId);
    $logoMask = "-webkit-mask-image: url({$logoSrc}); mask-image: url({$logoSrc}); width: {$logoMeta['width']}px; height: {$logoMeta['height']}px";
  }
  $title = get_the_excerpt($caseStudy->ID);
  $linkText = 'Read more';
  $linkURL = get_the_permalink($caseStudy->ID);
  $fgImgSmallId = getPostMeta('work_work_image_small_id', $caseStudy->ID);
  $bgImg = getPostMeta('work_work_image_large', $caseStudy->ID);
  $bgImgId = getPostMeta('work_work_image_large_id', $caseStudy->ID);
  $fgImgLargeId = getPostMeta('work_work_image_medium_id', $caseStudy->ID);
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
