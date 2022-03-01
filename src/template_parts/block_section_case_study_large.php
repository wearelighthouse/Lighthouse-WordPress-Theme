<?php
  $caseStudySize = 'large';
  $caseStudyIndex = 1;
?>

<?php if (isset($globalCaseStudyIds) && !empty($globalCaseStudyIds)) : ?>

  <section class="o-container-section o-container-section--h-bordered u-ov-hidden">
    <div class="o-container-case-studies o-container-case-studies--flex">
      <?php foreach ($globalCaseStudyIds as $caseStudyId) : ?>
        <?php include(locate_template('src/template_parts/block_case_study.php')) ?>
        <?php if (is_page_template(('template-all-case-studies.php'))) : ?>
          <?php include(locate_template('src/template_parts/block_case_study.php')) ?>
        <?php endif; ?>
        <?php $caseStudyIndex++; ?>
      <?php endforeach; ?>

      <?php if (is_front_page()) : ?>
        <div class="o-container-content">
          <a href="/our-work"
             class="c-case-study-block c-case-study-block--large c-case-study-block--more js-half-onscreen-detect"
             aria-labelledby="see-more-text"
          >
             <div class="c-case-study-block__content c-case-study-block--more__content">
                <img src="<?= get_template_directory_uri() ?>/dist/svg/bubble.svg" alt="Bubble with ellipsis" width="58px" height="54px"/>

                <div
                  id="see-more-text"
                  class="c-case-study-block__link c-button c-button--underlined-dark c-button--short-underline"
                >
                  See more of our work
                </div>
             </div>
         </a>
        </div>
     <?php endif; ?>
    </div>
  </section>

  <?php $globalCaseStudyIds = []; ?>
<?php endif; ?>
