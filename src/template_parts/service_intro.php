<?php
  $introText = getPostMeta('service_archive_home_intro_text');
  $serviceItroTitle = getPostMeta('service_archive_home_intro_title');
  $button = getPostMeta('service_archive_blocks_service_action');
?>

<section class="o-container-section o-container-section--h-bordered">
  <div class="o-container-content c-service-mission">
  <?php if ($serviceItroTitle) : ?>
        <h2 class="c-service-mission__title c-service-template__title">
           <?= $serviceItroTitle ?>
        </h2>
    <?php endif; ?>

    <div class="c-service-mission__content">
        <?php if ($introText) : ?>
            <?= $introText ?>
        <?php endif; ?>

        <div>
            <img src="<?= get_template_directory_uri() ?>/dist/svg/clients-logos.svg" alt="Clents logos">
        </div>

        <?php if ($button) : ?>
          <div class="c-service-template__button-container">
              <button class="c-service-template__button">
                  <a href="/call-to-action"><?= $button ?></a>
              </button>
          </div>
        <?php endif; ?>

    </div>
  </div>
</section>
