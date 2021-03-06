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
    ?>
    <div class="c-team-list__person">
    	<a href="<?= get_the_permalink($person->ID); ?>" class="c-team-list__content">
    		<div class="c-team-list__image">
          <img src="<?= wp_get_attachment_image_src(get_post_thumbnail_id($person), 'bio-small')[0] ?>" width="150px" height="165px" loading="lazy">
    		</div>
  			<h3 class="c-team-list__name"><?= $person->post_title; ?></h3>
  			<p class="c-team-list__title"><?= $teamTitleShort; ?></p>
    	</a>
    </div>
  <?php endforeach; ?>
</div>
