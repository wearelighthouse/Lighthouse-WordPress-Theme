<?php
  $socialProofs = getPostMeta('front_page_social_proof_social_proof');
?>

<?php if (isset($socialProofs) && !empty($socialProofs)) : ?>
    <section class="o-container-section o-container-section--h-bordered">
        <div class="o-container-content o-container-content--v-pad-margin">
            <div class="c-social-proof">
                <?php foreach ($socialProofs as $socialProof) : ?>
                    <?php
                        $stars = $socialProof['social-proof_score'];
                        $socialLink = $socialProof['url'];
                        $logoSrc = $socialProof['social-proof-icon'];
                        $logoAlt = get_post_meta($socialProof['social-proof-icon_id'], '_wp_attachment_image_alt', true);
                    ?>

                    <a href="<?= $socialLink ?>" class="c-social-proof__link">
                        <div class="c-social-proof__link__image-container">
                            <img src="<?= $logoSrc ?>" alt="<?= $logoAlt ?>"/>
                        </div>
                        <?php if ($stars > 0) : ?>
                            <div class="c-social-proof__link__star" style="width:' <?php (65 * (($stars/10) * 2)) ?>'px"></div>
                        <?php endif; ?>
                        <div class="c-social-proof__link__text">
                            <?= wpautop($socialProof['text']) ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
