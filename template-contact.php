<?php
  /* Template Name: Contact */

  // Get the contact page link block things
  $blocks = getPostMeta('contact_template_contact_template_blocks');

  // Get the spritesheet URL
  $svgSpriteSheet = get_template_directory_uri() . '/dist/svg/sprites.svg';
?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>
    <?php include(locate_template('src/template_parts/hero.php')) ?>

    <section class="o-container-section o-container-section--bordered">
      <div class="o-container-content o-container-content--v-margin s-content">
        <?php the_content(); ?>
      </div>

      <?php if ($blocks) : ?>
        <div class="o-container-content o-container-content--v-margin o-container-services o-container-services--3-column">
          <?php foreach ($blocks as $block) : ?>
            <a href="<?= isset($block['link_url']) ? $block['link_url'] : '' ?>" class="c-contact-block">
              <div class="c-social-link c-social-link--dark">
                <svg viewBox="0 0 40 40" style="display: block; height: 40px; width: 40px;">
                  <use xlink:href="<?= $svgSpriteSheet ?>#icon--<?= strToLower($block['type']) ?>"></use>
                </svg>
              </div>
              <?php if (isset($block['title'])) : ?>
                <h4 class="c-contact-block__title">
                  <?= $block['title'] ?>
                </h4>
              <?php endif; ?>
              <?php if (isset($block['text'])) : ?>
                <p class="c-contact-block__text">
                  <?= $block['text'] ?>
                </p>
              <?php endif; ?>
            </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </section>

    <section class="o-container-section o-copntainer-section--bordered">
      <?php // TODO: Map ?>
    </section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
