<!doctype html>

<?php
  $dist = get_template_directory_uri() . '/dist';
?>

<html lang="en-GB">

<head>
  <meta charset="utf-8">
  <title><?= wp_title('') ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="<?= bloginfo('description') ?>">
  <?php wp_head(); ?>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= $dist ?>/font/sailec/sailec.css">
  <link rel="stylesheet" type="text/css" href="<?= $dist ?>/font/tiempos/tiempos.css">
  <link rel="stylesheet" type="text/css" href="<?= $dist ?>/css/style.css">
  <script defer src="<?= get_template_directory_uri() ?>/node_modules/focus-visible/dist/focus-visible.min.js"></script>
</head>

<body <?php body_class(); ?>>
    <?php get_template_part('src/template_parts/header') ?>
