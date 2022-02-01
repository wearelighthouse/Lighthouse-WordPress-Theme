<?php 
    $collaborationTitle = getPostMeta('service_archive_block_service_collaboration_title');
    $collaborationServices = getPostMeta('service_archive_block_service_collaboration_group');
    $collaborationBlocksServiceGroup = getPostMeta('service_archive_block_service_collaboration_group');
    $button = getPostMeta('service_archive_blocks_service_action');
?>

<section class="o-container-section o-service-collaboration">
    <div class="o-container-content c-service-collaboration">
      <?php if ($collaborationTitle) : ?>
        <h3 class="c-service-collaboration__title c-service-template__title">
            <?= $collaborationTitle ?>
        </h3>
      <?php endif; ?>

      <div class="c-service-collaboration__content"> 
        <div class="c-service-collaboration__item">
            <div
              class="c-service-collaboration__item__image-right"
              style="--bg-src: url('<?= get_template_directory_uri(); ?>/assets/img/mask-group.png')"
            >
              <div class="o-dictate">Collaboration</div>
            </div>

          <div class="c-service-collaboration__item__content-container">
              <?php if ($collaborationServices) : ?>
                <?php $collaborationBlocksServiceGroup = array_slice($collaborationServices, 0, 2); ?>
                <?php include(locate_template('src/template_parts/service_collaboration.php')) ?>
              <?php endif; ?>
          </div>
        </div>

        <div class="c-service-collaboration__item">
            <div
              class="c-service-collaboration__item__image-left"
              style="--bg-src: url('<?= get_template_directory_uri(); ?>/assets/img/mask-group-2.png')"
            >
              <div class="o-dictate">Collaboration</div>
            </div>

          <div class="c-service-collaboration__item__content-container">
            <?php if ($collaborationServices) : ?>
              <?php $collaborationBlocksServiceGroup = array_slice($collaborationServices, 2, 3); ?>
              <?php include(locate_template('src/template_parts/service_collaboration.php')) ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      
      <?php if ($button) : ?>
        <div class="c-service-template__button-container">
            <button class="c-service-template__button">
                <a href="/call-to-action"><?= $button ?></a>
            </button>
        </div>
      <?php endif; ?>
    </div>
  </section>