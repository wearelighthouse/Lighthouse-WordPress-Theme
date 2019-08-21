<?php

  // There should be a global variable of sorts with some link blocks in
  $caseStudies = $globalBlocksCaseStudyGroup;
  $intro = $globalBlocksCaseStudyIntro

?>

<?php if (($caseStudies && is_array($caseStudies)) || $intro) : ?>
  <section class="o-container-section o-container-section--h-bordered">

    <div class="o-container-link-blocks o-container-link-blocks--flex">
      <?php foreach ($caseStudies as $caseStudy) : ?>
        <?php include(locate_template('src/template_parts/block_case_study_small.php')) ?>
      <?php endforeach; ?>
    </div>

  </section>
<?php endif; ?>