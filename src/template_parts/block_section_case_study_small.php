<?php
  $caseStudySize = 'small';
?>

<?php if ((isset($globalCaseStudyIds) && !empty($globalCaseStudyIds)) || isset($globalIntro)) : ?>
  <section class="o-container-section o-container-section--h-bordered">

    <?php if (isset($globalIntro)) : ?>
      <div class="">
        <?= wpautop($globalIntro) ?>
      </div>

      <?php $globalIntro = ''; ?>
    <?php endif; ?>

    <?php if (isset($globalCaseStudyIds) && !empty($globalCaseStudyIds)) : ?>

      <?php
        $caseStudyCount = count($globalCaseStudyIds);
        if ($caseStudyCount > 2) {
          $caseStudyCountainerClass = ' o-container-link-blocks--flex';
        } else {
          $caseStudyCountainerClass = ' o-container-content--auto-width--from-medium o-container-link-blocks--grid';
        }
      ?>

      <div class="o-container-content o-container-content--v-pad o-container-link-blocks <?= $caseStudyCountainerClass ?>">
        <?php foreach ($globalCaseStudyIds as $i => $caseStudyId) : ?>
          <?php include(locate_template('src/template_parts/block_case_study.php')) ?>
        <?php endforeach; ?>
      </div>

      <?php $caseStudyCount = null; ?>
      <?php $globalCaseStudyIds = []; ?>
    <?php endif; ?>

  </section>
<?php endif; ?>
