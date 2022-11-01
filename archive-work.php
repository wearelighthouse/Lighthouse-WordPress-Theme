<?php
  $caseStudyIds = getPostMeta('work_archive_case_study_list_clients', $post->ID);
  $sectorIds = getPostMeta('work_archive_sector_list_sector', $post->ID);
  $srcQueryVar = get_query_var('src');

  if ($srcQueryVar == "home-see-more") {
    $home = get_page_by_title('Home');
    $homeCaseStudies = getPostMeta('front_page_case_study_list_clients', $home->ID);

    $caseStudyIds1 = array_diff($caseStudyIds, $homeCaseStudies);
    $caseStudyIds2 = array_diff($homeCaseStudies, $caseStudyIds);
    $removedDuplicateCaseStudyIds = array_merge($caseStudyIds1, $caseStudyIds2);

    $caseStudyIds = $removedDuplicateCaseStudyIds;
  }

  if ($sectorIds) {
    $linkList = '';

    foreach ($sectorIds as $sectorId) {
      $slug = get_post($sectorId)->post_name;

      $linkList .= ('
        <li>
          <a class="c-tag" href="' . get_permalink($sectorId) . '">
            <img src="' . get_template_directory_uri() . '/dist/svg/' . $slug . '.svg" alt="" width="36px" height="36px">
            <span>' . get_the_title($sectorId) . '</span>
          </a>
        </li>
      ');
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
        <div class="c-work-footer__box" style="width: unset">
          <h3 class="type-cta">See more&hellip;</h3>
          <ul class="o-tag-list o-tag-list--lg">
            <?= $linkList ?>
          </ul>
        </div>
      <?php endif; ?>

    </div>
  </section>

</main>

<?php get_footer(); ?>
