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
  <meta name="theme-color" content="#151931"/>

  <link rel="shortcut icon" type="image/x-icon" href="<?= $dist ?>/img/favicon-32.png">
  <link rel="shortcut icon" sizes="256x256" href="<?= $dist ?>/img/favicon-256.png">
  <link rel="shortcut icon" sizes="512x512" href="<?= $dist ?>/img/favicon-512.png">
  <link rel="apple-touch-icon" sizes="128x128" href="<?= $dist ?>/img/favicon-large-128.png">
  <link rel="apple-touch-icon" sizes="256x256" href="<?= $dist ?>/img/favicon-large-256.png">

  <?php wp_head(); ?>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <link rel="preload" href="<?= $dist ?>/font/sailec/39E20B_0_0.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?= $dist ?>/font/sailec/39E20B_2_0.woff2" as="font" type="font/woff2" crossorigin>
<?php if (!is_404()) : ?>
  <link rel="preload" href="<?= $dist ?>/font/tiempos/TiemposTextWeb-Semibold.woff2" as="font" type="font/woff2" crossorigin>
<?php endif; ?>

  <link rel="stylesheet" href="<?= $dist ?>/font/fonts.css">

  <script async crossorigin="anonymous" src="https://polyfill.io/v3/polyfill.min.js?flags=gated&features=IntersectionObserver%2CObject.assign%2CNodeList.prototype.forEach"></script>
  <script async src="<?= $dist ?>/js/main.js">></script>
  <script async src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>

<?php if (is_front_page()) : ?>
  <link rel="preconnect" href="https://widget.clutch.co" crossorigin>
  <link rel="preconnect" href="https://assets.goodfirms.co" crossorigin>
<?php endif; ?>

  <?php if (!in_array($userIP, $excludedIPs) && !current_user_can('edit_pages')) : ?>
    <?php if (is_front_page()) : ?>
      <link rel="preconnect" href="https://www.google-analytics.com">
      <link rel="preconnect" href="https://www.googletagmanager.com">
      <link rel="preconnect" href="https://niblewren.co">
    <?php endif; ?>

    <script>
      (function(o){var b="https://niblewren.co/anywhere/",t="67c40486554c4fc585318ff3e2c10aeefe65b8a136a641d895d0bf9c5e68d2ab",a=window.AutopilotAnywhere={_runQueue:[],run:function(){this._runQueue.push(arguments);}},c=encodeURIComponent,s="SCRIPT",d=document,l=d.getElementsByTagName(s)[0],p="t="+c(d.title||"")+"&u="+c(d.location.href||"")+"&r="+c(d.referrer||""),j="text/javascript",z,y;if(!window.Autopilot) window.Autopilot=a;if(o.app) p="devmode=true&"+p;z=function(src,asy){var e=d.createElement(s);e.src=src;e.type=j;e.async=asy;l.parentNode.insertBefore(e,l);};y=function(){z(b+t+'?'+p,true);};if(window.attachEvent){window.attachEvent("onload",y);}else{window.addEventListener("load",y,false);}})({});
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NQ4J4F2');</script>
    <!-- End Google Tag Manager -->

    <script> (function(){ window.ldfdr = window.ldfdr || {}; (function(d, s, ss, fs){ fs = d.getElementsByTagName(s)[0]; function ce(src){ var cs = d.createElement(s); cs.src = src; setTimeout(function(){fs.parentNode.insertBefore(cs,fs)}, 1); } ce(ss); })(document, 'script', 'https://lftracker.leadfeeder.com/lftracker_v1_JMvZ8g19KAP42pOd.js'); })(); </script>

  <?php endif; ?>

</head>

<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NQ4J4F2" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <?php get_template_part('src/template_parts/header') ?>
