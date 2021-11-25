<?php
  // There should be a global variable of sorts with some link blocks in
  $services = $globalBlocksServiceGroup;
  $layout = $globalBlocksServiceLayout;
  $button = getPostMeta('service_archive_block_services_action');

?>

<?php if ($services && is_array($services)) : ?>
  <section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-content o-container-content--v-pad-margin o-container-services o-container-services--<?= $layout ?>">
      <?php foreach ($services as $service) : ?>
        <?php include(locate_template('src/template_parts/service_category.php')) ?>
      <?php endforeach; ?>
    <?php if ($button) : ?>
        <div class="c-service-category__button-container c-service-template__button-container">
            <button class="c-service-category__button c-service-template__button">
                <a href="/call-to-action"><?= $button ?></a>
            </button>
        </div>
    <?php endif; ?>
    </div>
  </section>
<?php endif; ?>
