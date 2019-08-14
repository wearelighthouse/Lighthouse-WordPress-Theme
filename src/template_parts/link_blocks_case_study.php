<?php

  // There should be a global variable of sorts with some link blocks in
  $caseStudies = $globalLinkBlocksCaseStudy; // ?

  pr("test");

  pr($globalLinkBlocksCaseStudy);

?>

<?php if ($caseStudies && is_array($caseStudies)) : ?>
  <?php pr("test2"); ?>
  <section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-content o-container-content--v-pad o-container-link-blocks o-container-link-blocks--grid">
      <?php foreach ($caseStudies as $caseStudy) : ?>
        <?php pr($caseStudy); ?>
        <?php include(locate_template('src/template_parts/link_block_case_study.php')) ?>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif; ?>