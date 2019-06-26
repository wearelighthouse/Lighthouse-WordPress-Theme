<?php

$mainContent = getOption('footer', 'main_content');
$contactBoxes = getOption('contact', 'group');
$twitterURL = getOption('social', 'twitter');
$facebookURL = getOption('social', 'facebook');
$linkedInURL = getOption('social', 'linkedin');
$instagramURL = getOption('social', 'instagram');
$footerLinks = getOption('footer', 'links');
$copyright = getOption('footer', 'copyright');

?>

<footer class="c-footer o-container o-container--bordered">
  <div class="o-container__inner">

    <?php if ($mainContent) : ?>
      <div class="c-footer__main-content s-wysiwyg--large">
        <?= wpautop($mainContent); ?>
      </div>
    <?php endif; ?>

    <?php if ($contactBoxes) : ?>
      <address class="c-footer__contact">
        <?php foreach ($contactBoxes as $contactBox) : ?>
          <div class="c-footer__contact__box">
            <?php if(isset($contactBox['text'])) : ?>
              <?= wpautop($contactBox['text']) ?>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </address>
    <?php endif; ?>

    <div class="c-footer__lower">

      <?php if ($twitterURL || $facebookURL || $linkedInURL || $instagramURL) : ?>
        <div class="c-footer__social">
          <?php include(locate_template('src/template_parts/social_links.php')) ?>
        </div>
      <?php endif; ?>

      <?php if ($footerLinks) : ?>
        <div class="c-footer__links">

        </div>
      <?php endif; ?>

      <?php if ($copyright) : ?>
        <div class="c-footer__copyright">
          <?= $copyright ?>
        </div>
      <?php endif; ?>

    </div>

  </div>
</footer>