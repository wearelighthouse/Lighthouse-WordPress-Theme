<?php
  $caseStudySize = 'large';
?>

<?php if (isset($globalCaseStudyIds) && !empty($globalCaseStudyIds)) : ?>

  <section class="o-container-section o-container-section--h-bordered u-ov-hidden">
    <div class="o-container-case-studies o-container-case-studies--flex">
      <?php foreach ($globalCaseStudyIds as $caseStudyId) : ?>
        <?php include(locate_template('src/template_parts/block_case_study.php')) ?>
      <?php endforeach; ?>
    </div>
  </section>

  <?php $globalCaseStudyIds = []; ?>
<?php endif; ?>
