<?php
  $caseStudyIds = getPostMeta('service_archive_case_study_list_clients', $post->ID);
  $introText = getPostMeta('service_archive_home_intro_text');
  $blockServices = getPostMeta('page_blocks_service_group');
  $globalBlocksServiceLayout = getPostMeta('page_blocks_service_layout');
  $globalBlocksServiceGroup = getPostMeta('page_blocks_service_group');
  $globalIntro = getPostMeta('service_archive_case_study_list_title');
  $button = getPostMeta('page_blocks_service_action');

  $contentParagraphs = get_the_content();
  $pattern = "/([[quote])(.*?)(\[\/quote\])/i";

  $contentParagraphs = preg_replace($pattern, '',  $contentParagraphs);
  $contentParagraphs = apply_filters( 'the_content',  $contentParagraphs );
  $contentParagraphs = str_replace( ']]>', ']]&gt;',  $contentParagraphs );

  $contentQuote = get_the_content();
  $matches = [];
  $contentQuote = preg_match($pattern, $contentQuote, $matches);
  $contentQuote = $matches[0];
  $contentQuote = apply_filters('the_content', $contentQuote);
?>


<?php get_header(); ?>

<main>

  <?php include(locate_template('src/template_parts/hero.php')) ?>

<?php if ($contentParagraphs) : ?>
  <section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-content o-container-content--v-pad-margin c-service-content">
        <?= $contentParagraphs; ?>
    </din>
  </section>
<?php endif; ?>

  <?php if ($blockServices) : ?>
    <?php $globalBlocksServiceGroup = $blockServices; ?>
    <?php $globalSkillsWithOrangeTitle = true; ?>
    <?php include(locate_template('src/template_parts/block_section_services.php')) ?>

    <?php if ($button) : ?>
      <div class="c-service-skills__button c-service-template__button-container o-container-content">
        <a href="/contact" class="c-service-template__button">
          <span><?= $button ?></span>
        </a>
      </div>
    <?php endif; ?>
  <?php endif; ?>

  <?php include(locate_template('src/template_parts/service_section_collaboration.php')) ?>

  <section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-content o-container-content--v-pad-margin">
      <?php if ($contentQuote) : ?>
        <?= $contentQuote; ?>
      <?php endif; ?>
    </div>
  </section>

  <?php include(locate_template('src/template_parts/service_intro.php')) ?>

  <?php if ($globalIntro) : ?>
    <div class="o-container-content">
      <h2 class="type-title c-service-case-studies__title"><?= $globalIntro ?></h2>
    </div>

    <?php $globalIntro = ''; ?>
  <?php endif; ?>

  <?php if ($caseStudyIds) : ?>
    <?php $globalCaseStudyIds = array_slice($caseStudyIds, 0, 1); ?>
    <?php $globalcaseStudyAlignRight = true; ?>
    <?php include(locate_template('src/template_parts/block_section_case_study_large.php')) ?>
    <?php $globalcaseStudyAlignRight = false; ?>
  <?php endif; ?>

  <?php if ($caseStudyIds && count($caseStudyIds) > 1) : ?>
    <?php $globalCaseStudyIds = array_slice($caseStudyIds, 1) ?>
    <?php $globalcaseStudyServiceAlignment = true; ?>
    <?php include(locate_template('src/template_parts/block_section_case_study_small.php')) ?>
    <?php $globalcaseStudyServiceAlignment = false; ?>
  <?php endif; ?>

  <?php $newsletterFormId = RGFormsModel::get_form_id('Newsletter'); ?>

  <?php if ($newsletterFormId): ?>
    <section class="o-container-section o-container-section--h-bordered">
      <?= do_shortcode('[form id="' . $newsletterFormId . '"]') ?>
    </section>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
