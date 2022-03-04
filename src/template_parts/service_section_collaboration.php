<?php 
    $collaborationTitle = getPostMeta('service_archive_block_service_collaboration_title');
    $collaborationServices = getPostMeta('service_archive_block_service_collaboration_group');
    $button = getPostMeta('service_archive_block_service_collaboration_action');
    $maskImageRight = getPostMeta('service_archive_block_service_collaboration_mask_image_right');
    $maskImageLeft = getPostMeta('service_archive_block_service_collaboration_mask_image_left')
?>

<?php if (isset($collaborationServices) && !empty($collaborationServices)) : ?>
  <section class="o-container-section o-service-collaboration">
    <div class="o-container-content c-service-collaboration">
        <?php if ($collaborationTitle) : ?>
          <h3 class="c-service-collaboration__title c-service-template__title">
              <?= $collaborationTitle ?>
          </h3>
        <?php endif; ?> 

        <div class="c-service-collaboration__content"> 
          <div class="c-service-collaboration__item">
            <?php if ($collaborationServices && count($collaborationServices) >= 2) : ?>
              <?php if ($maskImageRight) : ?>
                <div
                  class="c-service-collaboration__item__image-right"
                  style="--bg-src: url('<?= $maskImageRight ?>')"
                >
                  <div class="o-dictate">Collaboration</div>
                </div>
              <?php endif; ?>
            <?php endif; ?>
              
                <div class="c-service-collaboration__item__content-container">
                  <?php $collaborationBlocksServiceGroup = array_slice($collaborationServices, 0, 2); ?>
                  <?php include(locate_template('src/template_parts/service_collaboration.php')) ?>
                </div>
            </div>

            <?php if ($collaborationServices && count($collaborationServices) > 2) : ?>
              <div class="c-service-collaboration__item">
                <?php if ($collaborationServices && count($collaborationServices) >= 3) : ?>
                  <?php if ($maskImageLeft) : ?>
                    <div
                      class="c-service-collaboration__item__image-left"
                      style="--bg-src: url('<?= $maskImageLeft; ?>')"
                    >
                      <div class="o-dictate">Collaboration</div>
                    </div>
                  <?php endif; ?>
                <?php endif; ?>

                <div class="c-service-collaboration__item__content-container">
                  <?php $collaborationBlocksServiceGroup = array_slice($collaborationServices, 2, 3); ?>
                  <?php include(locate_template('src/template_parts/service_collaboration.php')) ?>
                </div>
              </div>
            <?php endif; ?>
        </div>
        <div class="c-service-template__button-container">
          <?php if ($button) : ?>
          <button class="c-service-template__button">
            <a href="https://wearelighthouse.com/contact/"><?= $button ?></a>
          </button>
          <?php endif; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>