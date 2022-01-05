<?php
  $caseStudySize = 'large';
  $globalIntro = getPostMeta('service_archive_case_study_list_title');
?>

<?php if (isset($globalCaseStudyIds) && !empty($globalCaseStudyIds)) : ?>

  <section class="o-container-section o-container-section--h-bordered u-ov-hidden">
    <div class="o-container-case-studies o-container-case-studies--flex o-container-content c-service-case-study">
        <?php if ($globalIntro) : ?>
            <h2 class="c-service-case-study__title c-service-template__title">
            <?= $globalIntro ?>
            </h2>
        <?php endif; ?>

        <?php foreach ($globalCaseStudyIds as $caseStudyId) : ?>
            <?php include(locate_template('src/template_parts/service_case_study.php')) ?>
        <?php endforeach; ?>
    </div>
  </section>

  <?php $globalCaseStudyIds = []; ?>
<?php endif; ?>
