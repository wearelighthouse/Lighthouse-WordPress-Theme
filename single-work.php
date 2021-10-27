<?php
  $heroContent = '<h1>' . get_the_excerpt() . '</h1>';
  //$heroImage = getPostMeta('work_work_image_large', $post->ID);

  // get the stats
  $stats = getPostMeta('work_single_work_options_stats', $post->ID);

  $clutch = getPostMeta('work_single_work_options_clutch_score', $post->ID);
  $clutchScore = '';
  if ($clutch > 0) {
    $clutchScore = '<div class="c-clutch"><div class="c-clutch__logo"></div><div class="c-clutch__score" style="width:' . (65 * (($clutch/10) * 2)) . 'px"></div></div>';
  }

  $linkList = '';

  $services = getPostMeta('work_single_service_list_service', $post->ID);
  if ($services) {
    foreach ($services as $service) {
      $linkList .= '<li><a class="c-tag" href="' . get_permalink($service) . '">' . get_the_title($service) . '</a></li>';
    }
  }

  $sectors = getPostMeta('work_single_sector_list_sector', $post->ID);
  if ($sectors) {
    foreach ($sectors as $sector) {
      $linkList .= '<li><a class="c-tag" href="' . get_permalink($sector) . '">' . get_the_title($sector) . '</a></li>';
    }
  }


  $contactText = getPostMeta('work_single_work_options_footer_contact_text');

  $companyTitle = getPostMeta('work_single_company_stats_company');
  // $companies = getPostMeta('work_single_company_stats_company_stats', $post->ID);
  $teamTitle = getPostMeta('work_single_team_stats_team');
  $teams = getPostMeta('work_single_team_stats_team_stats', $post->ID);

  $content = get_the_content();

  if ($companyTitle && $teamTitle) {
    $pattern ='#<h[1-5][^>]*>#i';
    $replace = '<h3 class="u-display-none--from-medium">';
    $content = preg_replace($pattern, $replace, $content, 1);
    $content = apply_filters( 'the_content', $content );
    $content = str_replace( ']]>', ']]&gt;', $content );
  }

  $svgSpriteSheet = get_template_directory_uri() . '/dist/svg/sprites.svg';
  $companies = getPostMeta('work_single_company_stats_company_stats', $post->ID);

?>

<?php get_header(); ?>

<?php // Work pages can have full-width stuff that needs the --scrollbar-width variable ?>
<script src="<?= get_template_directory_uri()?>/dist/js/scrollbar-width.min.js"></script>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

     <section class="o-container-section o-container-section--bordered">
      <div class="o-container-content o-container-content--v-margin c-content-grid">

          <div class="case-study-stat__container c-content-grid__left">

            <div class="case-study-stat">
              <?php if (isset($companyTitle)) : ?>
                <h3 class="case-study-stat__title"><?= $companyTitle ?></h3>
              <?php endif; ?>
              <div class="case-study-stat__content">
                <?php if (isset($companies) && !empty($companies) && isset($companies[0]['company-text'])) : ?>
                  <?php foreach($companies as $company) : ?>
                    <div class="case-study-stat__content--block">
                      <?php if (isset($company['type']) && $company['company-text']) : ?>
                        <img src="<?= get_template_directory_uri() ?>/dist/svg/<?= strToLower($company['type']) ?>.svg" alt="" width="24px" height="24px"/>
                        <p><?= $company['company-text']; ?></p>
                      <?php endif; ?>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>

            <div class="case-study-stat">
              <?php if (isset($teamTitle)): ?>
                <h3 class="case-study-stat__title"><?= $teamTitle ?></h3>
              <?php endif; ?>
              <div class="case-study-stat__content">
                <?php if (isset($teams) && !empty($teams)):  ?>
                  <?php foreach($teams as $team) : ?>
                    <div class="case-study-stat__content--block">
                      <?php if (isset($team['stat_number']) && isset($team['stat_text'])) : ?>
                      <p><?= $team['stat_number'] ?></p>
                      <p><?= $team['stat_text'] ?></p>
                      <?php endif; ?>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <?php if ($companyTitle && $teamTitle) : ?>
            <?= $content; ?>
          <?php else : ?>
            <?php the_content() ?>
          <?php endif; ?>
      </div>
    </section>

    <?php if ($stats): ?>
      <section class="o-container-section o-container-section--bordered">
        <div class="o-container-content c-work-results">

          <?php foreach($stats as $stat): ?>
  					<div class="c-work-results__result">
              <strong class="c-work-results__number"><?= $stat['stat_number']; ?></strong>
              <span class="c-work-results__text"><?= $stat['stat_text']; ?></span>
  					</div>
          <?php endforeach; ?>

          <?php if ($clutch) : ?>
      			<div class="c-work-results__result c-work-results__result--clutch">
              <span class="c-work-results__number" style="width:<?= ($clutch*24);?>px"><?= $clutch;?></span>
              <span class="c-work-results__text"></span>
      			</div>
      		<?php endif; ?>

        </div>
      </section>
    <?php	endif; ?>

    <section class="o-container-content o-container-content--v-margin">
      <div class="c-work-footer">

        <?php if ($linkList) : ?>
        	<div class="c-work-footer__box">
        		<h3 class="type-cta">See more&hellip;</h3>
        		<ul class="o-tag-list">
        			<?= $linkList; ?>
        		</ul>
        	</div>
        <?php endif; ?>

        <?php if ($contactText) : ?>
        	<div class="c-work-footer__box">
        		<p class="type-static-subtitle"><?= $contactText ?></p>
            <a class="u-inline-block c-button c-button--underlined-dark" href="/contact">
              Get in touch
            </a>
        	</div>
        <?php endif ?>

      </div>
    </section>

  <?php endwhile; ?>

</main>

<?php get_footer(); ?>
