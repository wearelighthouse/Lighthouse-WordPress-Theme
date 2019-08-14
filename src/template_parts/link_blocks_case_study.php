<?php

  // There should be a global variable of sorts with some link blocks in
  $caseStudies = $globalLinkBlocksCaseStudy; // ?

?>

<?php if ($caseStudies && is_array($caseStudies)) : ?>
  <section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-link-blocks o-container-link-blocks--flex">
      <?php foreach ($caseStudies as $caseStudy) : ?>
        <?php include(locate_template('src/template_parts/link_block_case_study.php')) ?>
      <?php endforeach; ?>
    </div>
  </section>
<?php endif; ?>