<?php
  $emColor = '#E5B300';
?>

<section class="o-container-section o-container-section--bordered">
  <div class="c-hero" style="margin: 0;">
    <div class="o-container-content o-container-content--v-pad c-hero__content" style="flex-direction: initial;">
      <div
        class="c-hero__text s-banner s-beacon-links c-hero__text--with-image"
        style="padding-top: 3rem; margin-bottom: 0; <?= $emColor ? '--em-color: ' . $emColor : '' ?>"
      >
        <h1>
          Your team is current at stage <?= $maturity_level ?>, <em><?= array_keys($content)[$maturity_level - 1] ?></em>
        </h1>
        <p><?= $resultContent['intro'] ?></p>
      </div>

      <div class="c-hero__beacon-card-container u-display-none--upto-medium">
        <div class="c-beacon-card" style="--content: '<?= round($totalScore) ?>%'" data-level="<?= $maturity_level ?>">
          <div><span></span></div>
          <div><span></span></div>
          <div><span></span></div>
          <div><span></span></div>
          <div><span></span></div>
        </div>
      </div>
    </div>
  </div>
</section>
