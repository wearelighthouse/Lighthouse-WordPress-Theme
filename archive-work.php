<?php
  $post = get_page_by_title('Our work');
  $caseStudies = getPostMeta('work_case_study_list_client', $post->ID);
?>

<?php get_header(); ?>

<main>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <?php
      $i = 0;
      foreach ($caseStudies as $caseStudyId) {
        if ($i==3) {
          break;
        }
        $caseStudySize = 'large';
        include(locate_template('src/template_parts/block_case_study.php'));
        $i++;
      }
    ?>


    <?php
    $caseStudies = array_splice ( $caseStudies, 3);
    foreach ($caseStudies as $caseStudyId) :
      $caseStudySize = 'small';
      ?>
      <?php include(locate_template('src/template_parts/block_case_study.php')) ?>
    <?php endforeach; ?>

</main>

<?php get_footer(); ?>
