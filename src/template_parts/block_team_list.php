<?php

  $args = array(
      'post_type' => 'team',
      'orderby'   => 'menu_order',
      'order' => 'asc',
      'post_status' => 'publish',
      'posts_per_page' => -1,
  );

  $team = new WP_Query( $args );

?>

<div class="o-container-content o-container-content--v-margin c-team-list">
  <?php foreach($team->posts as $person) : ?>
    <?php
      $teamTitleShort = getPostMeta('team_team_title_short', $person->ID);
    ?>
    <div class="c-team-list__person">
    	<a href="<?= get_the_permalink($person->ID); ?>" class="c-team-list__content">
    		<div class="c-team-list__image">
    			<?= get_the_post_thumbnail($person->ID); ?>
    		</div>
  			<h3 class="c-team-list__name"><?= $person->post_title; ?></h3>
  			<p class="c-team-list__title"><?= $teamTitleShort; ?></p>
    	</a>
    </div>
  <?php endforeach; ?>
</div>
