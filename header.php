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
  <script async src="<?= $dist ?>/js/main.js">></script>
  <script defer src="<?= $dist ?>/js/snowfall.js"></script>

<?php if (is_front_page()) : ?>
  <link rel="preconnect" href="https://widget.clutch.co" crossorigin>
  <link rel="preconnect" href="https://assets.goodfirms.co" crossorigin>
<?php endif; ?>

  <?php if (!in_array($userIP, $excludedIPs) && !current_user_can('edit_pages')) : ?>
    <?php if (is_front_page()) : ?>
      <link rel="preconnect" href="https://www.google-analytics.com">
      <link rel="preconnect" href="https://www.googletagmanager.com">
    <?php endif; ?>

    <!-- Usercentrics cookie banner & JS to hide thumb button -->
    <script id="usercentrics-cmp" src="https://app.usercentrics.eu/browser-ui/latest/loader.js" data-settings-id="SoXyXtr2y" async></script>
    <script>
      window.addEventListener('DOMContentLoaded',(()=>{new MutationObserver((l=>{l.forEach((m=>{'usercentrics-root'===m.target.id&&m.target.shadowRoot?.styleSheets[0]?.addRule('[data-testid="uc-privacy-button"]','display:none')}))})).observe(document.body,{subtree:true,childList:true,attributeFilter:['style']})}));
    </script>
  
    <script defer type="text/javascript" src="https://api.pirsch.io/pirsch.js"
      id="pirschjs"
      data-code="MZef0CIPKNUjqB4dVCaIJ78IBVCIZvhu"></script>
    <script type="text/javascript">
      window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=document.createElement("script");r.type="text/javascript",r.async=!0,r.src="https://cdn.heapanalytics.com/js/heap-"+e+".js";var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(r,a);for(var n=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","resetIdentity","removeEventProperty","setEventProperties","track","unsetEventProperty"],o=0;o<p.length;o++)heap[p[o]]=n(p[o])};
      heap.load("3334188507");
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NQ4J4F2');</script>
    <!-- End Google Tag Manager -->

  <?php endif; ?>

</head>

<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NQ4J4F2" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <?php get_template_part('src/template_parts/header') ?>
