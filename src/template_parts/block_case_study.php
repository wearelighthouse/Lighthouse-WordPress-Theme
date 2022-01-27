<?php
  $caseStudySize = isset($caseStudySize) ? $caseStudySize : 'small';

  if ($caseStudySize === 'small') {
    if (isset($caseStudyCount) && $caseStudyCount > 2) {
      $staggeredClass = ' c-case-study-block--small--staggered';
    } else {
      $staggeredClass = ' c-case-study-block--small--pair';
    }
  } else {
    $staggeredClass = '';
  }

  $logoSrc = getPostMeta('work_single_work_options_logo', $caseStudyId);
  $logoId = getPostMeta('work_single_work_options_logo_id', $caseStudyId);
  if ($logoSrc) {
    $logoAlt = get_post_meta($logoId, '_wp_attachment_image_alt', true);
    $logoMeta = wp_get_attachment_metadata($logoId);
    $logoWidth = isset($logoMeta['width']) ? $logoMeta['width'] : 0;
    $logoHeight = isset($logoMeta['height']) ? $logoMeta['height'] : 0;
    $logoMask = "-webkit-mask-image: url({$logoSrc}); mask-image: url({$logoSrc}); width: {$logoWidth}px; height: {$logoHeight}px";
  }
  $title = getPostMeta('work_single_work_options_link_block_title', $caseStudyId);
  $linkText = 'Find out more';
  $linkURL = get_the_permalink($caseStudyId);
  $imgBackgroundId = getPostMeta('work_single_work_options_image_background_id', $caseStudyId);
  $imgLargeId = getPostMeta('work_single_work_options_image_large_id', $caseStudyId);
  $imgMediumId = getPostMeta('work_single_work_options_image_medium_id', $caseStudyId);
  $imgSmallId = getPostMeta('work_single_work_options_image_small_id', $caseStudyId);
?>

<a href="<?= $linkURL ?>"
   class="c-case-study-block c-case-study-block--<?= $caseStudySize ?><?= $staggeredClass ?> <?= $globalcaseStudyAlignRight ? 'c-case-study-block--align-right' : '' ?> js-half-onscreen-detect">
   
  <div class="c-case-study-block__background">
    
    <?php if ($caseStudySize === 'large' && $imgBackgroundId) : ?>
      <div class="c-case-study-block__image-background">
        <?= lazyLoad(wp_get_attachment_image($imgBackgroundId, 'link-block-case-study-bg-large')) ?>
      </div>
    <?php endif; ?>
    <?php if ($caseStudySize === 'large' && $imgLargeId) : ?>
      <div class="c-case-study-block__image-large">
        <?= lazyload(wp_get_attachment_image($imgLargeId, 'link-block-case-study-fg-large')) ?>
      </div>
    <?php endif; ?>
    <?php if ($caseStudySize === 'small' && $imgMediumId) : ?>
      <div class="c-case-study-block__image-medium">
        <?= lazyLoad(wp_get_attachment_image($imgMediumId, 'link-block-case-study-fg-medium')) ?>
      </div>
    <?php endif; ?>
  </div>
  <div class="c-case-study-block__content">
    <?php if ($logoSrc) : ?>
      <div class="c-case-study-block__logo"
           style="<?= $logoMask ?>">
        <?php if ($logoAlt) : ?>
          <span class="c-case-study-block__logo__alt">
            <?= $logoAlt ?>
          </span>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <?php if ($imgSmallId) : ?>
      <div class="c-case-study-block__image-small">
        <?= lazyLoad(wp_get_attachment_image($imgSmallId, 'link-block-case-study-fg-small')) ?>
      </div>
    <?php endif; ?>
    <?php if ($title) : ?>
      <h3 class="c-case-study-block__title">
        <div href="<?= $linkURL  ?>" class="c-case-study-block__title__link"><?= $title ?></div>
        <?php if ($caseStudySize === 'large') : ?>
          <span class="c-case-study-block__title__plain"><?= $title ?></span>
        <?php endif; ?>
      </h3>
    <?php endif; ?>
    <?php if ($caseStudySize === 'large' && $linkText && $linkURL) : ?>
      <div href="<?= $linkURL  ?>" class="c-case-study-block__link c-button c-button--underlined-dark">
        <?= $linkText ?>
      </div>
    <?php endif; ?>
  </div>
</a>
