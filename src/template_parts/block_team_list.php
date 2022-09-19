<?php
  $team = new WP_Query([
    'post_type' => 'team',
    'orderby' => 'menu_order',
    'order' => 'asc',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'post__not_in' => [ get_the_ID() ]
  ]);
?>

<div class="o-container-content o-container-content--v-margin c-team-list">
  <?php foreach($team->posts as $person) : ?>
    <?php
      $teamTitleShort = getPostMeta('team_team_title', $person->ID);
      $teamFlag = getPostMeta('team_team_flag', $person->ID);
      $imgSrc = wp_get_attachment_image_src(get_post_thumbnail_id($person), 'bio-small')[0];
      $imgAlt = get_post_meta(get_post_thumbnail_id($person), '_wp_attachment_image_alt', true);
    ?>

    <div class="c-team-list__person">
    	<a
        href="<?= get_the_permalink($person->ID); ?>"
        class="c-team-list__content"
        aria-labelledby="name-<?= $person->post_name ?>"
        aria-describedby="flag-<?= $person->post_name ?> title-<?= $person->post_name ?>"
      >
        <div class="c-team-list__media">
          <div class="c-team-list__image">
            <img
              src="<?= $imgSrc ?>"
              width="150px"
              height="165px"
              loading="lazy"
              alt="<?= $imgAlt ?>"
            >
          </div>

          <div class="c-team-list__flag" id="flag-<?= $person->post_name ?>">
            <?= $teamFlag ?>
          </div>
        </div>

  			<h3 class="c-team-list__name" id="name-<?= $person->post_name ?>">
          <?= $person->post_title; ?>
        </h3>

  			<p class="c-team-list__title" id="title-<?= $person->post_name ?>">
          <?= $teamTitleShort; ?>
        </p>
    	</a>
    </div>
  <?php endforeach; ?>
</div>
