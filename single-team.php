<?php

$socialType = array(
	'Generic',
	'Email',
	'Twitter',
	'LinkedIn',
	'Dribble',
	'GitHub',
	'Instagram',
	'Stackoverflow'
);

?>

<?php get_header(); ?>

<main>
  <?php while (have_posts()) : the_post(); ?>

    <?php include(locate_template('src/template_parts/hero.php')) ?>

<section class="o-container-section o-container-section--bordered">
    <?php 
	    $teamTitleShort = getPostMeta('team_team_title_short');
		$teamTitle = getPostMeta('team_team_title');
		$teamName = getPostMeta('team_team_name');
		$teamSocial = getPostMeta('team_team_social'); 
    ?>
    <div>
	  <?= get_the_post_thumbnail($post->ID); ?>
    </div>
    <div>
      <h1><?= $teamName; ?></h1>
	  <h2><?= $teamTitle; ?></h2>
	  <?= apply_filters('the_content', $post->post_content ); ?>
	  <?php

		if (isset($teamSocial[0]['link'])):
			foreach($teamSocial as $social):
				$linkPre = $social['type'] == 1 ? 'mailto:' : '';
	
				echo '<a href="' . $linkPre . $social['link'] . '">' . $socialType[$social['type']] . '</a>';
			endforeach;
		endif;
		?>
    </div>
</section>

<section class="o-container-section o-container-section--bordered">
    <?php include(locate_template('src/template_parts/block_team_list.php')) ?>
</section>

  <?php endwhile; ?>
</main>

<?php get_footer(); ?>