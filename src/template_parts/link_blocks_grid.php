<?php

  // There should be a global variable of sorts with some link blocks in
  $linkBlocks = $globalLinkBlocks; // ?

?>

<?php if ($linkBlocks && is_array($linkBlocks)) : ?>
  <section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-content o-container-content--v-pad o-container-link-blocks o-container-link-blocks--grid">
      <?php foreach ($linkBlocks as $linkBlock) : ?>
        <?php include(locate_template('src/template_parts/link_block.php')) ?>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif; ?>