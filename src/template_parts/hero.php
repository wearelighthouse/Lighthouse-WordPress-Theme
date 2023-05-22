<?php
  $text = getPostMeta('hero_hero_content');

  if (is_tag()) {
    $text = tag_description();

    if (strpos(tag_description(), '<h1>') === false) {
      $text = "<h1>" . single_tag_title($prefix='', $display=false) . "</h1>";
      $text .= tag_description();
    }
  }

  // If the hero content doesn't include an h1 (or doesn't exist at all),
  // then preappend the post_title as an <h1>
  if (strpos($text, '<h1>') === false) {
    $text = "<h1>" . wptexturize($post->post_title) . "</h1>" . $text;
  }

  $imageId = getPostMeta('hero_hero_image_id');
  $heroStyle = getPostMeta('hero_hero_style');

  // Add date to blog post hero banner & make the it the correct gradient style
  if (is_singular('post')) {
    $tags = get_the_tags($post->ID);
      if ($tags) {
        $linkList = '';

        foreach ($tags as $tag) {
          $slug = $tag->slug;
          $name = $tag->name;
          $link = get_tag_link($tag);

          $linkList .= ('
            <li>
              <a class="c-tag c-tag--blog-hero" href="' . $link . '">
                <img src="' . get_template_directory_uri() . '/dist/svg/' . $slug . '.svg" alt="" width="20px" height="20px">
                <span>' . $name . '</span>
              </a>
            </li>
          ');
        }
      }
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

  $textWithImage = (isset($heroImage) || $imageId);

  $textWithTeamImage = is_singular('team') && $textWithImage ? 'c-hero__text--with-team-image' : '';

  $bgcolor1 = getPostMeta('hero_hero_bg_color_1');
  $bgcolor2 = getPostMeta('hero_hero_bg_color_2');
  if ($bgcolor1 && $bgcolor1 !== '#ffffff' && $bgcolor2 && $bgcolor2 !== '#ffffff') {
    $customGradient = ' style="background: linear-gradient(135deg, ' . $bgcolor1 . ', ' . $bgcolor2 . ');"';
  } else {
    $customGradient = '';
  }

  $emColor = getPostMeta('hero_hero_em_color');

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
  <div class="c-hero<?= $modifierClass ?>">
    <div class="c-hero__background o-section-clip--ramp-bottom-right" <?= $customGradient ?>>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
    <div class="o-container-content o-container-content--v-pad c-hero__content">
      <?php if ($text) : ?>
        <div
          class="c-hero__text <?= $scope ?><?= $textWithImage ? ' c-hero__text--with-image' : '' ?> <?= $textWithTeamImage ?>"
          style="<?= $emColor ? '--em-color: ' . $emColor : ''; ?>"
        >
          <?= $text ?>

          <?php if (is_front_page() || is_singular([ 'sector', 'service' ]) || is_page([ 'services' ])) : ?>
            <div class="c-home-hero-ctas">
              <a href="/contact" class="c-button c-button--pill">Get a quote</a>
              <a href="mailto:hello@wearelighthouse.com" class="c-button c-button--simple c-button--chevron">Or send us an email</a>
            </div>
          <?php endif; ?>

          <?php if (isset($tags)) : ?>
            <ul class="o-tag-list c-hero__tag-list">
              <?= $linkList ?>
            </ul>
          <?php endif; ?>
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
      <aside class="clutch-container">
        <script async src="https://widget.clutch.co/static/js/widget.js"></script>
        <script async src="https://assets.goodfirms.co/assets/js/widget.min.js"></script>
        <div class="clutch-widget" data-url="https://widget.clutch.co" data-widget-type="2" data-height="50" data-clutchcompany-id="393790">
          <a href="https://clutch.co/profile/lighthouse-2" target="_blank" rel="noopener" class="clutch-link" style="position: relative">
            <noscript>See Lighthouse reviews on Clutch</noscript>
          </a>
        </div>
        <div class="goodfirm-widget" data-widget-type="goodfirms-widget-t8" data-widget-pattern="poweredby-star" data-company-id="37016">
          <a href="https://www.goodfirms.co/company/lighthouse-london" target="_blank" rel="noopener" class="goodfirm-link" style="position: relative">
            <noscript>See Lighthouse reviews on GoodFirms</noscript>
          </a>
        </div>
        <script>
          window.addEventListener('load', function() {
            <?php // Make the Clutch and GoodForm iframe non-tab-able ?>
            var clutchContainer = document.querySelector('.clutch-widget');
            var clutchIframe = clutchContainer.querySelector('iframe');
            var clutchLink = clutchContainer.querySelector('a');
            var goodfirmContainer = document.querySelector('.goodfirm-widget');
            var goodfirmIFrame  = goodfirmContainer.querySelector('iframe');
            var goodfirmLink = goodfirmContainer.querySelector('a');

            <?php // Allow both widgets iFrames 400ms to load so they can face in w/CSS nicely ?>
            window.setTimeout(() => clutchContainer.classList.add('js-loaded'), 400);
            window.setTimeout(() => goodfirmContainer.classList.add('js-loaded'), 400);

            if (clutchIframe) {
              clutchIframe.tabIndex="-1";
              clutchIframe.setAttribute('aria-hidden', 'true');
            }

            if (goodfirmIFrame) {
              goodfirmIFrame.tabIndex = '-1';
              goodfirmIFrame.setAttribute('aria-hidden', 'true');
            }

            if (clutchLink) {
              clutchLink.style.position = 'absolute';
              clutchLink.setAttribute(
                'aria-label',
                'See Lighthouse reviews on Clutch'
              );
            }

            if (goodfirmLink) {
              goodfirmLink.style.position = 'absolute';
              goodfirmLink.setAttribute(
                'aria-label',
                'See Lighthouse reviews on GoodFirms'
              );
            }
          });
        </script>
      </aside>
    <?php endif ?>
  </div>
</section>
