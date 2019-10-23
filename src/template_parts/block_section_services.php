<?php
  // There should be a global variable of sorts with some link blocks in
  $services = $globalBlocksServiceGroup;
  $layout = $globalBlocksServiceLayout;
?>

<?php if ($services && is_array($services)) : ?>
  <section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-content o-container-content--v-pad-margin o-container-services o-container-services--<?= $layout ?>">
      <?php foreach ($services as $service) : ?>
        <?php include(locate_template('src/template_parts/block_service.php')) ?>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif; ?>
