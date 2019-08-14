<?php

  // There should be a global variable of sorts with some link blocks in
  $services = $globalLinkBlocksService; // ?

?>

<?php if ($services && is_array($services)) : ?>
  <section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-content o-container-content--v-pad o-container-link-blocks o-container-link-blocks--grid">
      <?php foreach ($services as $service) : ?>
        <?php include(locate_template('src/template_parts/link_block_service.php')) ?>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif; ?>