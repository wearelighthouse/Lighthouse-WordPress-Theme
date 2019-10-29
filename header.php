<?php
  $dist = get_template_directory_uri() . '/dist';

  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    // ip from share internet
    $userIP = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    // ip pass from proxy
    $userIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $userIP = $_SERVER['REMOTE_ADDR'];
  }

  $excludedIPs = [
    '172.18.0.1',
    '194.12.10.131',
    '185.212.156.11'
  ];
?>

<!DOCTYPE html>

<html lang="en-GB">

<head>
  <meta charset="utf-8">
  <title><?= wp_title('') ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="<?= bloginfo('description') ?>">
  <meta name="theme-color" content="#151931"/>
  <?php wp_head(); ?>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link rel="preload" href="<?= $dist ?>/font/sailec/39E20B_0_0.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?= $dist ?>/font/sailec/39E20B_2_0.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="stylesheet" href="<?= $dist ?>/font/fonts.css" type="text/css">
  <link rel="stylesheet" href="<?= $dist ?>/css/style.css" type="text/css">
  <script defer crossorigin="anonymous" src="https://polyfill.io/v3/polyfill.min.js?flags=gated&features=IntersectionObserver%2CObject.assign%2CNodeList.prototype.forEach"></script>
  <script async src="<?= $dist ?>/js/main.js">></script>
  <script defer src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
  <script defer src="<?= get_template_directory_uri() ?>/node_modules/focus-visible/dist/focus-visible.min.js"></script>

  <?php if (is_front_page()) : ?>
    <link rel="preconnect" href="https://widget.clutch.co" crossorigin>
  <?php endif; ?>

  <?php if (!in_array($userIP, $excludedIPs) && !current_user_can('edit_pages')) : ?>
    <?php if (is_front_page()) : ?>
      <link rel="preconnect" href="https://www.google-analytics.com">
      <link rel="preconnect" href="https://niblewren.co">
    <?php endif; ?>

    <script>
      (function(o){var b="https://niblewren.co/anywhere/",t="67c40486554c4fc585318ff3e2c10aeefe65b8a136a641d895d0bf9c5e68d2ab",a=window.AutopilotAnywhere={_runQueue:[],run:function(){this._runQueue.push(arguments);}},c=encodeURIComponent,s="SCRIPT",d=document,l=d.getElementsByTagName(s)[0],p="t="+c(d.title||"")+"&u="+c(d.location.href||"")+"&r="+c(d.referrer||""),j="text/javascript",z,y;if(!window.Autopilot) window.Autopilot=a;if(o.app) p="devmode=true&"+p;z=function(src,asy){var e=d.createElement(s);e.src=src;e.type=j;e.async=asy;l.parentNode.insertBefore(e,l);};y=function(){z(b+t+'?'+p,true);};if(window.attachEvent){window.attachEvent("onload",y);}else{window.addEventListener("load",y,false);}})({});
    </script>

    <script>
      window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
      ga('create', 'UA-6737301-2', 'auto');
      ga('send', 'pageview');
    </script>
    <script async src='https://www.google-analytics.com/analytics.js'></script>

  <?php endif; ?>

</head>

<body <?php body_class(); ?>>

  <?php get_template_part('src/template_parts/header') ?>
