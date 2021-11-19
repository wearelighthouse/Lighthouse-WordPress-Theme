<?php
  $services = $collaborationBlocksServiceGroup;


  $iconID = isset($service['icon_id']) ? $service['icon_id'] : false;
  $iconAlt = isset($iconID) ? get_post_meta($iconID, '_wp_attachment_image_alt', true) : '';
?>

<?php if ($services && is_array($services)) : ?>
    <?php foreach ($services as $service) : ?>
        <div class="c-service-content__item__container">

            <?php if (isset($service['type'])) : ?>
                <div class="c-service-content__icon-container">
                    <img class="c-service-content__icon" src="<?= get_template_directory_uri() ?>/dist/svg/<?= strToLower($service['type']) ?>.svg" alt=""/>
                </div>
            <?php endif; ?>

            <?php if (isset($service['subTitle'])) : ?>
                <h4 class="c-service-content__subtitle">
                    <?= $service['subTitle'] ?>
                </h4>
            <?php endif; ?>

            <?php if (isset($service['description'])) : ?>
                <p class="c-service-content__subtitle">
                    <?= $service['description'] ?>
                </p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>