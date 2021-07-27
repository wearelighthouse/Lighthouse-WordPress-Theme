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
      <div class="c-service-category">
        <div class="c-service-category__icon-container">
          <img class="c-service-category__icon" src="https://wearelighthouse.com/wp-content/uploads/2019/10/icon-itl-discovery.svg" alt="">
        </div>

        <h2 class="c-service-category__title c-service-template__title">Discovery</h2>

        <ul class="c-service-category__content">
          <li>Idea validation</li>
          <li>Product audits</li>
          <li>Innovation workshops</li>
          <li>User research</li>
          <li>Market analysis</li>
          <li>Data analysis</li>
        </ul>
      </div>

      <div class="c-service-category">
        <div class="c-service-category__icon-container">
          <img class="c-service-category__icon" src="<?= get_template_directory_uri(); ?>/assets/svg/single/icon-itl-ux-design.svg" alt="">
        </div>

        <h2 class="c-service-category__title c-service-template__title">UX design</h2>

        <ul class="c-service-category__content">
          <li>User journey mapping</li>
          <li>Wire framing</li>
          <li>User testing</li>
        </ul>
      </div>

      <div class="c-service-category">
        <div class="c-service-category__icon-container">
          <img class="c-service-category__icon" src="<?= get_template_directory_uri(); ?>/assets/svg/single/icon-itl-ui-design.svg" alt="">
        </div>

        <h2 class="c-service-category__title c-service-template__title">UI / Design</h2>

        <ul class="c-service-category__content">
          <li>Interface design</li>
          <li>Design system creation</li>
          <li>UI prototypes</li>
          <li>Art direction</li>
          <li>Illustration / iconography</li>
        </ul>
      </div>

      <div class="c-service-category__button-container c-service-template__button-container">
        <button class="c-service-category__button c-service-template__button"><a href="/call-to-action">Call to action</a></button>
      </div>
    </div>
  </section>

  <section>
    <div class="c-service-content">
      <div class="c-service-content__item">
        <div class="c-service-content__item__right">
          <img class="c-service-template__image" src="<?= get_template_directory_uri(); ?>/assets/img/mask-group.png" alt="Collaboration">
        </div>

        <div class="c-service-content__item__left">
          <h3 class="c-service-content__title c-service-template__title">Productive collaboration</h3>

          <div class="c-service-content__item__container">
            <div class="c-service-content__icon-container">
              <img class="c-service-content__icon" src="https://wearelighthouse.com/wp-content/uploads/2019/10/icon-itl-validation.svg" alt="">
            </div>

            <h4 class="c-service-content__subtitle">Agile always</h4>

            <p>
              We can work with any type of agile and will fit in seamlessly with your workflow. We speak the same language as engineers...
            </p>
          </div>

          <div class="c-service-content__item__container">
            <div class="c-service-content__icon-container">
              <img class="c-service-content__icon" src="<?= get_template_directory_uri(); ?>/assets/svg/single/icon-itl-processes.svg" alt="">
            </div>

            <h4 class="c-service-content__subtitle">Efficient processes</h4>

            <p>
              We’ve fine tuned our processes to make sure we run like a well oiled machine.
            </p>
          </div>
        </div>

      </div>

      <div class="c-service-content__item">
        <div class="c-service-content__item__left">
          <img src="<?= get_template_directory_uri(); ?>/assets/img/mask-group-2.png" alt="Collaboration">
        </div>

        <div class="c-service-content__item__right">
          <div class="c-service-content__item__container">
            <div class="c-service-content__icon-container">
              <img class="c-service-content__icon" src="<?= get_template_directory_uri(); ?>/assets/svg/single/icon-itl-collaboration.svg" alt="">
            </div>

            <h4 class="c-service-content__subtitle">Direct collaboration</h4>

            <p>
              You’ll work closely with the designers working on your product. No go-betweens, no mixed messages.
            </p>
          </div>

          <div class="c-service-content__item__container">
            <div class="c-service-content__icon-container">
              <img class="c-service-content__icon" src="<?= get_template_directory_uri(); ?>/assets/svg/single/icon-itl-quality.svg" alt="">
            </div>

            <h4 class="c-service-content__subtitle">High quality comms</h4>
            <p>
              We’re on the ball with reports, updates and discussions. You’ll know what’s just happened and what’s up next.
            </p>
          </div>

          <div class="c-service-template__button-container">
            <button class=" c-service-template__button"><a href="/call-to-action">Call to action</a></button>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="o-container-client-testimonial c-fancy-bg">
    <div class="o-container-content">

      <blockquote class="c-service-client-testimonial">
        <h3 class="c-service-client-testimonial__title c-service-template__title">Client testimonial</h3>
        <p class="c-service-client-testimonial__p">Lighthouse London immediately gave us confidence they were the right choice to support our business in one of the biggest projects we’ve ever undertaken</p>
        <footer class="c-service-client-testimonial__footer">
            <div class="c-service-client-testimonial__footer-content">
              <div class="c-service-client-testimonial__footer-name">Nick Meyers</div>
              <div class="c-service-client-testimonial__footer-job">Director of Technology</div>
              <div class="c-service-client-testimonial__footer-title">Digital Theatre+</div>
            </div>
        </footer>
      </blockquote>

    </div>
  </section>

  <section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-content c-service-mission">
      <h2 class="c-service-mission__title c-service-template__title">Who are we for?</h2>
      <div class="c-service-mission__content">
        <p class="c-service-mission__content-p">Lighthouse partner with both well-established enterprise businesses seeking to inject life into under-performing applications, and funded startups ready to progress their product. These are typically headed up by seasoned founders who love the process as much as the outcome.</p>
        <p class="c-service-mission__content-p">We'll help you find the right way forward, not the path of least resistance.</p>
        <div class="c-service-mission__content-logos c-home-intro__clients c-cta-banner__right">
            
          <div class="c-service-mission__content-logos--clients c-home-intro__clients__img-container" style="-webkit-mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/john-lewis.svg); mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/john-lewis.svg); mask-size: contain; -webkit-mask-size: contain; mask-repeat: no-repeat; -webkit-mask-repeat: no-repeat; width: 165.6px; height: 31.2px">
            <span class="o-dictate">John Lewis logo</span>
          </div>
              
          <div class="c-service-mission__content-logos--clients c-home-intro__clients__img-container" style="-webkit-mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/redbull.svg); mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/redbull.svg); mask-size: contain; -webkit-mask-size: contain; mask-repeat: no-repeat; -webkit-mask-repeat: no-repeat; width: 148.8px; height: 30px">
            <span class="o-dictate">Red Bull logo</span>
          </div>
            
          <div class="c-service-mission__content-logos--clients c-home-intro__clients__img-container" style="-webkit-mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/paypoint.svg); mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/paypoint.svg); mask-size: contain; -webkit-mask-size: contain; mask-repeat: no-repeat; -webkit-mask-repeat: no-repeat; width: 116.4px; height: 24px">
            <span class="o-dictate">PayPoint logo</span>
          </div>
              
          <div class="c-service-mission__content-logos--clients c-home-intro__clients__img-container" style="-webkit-mask-image: url(https://wearelighthouse.com/wp-content/uploads/2020/01/kuoni.svg); mask-image: url(https://wearelighthouse.com/wp-content/uploads/2020/01/kuoni.svg); mask-size: contain; -webkit-mask-size: contain; mask-repeat: no-repeat; -webkit-mask-repeat: no-repeat; width: 122.4px; height: 20.4px">
            <span class="o-dictate">Kuoni logo</span>
          </div>
            
          <div class="c-service-mission__content-logos--clients c-home-intro__clients__img-container" style="-webkit-mask-image: url(https://wearelighthouse.com/wp-content/uploads/2020/02/investec-logo.svg); mask-image: url(https://wearelighthouse.com/wp-content/uploads/2020/02/investec-logo.svg); mask-size: contain; -webkit-mask-size: contain; mask-repeat: no-repeat; -webkit-mask-repeat: no-repeat; width: 159.6px; height: 28.8px">
            <span class="o-dictate">Investec logo</span>
          </div>

          <div class="c-service-mission__content-logos--clients c-home-intro__clients__img-container" style="-webkit-mask-image: url(https://wearelighthouse.com/wp-content/uploads/2020/07/total-logo-home.svg); mask-image: url(https://wearelighthouse.com/wp-content/uploads/2020/07/total-logo-home.svg); mask-size: contain; -webkit-mask-size: contain; mask-repeat: no-repeat; -webkit-mask-repeat: no-repeat; width: 117.6px; height: 36px">
            <span class="o-dictate">Total logo</span>
          </div>
            
          <div class="c-service-mission__content-logos--clients c-home-intro__clients__img-container" style="-webkit-mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/kpmg.svg); mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/kpmg.svg); mask-size: contain; -webkit-mask-size: contain; mask-repeat: no-repeat; -webkit-mask-repeat: no-repeat; width: 88.8px; height: 36px">
            <span class="o-dictate">KPMG logo</span>
          </div>

          <div class="c-service-mission__content-logos--clients c-home-intro__clients__img-container" style="-webkit-mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/va.svg); mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/va.svg); mask-size: contain; -webkit-mask-size: contain; mask-repeat: no-repeat; -webkit-mask-repeat: no-repeat; width: 57.6px; height: 33.6px">
            <span class="o-dictate">V&amp;A logo</span>
          </div>

          <div class="c-service-mission__content-logos--clients c-home-intro__clients__img-container" style="-webkit-mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/twinings.svg); mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/10/twinings.svg); mask-size: contain; -webkit-mask-size: contain; mask-repeat: no-repeat; -webkit-mask-repeat: no-repeat; width: 127.2px; height: 28.8px">
            <span class="o-dictate">Twinings logo</span>
          </div>
        </div>

        <div class="c-service-mission__content-button c-service-template__button-container">
          <button class=" c-service-template__button"><a href="/call-to-action">Call to action</a></button>
        </div>

      </div>
    </div>
  </section>

  <section">
    <div class="o-container-content c-service-case-study"> 

        <h2 class="c-service-case-study__title c-service-template__title">Case studies</h2>

        <a href="https://wearelighthouse.com/our-work/cap-hpi/" class="c-service-case-study__content" data-loaded="true">

          <div class="c-service-case-study__content-background">
              <img class="c-service-case-study__content-background--car-profile" src="<?= get_template_directory_uri(); ?>/assets/svg/single/car-icon.svg" alt>
              <img class="c-service-case-study__content-background--car" src="<?= get_template_directory_uri(); ?>/assets/img/car.png" alt>
          </div>

          <div class="c-service-case-study__content-content">

            <div class="c-case-study-block__logo" style="-webkit-mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/09/Logos-HPI.svg); mask-image: url(https://wearelighthouse.com/wp-content/uploads/2019/09/Logos-HPI.svg); width: 50px; height: 42px">
              <span class="c-case-study-block__logo__alt">HPI</span>
            </div>

            <h3 class="c-case-study-block__title">
              <div href="https://wearelighthouse.com/our-work/cap-hpi/" class="c-service-case-study__content-subtitle c-case-study-block__title__link">
               Selling and buying cars easily
              </div>
            </h3>

            <div href="https://wearelighthouse.com/our-work/cap-hpi/" class="c-service-case-study__content-content--link c-case-study-block__link c-button c-button--underlined-dark">
                Find out more      
            </div>

          </div>
        </a>

    </div>
  </section>

  <section class="o-container-section o-container-section--h-bordered">
    <div class="o-container-content c-service-case-study__parenting">

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
  </section>

  <section class="o-container-section o-container-section--h-bordered">
    <div class="c-form-block c-service__form">
      <script type="text/javascript"></script>
      <div class="gf_browser_chrome gform_wrapper gform_legacy_markup_wrapper" id="gform_wrapper_8">

        <div class="gform_heading">
            <h3 class="gform_title">Newsletter</h3>
            <span class="gform_description">Our four favourite UX, product and innovation stories sent to your inbox, every month. All killer, no filler.
            </span>
        </div>

        <form method="post" enctype="multipart/form-data" id="gform_8" action="/blog/" novalidate="" data-autopilot-anywhere="0001559750737583_12bcc64c3307490d99c963ddfe94609b">
          <div class="gform_body gform-body">

            <ul id="gform_fields_8" class="gform_fields top_label form_sublabel_below description_below">
              <li id="field_8_1" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible">
                <label class="gfield_label" for="input_8_1">Email address
                  <span class="gfield_required">
                    <span class="gfield_required gfield_required_asterisk">*</span>
                  </span>
                </label>
                <div class="ginput_container ginput_container_email">
                  <input autocomplete="disabled" name="input_1" id="input_8_1" type="email" value="" class="large" placeholder="you@somewhere.com" aria-required="true" aria-invalid="false">
                </div>
              </li>
            </ul>

          </div>

          <div class="gform_footer top_label">
            <button type="submit" id="gform_submit_button_8" class="gform_button button" 
              >Sign me up
              <i class="fa fa-refresh"></i>
            </button> 

            <input type="hidden" class="gform_hidden" name="is_submit_8" value="1">
            <input type="hidden" class="gform_hidden" name="gform_submit" value="8">
            <input type="hidden" class="gform_hidden" name="gform_unique_id" value="">
            <input type="hidden" class="gform_hidden" name="state_8" value="WyJbXSIsImMxOTYwZWY2YzU0YjM5M2E0YWJjMmQ1OGZjZjBmOWM4Il0=">
            <input type="hidden" class="gform_hidden" name="gform_target_page_number_8" id="gform_target_page_number_8" value="0">
            <input type="hidden" class="gform_hidden" name="gform_source_page_number_8" id="gform_source_page_number_8" value="1">
            <input type="hidden" name="gform_field_values" value="">
          </div>

        </form>

      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
