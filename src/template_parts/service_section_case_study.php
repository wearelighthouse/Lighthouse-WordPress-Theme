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
            <?php include(locate_template('src/template_parts/service_case_study_large.php')) ?>
        <?php endforeach; ?>

        <div class="c-service-case-study__parenting">

            <a href="https://wearelighthouse.com/our-work/dots-action-children/" class="c-service-case-study__parenting-block data-loaded="true">

                <div class="c-service-case-study__parenting-block--image">
                    <img src="<?= get_template_directory_uri(); ?>/assets/svg/single/activities.svg" alt>
                    <img src="<?= get_template_directory_uri(); ?>/assets/svg/single/parent-wellbeing.svg" alt>
                </div>

                <div>
                <div class="c-service-case-study__parenting-content">
                    <div class="c-case-study-block__logo" style="-webkit-mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/actionforchildren-logo.svg); mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/actionforchildren-logo.svg); width: 100px; height: 60px">
                    <span class="c-case-study-block__logo__alt">
                        Action for Children
                    </span>
                    </div>

                    <h3 class="c-service-case-study__parenting-content--title">
                    <div href="https://wearelighthouse.com/our-work/dots-action-children/" class="c-case-study-block__title__link">A new parenting platform from an innovative charity
                    </div>
                    </h3>
                    <p class="c-service-case-study__parenting-content--p">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                </div>
                </div>
            </a>

            <a href="https://wearelighthouse.com/our-work/dots-action-children/" class="c-service-case-study__parenting-block" data-loaded="true">

                <div class="c-service-case-study__parenting-block--image c-case-study-block__image-medium js-child-loaded">
                <img src="<?= get_template_directory_uri(); ?>/assets/svg/single/activities.svg" alt>
                <img src="<?= get_template_directory_uri(); ?>/assets/svg/single/parent-wellbeing.svg" alt>
                </div>
                <div>

                <div class="c-service-case-study__parenting-content">

                    <div class="c-case-study-block__logo" style="-webkit-mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/actionforchildren-logo.svg); mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/actionforchildren-logo.svg); width: 100px; height: 60px">
                    <span class="c-case-study-block__logo__alt">
                        Action for Children
                    </span>
                    </div>
                    <div class="c-service-case-study__parenting-content--content">
                    <p class="c-service-case-study__parenting-content--p">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu.</p>
                    <p>Key statistic</p>
                    <p><span>50</span> Hours of discovery</p>
                    </div>
                </div>

                </div>
            </a>

        </div>
    </div>
  </section>

  <?php $globalCaseStudyIds = []; ?>
<?php endif; ?>
