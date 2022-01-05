<?php
  $caseStudySize = 'small';
?>

<?php if ((isset($globalCaseStudyIds) && !empty($globalCaseStudyIds)) || isset($globalIntro)) : ?>
  <section class="o-container-section o-container-section--h-bordered">

    <?php if (isset($globalCaseStudyIds) && !empty($globalCaseStudyIds)) : ?>

      <?php
        $caseStudyCount = count($globalCaseStudyIds);
        if ($caseStudyCount > 0) {
          $caseStudyCountainerClass = ' o-container-case-studies--flex';
        } else {
          $caseStudyCountainerClass = ' o-container-content--auto-width--from-medium o-container-case-studies--grid';
        }
      ?>

      <div class="o-container-content o-container-content--v-margin o-container-case-studies <?= $caseStudyCountainerClass ?>">
        <?php foreach ($globalCaseStudyIds as $i => $caseStudyId) : ?>
          <?php include(locate_template('src/template_parts/service_case_study.php')) ?>
        <?php endforeach; ?>
      </div>

      <?php $caseStudyCount = null; ?>
      <?php $globalCaseStudyIds = []; ?>
    <?php endif; ?>

  </section>
<?php endif; ?>