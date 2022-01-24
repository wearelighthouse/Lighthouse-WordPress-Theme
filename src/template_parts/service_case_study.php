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

<?php if ($caseStudySize === 'large') : ?>
  <a href="<?= $linkURL ?>"
   class="c-service-case-study__content c-case-study-block c-case-study-block--<?= $caseStudySize ?><?= $staggeredClass ?> js-half-onscreen-detect">
    <div class="c-service-case-study__content__background"> 
      <?php if ($caseStudySize === 'large' && $imgBackgroundId) : ?>
        <div class="c-case-study-block__image-background">
          <?= lazyLoad(wp_get_attachment_image($imgBackgroundId, 'link-block-case-study-bg-large')) ?>
        </div>
      <?php endif; ?>
      <?php if ($caseStudySize === 'large' && $imgLargeId) : ?>
        <div class="c-service-case-study__content__background__illustration">
          <?= lazyload(wp_get_attachment_image($imgLargeId, 'link-block-case-study-fg-large')) ?>
        </div>
      <?php endif; ?>
      <?php if ($caseStudySize === 'small' && $imgMediumId) : ?>
        <div class="c-case-study-block__image-medium">
          <?= lazyLoad(wp_get_attachment_image($imgMediumId, 'link-block-case-study-fg-medium')) ?>
        </div>
      <?php endif; ?>
    </div>

    <div class="c-service-case-study__content-content">
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
        <div class="c-case-study-block__image-small c-service-case-study__image-small">
          <?= lazyLoad(wp_get_attachment_image($imgSmallId, 'link-block-case-study-fg-small')) ?>
        </div>
      <?php endif; ?>
      <?php if ($title) : ?>
        <h3 class="c-case-study-block__title">
          <div href="<?= $linkURL  ?>" class="c-service-case-study__content-subtitle c-case-study-block__title__link c-service-case-study__content-subtitle"><?= $title ?></div>
          <?php if ($caseStudySize === 'large') : ?>
            <span class="c-case-study-block__title__plain"><?= $title ?></span>
          <?php endif; ?>
        </h3>
      <?php endif; ?>
      <?php if ($caseStudySize === 'large' && $linkText && $linkURL) : ?>
        <div href="<?= $linkURL  ?>" class="c-service-case-study__content-content--link c-case-study-block__link c-button c-button--underlined-dark c-service-case-study__content-content--link">
          <?= $linkText ?>
        </div>
      <?php endif; ?>
    </div>
  </a>
<?php endif; ?>

<?php if ($caseStudySize === 'small') : ?>
  <div class="c-service-case-study__parenting">
    <?php for ($i = 0; $i < 2; $i++) : ?>
      <a href="<?= $linkURL ?>" class="c-service-case-study__parenting-block data-loaded="true">
        <div class="c-service-case-study__parenting-block--image">
            <img src="<?= get_template_directory_uri(); ?>/assets/svg/single/activities.svg" alt>
            <img src="<?= get_template_directory_uri(); ?>/assets/svg/single/parent-wellbeing.svg" alt>
        </div>

        <div>
            <div class="c-service-case-study__parenting-content">
                <div class="c-case-study-block__logo" style="-webkit-mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/actionforchildren-logo.svg); mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/actionforchildren-logo.svg); width: 100px; height: 60px">
                <span class="c-case-study-block__logo__alt">
                    Action for Children
                </span>
                </div>
                
                <?php if (!$i) : ?>  
                  <h3 class="c-service-case-study__parenting-content--title">
                    <div href="https://wearelighthouse.com/our-work/dots-action-children/" class="c-case-study-block__title__link">A new parenting platform from an innovative charity
                    </div>
                  </h3>
                  <p class="c-service-case-study__parenting-content--p">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                <?php endif; ?>

                <?php if ($i) : ?>
                  <div class="c-service-case-study__parenting-content--content">
                    <p class="c-service-case-study__parenting-content--p">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu.</p>
                    <p>Key statistic</p>
                    <p><span>50</span> Hours of discovery</p>
                  </div>
                <?php endif; ?>

            </div>
        </div>
      </a>
    <?php endfor; ?>
  </div>
<?php endif; ?>
