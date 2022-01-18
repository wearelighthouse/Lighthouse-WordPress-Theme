<?php
  $socialProofs = getPostMeta('front_page_social_proof_social_proof');
?>

<section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-content o-container-content--v-pad-margin c-social-proof">
    <?php if (isset($socialProofs) && !empty($socialProofs)) : ?>
        <div class="c-social-proof__container">
            <?php foreach ($socialProofs as $socialProof) : ?>
                <?php
                    $stars = $socialProof['social-proof_score'];
                    $socialLink = $socialProof['url'];
                    $logoSrc = $socialProof['social-proof-icon'];
                    $logoAlt = get_post_meta($socialProof['social-proof-icon_id'], '_wp_attachment_image_alt', true);
                ?>

                <a href="<?= $socialLink ?>" class="c-social-proof__content">
                    <img src="<?= $logoSrc ?>" alt="<?= $logoAlt ?>"/>
                    <?php if ($stars > 0) : ?>
                        <div class="c-social-proof__star" style="width:' <?php (65 * (($stars/10) * 2)) ?>'px"></div>
                    <?php endif; ?>
                    <div class="c-social-proof__text">
                        <?= wpautop($socialProof['text']) ?>
                    </div>
                </a>

            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    </div>
</section>
