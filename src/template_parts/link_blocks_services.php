<?php

  // There should be a global variable of sorts with some link blocks in
  $blocks = $globalLinkBlocks; // ?
  pr($blocks);

?>

<section class="o-container-section o-container-section--h-bordered">
  <div class="c-link-blocks">
    <?php if ($blocks && is_array($blocks)) : ?>
      <?php foreach ($blocks as $block) : ?>
        <div class="">
          test
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>
