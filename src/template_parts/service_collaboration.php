<?php
  $services = $collaborationBlocksServiceGroup;
?>

<?php if ($services && is_array($services)) : ?>
    <?php foreach ($services as $service) : ?>
        <div class="c-service-content__item__container">
        <?php
            $icon = isset($service['icon']) ? $service['icon'] : false;
            $iconID = isset($service['icon_id']) ? $service['icon_id'] : false;
            $iconAlt = isset($iconID) ? get_post_meta($iconID, '_wp_attachment_image_alt', true) : '';
        ?>
        <?php if ($icon) : ?>
            <div class="c-service-content__icon-container">
                <img class="c-service-content__icon" src="<?= $icon ?>" alt="<?= $iconAlt ?>"/>
            </div>
        <?php endif; ?>
        <?php if (isset($service['text']) || isset($service['sub-title']) ) : ?>
            <div>
                <h3 class="c-service-content__item__subtitle">
                    <?= $service['sub-title'] ?>
                </h3>
                <p class="c-service-content__item__text">
                    <?= $service['text'] ?>
                </p>
            </div>
        <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>