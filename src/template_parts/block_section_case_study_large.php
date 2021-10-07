<?php
  $caseStudySize = 'large';
?>

<?php if (isset($globalCaseStudyIds) && !empty($globalCaseStudyIds)) : ?>

  <section class="o-container-section o-container-section--h-bordered u-ov-hidden">
    <div class="o-container-case-studies o-container-case-studies--flex">
      <?php foreach ($globalCaseStudyIds as $caseStudyId) : ?>
        <?php include(locate_template('src/template_parts/block_case_study.php')) ?>
        <?php if (is_page( 'All case studies' )) : ?>
        <?php include(locate_template('src/template_parts/block_case_study.php')) ?>
        <?php endif; ?>
      <?php endforeach; ?>

      <?php if (is_front_page()) : ?>
        <a href="/our-work"
           class="c-case-study-block c-case-study-block--large c-case-study-block--more js-half-onscreen-detect">
           <div class="c-case-study-block__background"></div>
           <div class="c-case-study-block__content">
             <div class="c-case-study-block__link c-button c-button--underlined-dark">
               See more of our work
             </div>
           </div>
       </a>
     <?php endif; ?>
    </div>
  </section>

  <?php $globalCaseStudyIds = []; ?>
<?php endif; ?>
