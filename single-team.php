<?php

$socialType = [
	'website',
	'email',
	'twitter',
	'LinkedIn',
	'dribbble',
	'github',
	'instagram',
	'stackoverflow'
];

$teamTitleShort = getPostMeta('team_team_title_short', $post->ID);
$teamTitle = getPostMeta('team_team_title', $post->ID);
$teamName = getPostMeta('team_team_name', $post->ID);
$teamSocial = getPostMeta('team_team_social', $post->ID); 

$heroContent = '<h1>' . $teamName . '</h1>
<p>' . $teamTitle . '</p>';

$heroImage = '<div class="team-image">' . get_the_post_thumbnail($post->ID) . '</div>';


?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

<section class="o-container-section o-container-section--bordered content-grid">
    <ul class="o-team-links">
	    <?php

		if (isset($teamSocial[0]['link'])):
			foreach($teamSocial as $social):
				$linkPre = $social['type'] == 1 ? 'mailto:' : '';
	
				echo '<li><a class="o-team-links__' . $socialType[$social['type']] . '" href="' . $linkPre . $social['link'] . '">' . $socialType[$social['type']] . '</a></li>';
			endforeach;
		endif;
		?>
    </ul>
	  <?= apply_filters('the_content', $post->post_content ); ?>
</section>

<section class="o-container-section o-container-section--bordered">
    <?php include(locate_template('src/template_parts/block_team_list.php')) ?>
</section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>