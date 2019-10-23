<?php

  $text = getPostMeta('hero_hero_content');

  // If the hero content doesn't include an h1 (or doesn't exist at all),
  // then preappend the post_title as an <h1>
  if (strpos($text, '<h1>') === false) {
    $text = "<h1>$post->post_title</h1>" . $text;
  }

  $imageId = getPostMeta('hero_hero_image_id');
  $heroStyle = getPostMeta('hero_hero_style');

  // Add date to blog post hero banner & make the it the correct gradient style
  if (is_singular('post')) {
    $text .= '<time datetime="' . get_the_date('Y-m-d', $post->ID)  . '" class="c-hero__date">';
    $text .= get_the_date('jS F Y', $post->ID);
    $text .= '</time>';
    $heroStyle = 'gray-gradient-small';
  }

  if (is_singular('transcript')) {
    $heroStyle = 'gray-standard';
  }

  // Put the text through WordPresses formatter to get <p>s etc.
  $text = wpautop($text);

  $modifierClass = ' c-hero--' . ($heroStyle ? $heroStyle : 'orange-pink');

  if (is_singular('post')) {
    $modifierClass .= ' c-hero--post';
  }

  $bgcolor1 = getPostMeta('hero_hero_bg_color_1');
  $bgcolor2 = getPostMeta('hero_hero_bg_color_2');
  if ($bgcolor1 && $bgcolor1 !== '#ffffff' && $bgcolor2 && $bgcolor2 !== '#ffffff') {
    $customGradient = ' style="background: linear-gradient(135deg, ' . $bgcolor1 . ', ' . $bgcolor2 . ');"';
  } else {
    $customGradient = '';
  }

  // From page has a 100vh header instead of as-big-as-it-needs-to-be
  // Has been temporarily removed because it's toooo tall. CSS was also commented out.
  $frontPageSectionClass = is_front_page() ? '' : '';

  // Flip around <h1> and <p> on the front page, for SEO
  if (is_front_page()) {
    $patterns = [ '/<p>/', '/<\/p>/', '/<h1>/', '/<\/h1>/' ];
    $replacements = [ '<h1>', '</h1>', '<p>', '</p>' ];
    $text = preg_replace($patterns, $replacements, $text, 1);
    $scope = 's-banner-flipped-h1';
  } else {
    $scope = 's-banner';
  }

  $clientLogoId = getPostMeta('work_single_work_options_logo_id');
  $clientLogoSrc = getPostMeta('work_single_work_options_logo');
  $clientLogoAlt = get_post_meta($clientLogoId, '_wp_attachment_image_alt', true);
  $clientLogoAltAttr = $clientLogoAlt ? 'alt="' . $clientLogoAlt . '"' : '';
?>

<section class="o-container-section o-container-section--bordered <?= $frontPageSectionClass ?>">
  <?php include(locate_template('src/template_parts/newsflash.php')) ?>
  <div class="c-hero<?= $modifierClass ?>">
    <div class="c-hero__background o-section-clip--ramp-bottom-right" <?= $customGradient ?>>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
    <div class="o-container-content o-container-content--v-pad c-hero__content">
      <?php if ($text) : ?>
        <div class="c-hero__text <?= $scope ?><?= (isset($heroImage) || $imageId) ? ' c-hero__text--with-image' : '' ?>">
          <?= $text ?>
        </div>
      <?php endif; ?>

      <?php if ($clientLogoId) : ?>
        <div class="c-hero__client-logo-container" style="height: 75px">
          <img class="c-hero__client-logo"
               src="<?= $clientLogoSrc ?>"
            <?= $clientLogoAltAttr ?>/>
        </div>
      <?php endif; ?>

      <?php if (isset($heroImage)) : ?>
        <?= $heroImage ?>
      <?php elseif ($imageId) : ?>
        <div class="c-hero__image">
            <?= wp_get_attachment_image($imageId, $size = 'case-study-header') ?>
        </div>
      <?php endif; ?>
    </div>

    <?php if (is_front_page()) : ?>
      <?php
        // Slightly crazy Clutch widget HTML & JS.
        // This is done to allow a "pretend" clutch link for tabbing to,
        // rather than the horrible weird separate links the clutch iframe has.
      ?>
      <div class="clutch-container">
        <script async src="https://widget.clutch.co/static/js/widget.js"></script>
        <div class="clutch-widget" data-url="https://widget.clutch.co" data-widget-type="2" data-height="50" data-clutchcompany-id="393790">
          <a href="https://clutch.co/profile/lighthouse-london#reviews" class="clutch-link" tabindex="-1" target="_blank" rel="noopener" aria-label="See Lighthouse reviews on Clutch"></a>
        </div>
        <script>
          <?php // Make the Clutch iframe non-tab-able ?>
          window.addEventListener('load', () => {
            var clutch = document.querySelector('.clutch-container');
            var iframe = clutch.querySelector('iframe');
            var link = clutch.querySelector('.clutch-link');

            if (iframe) {
              iframe.tabIndex="-1";
              iframe.setAttribute('aria-hidden', 'true');
              link.tabIndex="0";
            }
          });
        </script>
      </div>
    <?php endif ?>
  </div>
</section>
