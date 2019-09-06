<?php

$mainContent = getOption('footer', 'main_content');
$contactBoxes = getOption('contact', 'group');
$twitterURL = getOption('social', 'twitter');
$facebookURL = getOption('social', 'facebook');
$linkedInURL = getOption('social', 'linkedin');
$instagramURL = getOption('social', 'instagram');
$footerLinks = getOption('footer', 'links');
$copyright = getOption('footer', 'copyright');

$socials = [];

foreach(['twitter', 'facebook', 'linkedin', 'instagram'] as $site) {
  $link = getOption('social', $site);
  if ($link) {
    array_push($socials, [
      'type' => $site,
      'link' => $link
    ]);
  }
}

$footerLinks = $footerLinks ? autoa($footerLinks) : null;

?>

<footer class="o-container-section o-container-section--bordered">
  <div class="c-footer">

    <div class="o-container-content o-container-content--v-pad">

      <?php if ($mainContent) : ?>
        <div class="c-footer__main-content s-banner">
          <?= wpautop($mainContent); ?>
        </div>
      <?php endif; ?>

      <?php if ($contactBoxes) : ?>
        <address class="c-footer__contact">
          <?php foreach ($contactBoxes as $contactBox) : ?>
            <div class="c-footer__contact__box type-p--small u-line-height-2">
              <?php if(isset($contactBox['text'])) : ?>
                <?= wpautop($contactBox['text']) ?>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </address>
      <?php endif; ?>

      <div class="c-footer__lower type-p--smal">

        <?php if ($twitterURL || $facebookURL || $linkedInURL || $instagramURL) : ?>
          <?php $socialLinksStyle = 'light' ?>
          <div class="c-footer__social">
            <?php include(locate_template('src/template_parts/social_links.php')) ?>
          </div>
        <?php endif; ?>

        <?php if ($footerLinks) : ?>
          <ul class="c-footer__links">
            <?php foreach ($footerLinks as $link) : ?>
              <li class="c-footer__links__link-container">
                <?= $link ?>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

        <?php if ($copyright) : ?>
          <div class="c-footer__copyright">
            <?= $copyright ?>
          </div>
        <?php endif; ?>

      </div>

    </div>

  </div>
</footer>