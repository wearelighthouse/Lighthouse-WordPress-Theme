<?php
  $caseStudyIds = getPostMeta('service_archive_case_study_list_clients', $post->ID);
  $blockServices = getPostMeta('service_archive_blocks_service_group');
  $globalBlocksServiceLayout = getPostMeta('service_archive_blocks_service_layout');
?>

<?php get_header(); ?>

<main>

  <?php include(locate_template('src/template_parts/hero.php')) ?>
  <section>
    <ul>
      <li>
        <h3>Discovery</h3>
        <p>
            Idea validation, Product audits, Innovation workshops, User research, Market analysis, Data analysis
        </p>
      </li>
      <li>
        <h3>UX design</h3>
        <p>
          User journey mapping, Wire framing, User testing
        </p>
      </li>
      <li>
        <h3>UI / Design</h3>
        <p>
          Interface design, Design system creation, UI prototypes, Art direction, Illustration / iconography
        </p>
      </li>
    </ul>
    <button><a href="/call-to-action">Call to action</a></button>
  </section>
  <section>
    <h3>Productive collaboration</h3>
    <div>
      <img src="assets/img/ellipse-12.png" alt="">
      <ul>
        <li>
          <h5>Agile always</h5>
          <p>
            We can work with any type of agile and will fit in seamlessly with your workflow. We speak the same language as engineers...
          </p>
        </li>
        <li>
          <h5>Efficient processes</h5>
          <p>
            We’ve fine tuned our processes to make sure we run like a well oiled machine.
          </p>
        </li>
      </ul>
    </div>
    <div>
      <img src="assets/img/ellipse-12.png" alt="">
      <ul>
        <li>
          <h5>Direct collaboration</h5>
          <p>
            You’ll work closely with the designers working on your product. No go-betweens, no mixed messages.
          </p>
        </li>
        <li>
          <h5>High quality comms</h5>
          <p>
            We’re on the ball with reports, updates and discussions. You’ll know what’s just happened and what’s up next.
          </p>
        </li>
      </ul>
    </div>
    <button><a href="/call-to-action">Call to action</a></button>
  </section>
  <section>
    <h3>Client testimonial</h3>
    <q>Lighthouse London immediately gave us confidence they were the right choice to support our business in one of the biggest projects we’ve ever undertaken</q>
    <div>
      <h5>Nick Meyers</h5>
      <p>Director of Technology</p>
      <p>Digital Theatre+</p>
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
