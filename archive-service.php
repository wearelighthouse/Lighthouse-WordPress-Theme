<?php
  $caseStudyIds = getPostMeta('service_archive_case_study_list_clients', $post->ID);
  $blockServices = getPostMeta('service_archive_blocks_service_group');
  $globalBlocksServiceLayout = getPostMeta('service_archive_blocks_service_layout');
?>

<?php get_header(); ?>

<main>

  <?php include(locate_template('src/template_parts/hero.php')) ?>

  <section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-content o-container-content--v-pad-margin o-container-services o-container-services--3-column">
      <div>
        <div class="c-service-template__icon-container">
          <img class="c-service-block__icon" src="https://wearelighthouse.com/wp-content/uploads/2019/10/icon-itl-discovery.svg" alt="">
        </div>
        <h3 class="c-service-block__title c-service-template__title">Discovery</h3>
        <ul class="c-service-template__item">
          <li>Idea validation</li>
          <li>Product audits</li>
          <li>Innovation workshops</li>
          <li>User research</li>
          <li>Market analysis</li>
          <li>Data analysis</li>
        </ul>
      </div>
      <div>
        <div class="c-service-template__icon-container">
          <img class="c-service-block__icon" src="<?= get_template_directory_uri(); ?>/assets/svg/single/icon-itl-ux-design.svg" alt="">
        </div>
        <h3 class="c-service-block__title c-service-template__title">UX design</h3>
        <ul class="c-service-template__item">
          <li>User journey mapping</li>
          <li>Wire framing</li>
          <li>User testing</li>
        </ul>    
      </div>
      <div>
        <div class="c-service-template__icon-container">
          <img class="c-service-block__icon" src="<?= get_template_directory_uri(); ?>/assets/svg/single/icon-itl-ui-design.svg" alt="">
        </div>
        <h3 class="c-service-block__title c-service-template__title">UI / Design</h3>
        <ul class="c-service-template__item">
          <li>Interface design</li>
          <li>Design system creation</li>
          <li>UI prototypes</li>
          <li>Art direction</li>
          <li>Illustration / iconography</li>
        </ul>
      </div>
      <p>
        <button class="c-service-template__button"><a href="/call-to-action">Call to action</a></button>
      </p>
    </div>
  </section>
  <section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-content o-container-content--v-pad-margin">
      <h3 class="c-service-block__title type-title">Productive collaboration</h3>
      <div class="c-service-template__container c-service-template__fd-row">
        <ul>
          <li>
            <div class="c-service-block__icon-container">
              <img class="c-service-block__icon" src="https://wearelighthouse.com/wp-content/uploads/2019/10/icon-itl-validation.svg" alt="">
            </div>
            <h4 class="c-service-block__title type-title">Agile always</h4>
            <p>
              We can work with any type of agile and will fit in seamlessly with your workflow. We speak the same language as engineers...
            </p>
          </li>
          <li>
            <div class="c-service-block__icon-container">
              <img class="c-service-block__icon" src="<?php echo get_template_directory_uri(); ?>/assets/svg/single/icon-itl-processes.svg" alt="">
            </div>
            <h4 class="c-service-block__title type-title">Efficient processes</h4>
            <p>
              We’ve fine tuned our processes to make sure we run like a well oiled machine.
            </p>
          </li>
        </ul>
        <div>
          <img class="c-service-template__image" src="<?php echo get_template_directory_uri(); ?>/assets/img/mask-group.png" alt="Collaboration">
        </div>
      </div>
      <div class="c-service-template__container c-service-template__fd-row-reverse">
        <ul>
          <li>
            <div class="c-service-block__icon-container">
              <img class="c-service-block__icon" src="<?php echo get_template_directory_uri(); ?>/assets/svg/single/icon-itl-collaboration.svg" alt="">
            </div>
            <h4 class="c-service-block__title type-title">Direct collaboration</h4>
            <p>
              You’ll work closely with the designers working on your product. No go-betweens, no mixed messages.
            </p>
          </li>
          <li>
            <div class="c-service-block__icon-container">
              <img class="c-service-block__icon" src="<?php echo get_template_directory_uri(); ?>/assets/svg/single/icon-itl-quality.svg" alt="">
            </div>
            <h4 class="c-service-block__title type-title">High quality comms</h4>
            <p>
              We’re on the ball with reports, updates and discussions. You’ll know what’s just happened and what’s up next.
            </p>
          </li>
        </ul>
        <div>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/mask-group-2.png" alt="Collaboration">
        </div>
      </div>
      <p>
        <button class="c-service-template__button"><a href="/call-to-action">Call to action</a></button>
      </p>
    </div>
  </section>
  <section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-content o-container-content--v-pad-margin">
      <blockquote class="c-blockquote c-blockquote--client">
        <h3 class="c-blockquote-__title c-service-template__title">Client testimonial</h3>
        <p class="c-service-template-p">Lighthouse London immediately gave us confidence they were the right choice to support our business in one of the biggest projects we’ve ever undertaken</p>
        <footer>
          <div class="c-blockquote__person">
            <div class="c-blockquote__text">
              <div class="c-blockquote__name">Nick Meyers</div>
              <div class="c-blockquote__title">Director of Technology</div>
              <div class="c-blockquote__title">Digital Theatre+</div>
            </div>
          </div>
        </footer>
      </blockquote>
    </div>
  </section>
   
   <?php for ($section = 0; ((is_array($blockServices) && $section < count($blockServices)) || (is_array($caseStudyIds) && $section < count($caseStudyIds))) && $section < 60; $section++) : ?>

    <?php if ($blockServices && count($blockServices) > $section) : ?>
      <?php $globalBlocksServiceGroup = [$blockServices[$section]]; ?>
      <?php include(locate_template('src/template_parts/block_section_services.php')) ?>
    <?php endif; ?>

    <?php if ($caseStudyIds) : ?>
      <?php $globalCaseStudyIds = array_slice($caseStudyIds, $section * 2, ($section + 1) * 2); // Pairs of case studies ?>
      <?php include(locate_template('src/template_parts/block_section_case_study_small.php')) ?>
    <?php endif; ?>

  <?php endfor; ?>

</main>

<?php get_footer(); ?>
