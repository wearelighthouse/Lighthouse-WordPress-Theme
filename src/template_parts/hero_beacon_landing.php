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

  // Put the text through WordPresses formatter to get <p>s etc.
  $text = wpautop($text);

  $emColor = getPostMeta('hero_hero_em_color');
?>

<section class="o-container-section o-container-section--bordered">
  <div class="c-hero" style="margin: 0;">
    <div class="o-container-content o-container-content--v-pad c-hero__content" style="flex-direction: initial; justify-content: space-between;">
      <?php if ($text) : ?>
        <div
          class="c-hero__text s-banner s-beacon-links c-hero__text--with-image"
          style="margin: 0; <?= $emColor ? '--em-color: ' . $emColor : '' ?>"
        >
          <?= $text ?>
          <p><a href="/beacon-survey/?email=<?php echo $email; ?>&company=<?php echo $company; ?>">Start the survey</a></p>
          <p><span style="color: #999999">The survey has 21 questions and will take under 10 minutes to complete</span></p>
        </div>
      <?php endif; ?>

      <div class="u-display-none--upto-medium">
        <div class="c-beacon-card" style="max-width: 190px">
          <div><span></span></div>
          <div><span></span></div>
          <div><span></span></div>
          <div><span></span></div>
          <div><span></span></div>
        </div>
      </div>
    </div>
  </div>
</section>
