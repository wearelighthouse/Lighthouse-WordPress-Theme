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

<section class="o-container-section o-container-section--bordered">
	<div class="o-team-list v-pad">
<?php foreach($team->posts as $person): 
  $teamTitleShort = getPostMeta('team_team_title_short', $person->ID); 
?>
	<a href="<?= get_the_permalink($person->ID); ?>" class="o-team-list__content">
		<div class="o-team-list__image">
			<?= get_the_post_thumbnail($person->ID); ?>
		</div>
		<div class="o-team-list__title">
			<h2><?= $person->post_title; ?></h2>
			<p><?= $teamTitleShort; ?>&nbsp;</p>
		</div>
	</a>
<?php endforeach; ?>
	</div>
</section>
