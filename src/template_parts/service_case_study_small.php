<?php
  $caseStudySize = 'small';
?>

<?php if ((isset($globalCaseStudyIds) && !empty($globalCaseStudyIds)) || isset($globalIntro)) : ?>
  <section class="o-container-section o-container-section--h-bordered">

    <?php if (isset($globalCaseStudyIds) && !empty($globalCaseStudyIds)) : ?>

      <div class="o-container-content o-container-content--v-margin o-container-case-studies">
        <?php foreach ($globalCaseStudyIds as $i => $caseStudyId) : ?>
          <?php include(locate_template('src/template_parts/service_case_study.php')) ?>
        <?php endforeach; ?>
      </div>

      <?php $caseStudyCount = null; ?>
      <?php $globalCaseStudyIds = []; ?>
    <?php endif; ?>

  </section>
<?php endif; ?>