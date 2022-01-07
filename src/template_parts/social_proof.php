<?php
  $socialProofs = getPostMeta('front_page_social_proof_social_proof');

?>

<section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-content o-container-content--v-pad-margin c-social-proof">
    <?php if (isset($socialProofs) && !empty($socialProofs)) : ?>
        <div class="c-social-proof__item">
            <?php foreach ($socialProofs as $socialProof) : ?>
                <?php $stars = $socialProof['social-proof_score'] ?>
                <a class="c-social-proof__content">
                    <img src="<?= get_template_directory_uri() ?>/dist/svg/<?= strToLower($socialProof['type']) ?>.svg" alt=""/>
                <?php if ($stars > 0) : ?>
                    <div class="c-social-proof__star" style="width:' <?php (65 * (($stars/10) * 2)) ?>'px"></div>
                <?php endif; ?>
                <?php if ($socialProof['number-1'] && $socialProof['text-1']) : ?>
                    <p class="c-social-proof__text"><span> Top <?= $socialProof['number-1'] ?></span> <?= $socialProof['text-1'] ?></p>
                <?php endif; ?>
                <?php if ($socialProof['number-2'] && $socialProof['text-2']) : ?>
                    <p class="c-social-proof__text"><span> Top <?= $socialProof['number-2'] ?></span> <?= $socialProof['text-2'] ?></p>
                <?php endif; ?>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    </div>
</section>