<?php

$args = array(
    'post_type' => 'team',
    'orderby'   => 'menu_order',
    'order' => 'asc',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'post__not_in' => array($post->ID)
);

$team = new WP_Query( $args );

?>

<section class="o-container-section o-container-section--bordered">
<?php foreach($team->posts as $person): ?>

	<?php $teamTitleShort = getPostMeta('team_team_title_short') ?>
	
	<a href="<?= get_the_permalink($person->ID); ?>">
		<div>
			<?= get_the_post_thumbnail($person->ID); ?>
		</div>
		<div>
			<h2><?= $person->post_title; ?></h2>
			<p><?= $teamTitleShort; ?></p>
		</div>
	</a>
	
<?php endforeach; ?>
</section>
