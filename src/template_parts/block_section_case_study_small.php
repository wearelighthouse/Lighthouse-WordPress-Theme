<?php
  $caseStudySize = 'large';
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

      <div class="o-container-link-blocks o-container-link-blocks--flex">
        <?php foreach ($globalCaseStudyIds as $caseStudyId) : ?>
          <?php include(locate_template('src/template_parts/block_case_study_small.php')) ?>
        <?php endforeach; ?>
      </div>

      <?php $globalCaseStudyIds = []; ?>
    <?php endif; ?>

  </section>
<?php endif; ?>
