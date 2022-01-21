<?php
  $socialProofs = getPostMeta('front_page_social_proof_social_proof');
?>

<?php if (isset($socialProofs) && !empty($socialProofs)) : ?>
    <section class="o-container-section o-container-section--h-bordered">
        <div class="o-container-content o-container-content--v-pad-margin">
            <div class="c-social-proof">
                <?php foreach ($socialProofs as $socialProof) : ?>
                    <?php
                        $stars = isset($socialProof['score']) ? $socialProof['score'] : 0;
                        $socialLink = $socialProof['url'];
                        $logoSrc = isset($socialProof['icon']) ? $socialProof['icon'] : '';
                        $logoAlt = isset($socialProof['icon_id']) ? get_post_meta($socialProof['icon_id'], '_wp_attachment_image_alt', true) : '';
                        $text = isset($socialProof['text']) ? $socialProof['text'] : '';
                    ?>

                    <a href="<?= $socialLink ?>" class="c-social-proof__link">
                        <div class="c-social-proof__link__image-container">
                            <?php if ($logoSrc) : ?>
                                <img src="<?= $logoSrc ?>" alt="<?= $logoAlt ?>"/>
                            <?php endif; ?>
                        </div>

                        <div class="c-social-proof__link__stars"></div>

                        <div class="c-social-proof__link__text">
                            <?= wpautop($text) ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
