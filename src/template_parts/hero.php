<?php

  $text = getPostMeta('hero_hero_content');

  // If the hero content doesn't include an h1 (or doesn't exist at all),
  // then preappend the post_title as an <h1>
  if (strpos($text, '<h1>') === false) {
    $text = "<h1>$post->post_title</h1>" . $text;
  }

  if (isset($heroImage)) {
    $image = $heroImage;
  } else {
    $image = false;
  }

  if (!isset($heroClass)) {
    $bgcolor = getPostMeta('hero_hero_background-color');
    $bgcolor1 = getPostMeta('hero_hero_background-color-1');
    $bgcolor2 = getPostMeta('hero_hero_background-color-2');

    if ($bgcolor1 && $bgcolor1 != '#ffffff'){
      $heroClass = '';
    	$heroStyle = ' style="background: linear-gradient(135deg, ' . $bgcolor1 . ', ' . $bgcolor2 . ');"';
    } else {
      $heroClass = $bgcolor ? ' u-bg-gradient--' . $bgcolor : '' ;
    	$heroStyle = '';
    }
  }

  $heroStyle = getPostMeta('hero_hero_style');
  $modifierClass = $heroStyle ? ' c-hero--' . $heroStyle : '';

  // From page has a 100vh header instead of as-big-as-it-needs-to-be
  $frontPageSectionClass = is_front_page() ? ' o-container-section--100vh' : '';

?>

<section class="o-container-section o-container-section--bordered <?= $frontPageSectionClass ?>">
  <div class="c-hero<?= $modifierClass ?>">
    <div class="c-hero__background"></div>
    <div class="o-container-content o-container-content--v-pad c-hero__content">
      <?php if ($text) : ?>
        <div class="c-hero__text s-banner">
          <?= wpautop($text) ?>
        </div>
      <?php endif; ?>
      <?php if ($image) : ?>
        <div class="c-hero__image">
          <?= $image ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
