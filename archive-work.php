<?php
  $caseStudyIds = getPostMeta('work_archive_case_study_list_clients', $post->ID);

  $sectors = getPostMeta('work_archive_sector_list_sector', $post->ID);

  if ($sectors) {
    $linkList = '';

    foreach ($sectors as $sector) {
      $linkList .= '<li><a class="c-tag" href="' . get_permalink($sector) . '">' . get_the_title($sector) . '</a></li>';
    }
  }
?>

<?php get_header(); ?>

<main>

  <?php include(locate_template('src/template_parts/hero.php')) ?>

  <?php if ($caseStudyIds) : ?>
    <?php $globalCaseStudyIds = array_slice($caseStudyIds, 0, 2); // 1st 3 case studies ?>
    <?php include(locate_template('src/template_parts/block_section_case_study_large.php')) ?>
  <?php endif; ?>

  <?php include(locate_template('src/template_parts/contact_us_banner.php')) ?>

  <?php if ($caseStudyIds && count($caseStudyIds) > 2) : ?>
    <?php $globalCaseStudyIds = array_slice($caseStudyIds, 2); // the remaining ?>
    <?php include(locate_template('src/template_parts/block_section_case_study_small.php')) ?>
  <?php endif; ?>

  <section class="o-container-content o-container-content--v-margin">
    <div class="c-work-footer">

      <?php if (isset($linkList)) : ?>
        <div class="c-work-footer__box">
          <h3 class="type-cta">See more&hellip;</h3>
          <ul class="o-tag-list">
            <?= $linkList ?>
          </ul>
        </div>
      <?php endif; ?>

    </div>
  </section>

</main>

<?php get_footer(); ?>
