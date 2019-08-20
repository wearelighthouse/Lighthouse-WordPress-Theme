<?php

  if (isset($heroContent)):
	$text= $heroContent;
  else:
	$text = getPostMeta('hero_hero_content');
  endif;
  
  if (isset($heroImage)):
	$image= $heroImage;
  else:
	$image = false;
  endif;

  
  $bgcolor = getPostMeta('hero_hero_background-color');
  $bgcolor1 = getPostMeta('hero_hero_background-color-1');
  $bgcolor2 = getPostMeta('hero_hero_background-color-2');
  
  if ($bgcolor1 && $bgcolor1 != '#ffffff'):
	$heroClass = '';
	$heroStyle = ' style="background: linear-gradient(135deg, ' . $bgcolor1 . ', ' . $bgcolor2 . ');"';
  else:
  	$heroClass = $bgcolor ? ' u-bg-gradient--' . $bgcolor : '' ;
  	$heroStyle = '';
  endif;

  // From page has a 100vh header instead of as-big-as-it-needs-to-be
  $frontPageSectionClass = is_front_page() ? ' o-container-section--100vh' : '';

?>

<section class="o-container-section o-container-section--bordered <?= $frontPageSectionClass ?>">
  <div class="c-hero<?= $heroClass ?>"<?= $heroStyle; ?>>
    <div class="o-container-content o-container-content--v-pad c-hero__content">
      <?php if ($text) : ?>
        <div class="c-hero__text s-banner">
          <?= wpautop($text) ?>
        </div>
      <?php endif; ?>
      <?php if ($image) : ?>
        <div class="c-hero__text s-banner">
          <?= $image ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
