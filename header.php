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
  <script async src="<?= $dist ?>/js/main.js">></script>
  <script defer src="<?= get_template_directory_uri() ?>/node_modules/focus-visible/dist/focus-visible.min.js"></script>
<?php

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$userIP = getUserIpAddr();

$ips = array(
	'172.18.0.1',
	'194.12.10.131',
  '185.212.156.11',
);


	// only show if not us
	if (!in_array($userIP, $ips)):
?>
  <script type="text/javascript">(function(o){var b="https://niblewren.co/anywhere/",t="67c40486554c4fc585318ff3e2c10aeefe65b8a136a641d895d0bf9c5e68d2ab",a=window.AutopilotAnywhere={_runQueue:[],run:function(){this._runQueue.push(arguments);}},c=encodeURIComponent,s="SCRIPT",d=document,l=d.getElementsByTagName(s)[0],p="t="+c(d.title||"")+"&u="+c(d.location.href||"")+"&r="+c(d.referrer||""),j="text/javascript",z,y;if(!window.Autopilot) window.Autopilot=a;if(o.app) p="devmode=true&"+p;z=function(src,asy){var e=d.createElement(s);e.src=src;e.type=j;e.async=asy;l.parentNode.insertBefore(e,l);};y=function(){z(b+t+'?'+p,true);};if(window.attachEvent){window.attachEvent("onload",y);}else{window.addEventListener("load",y,false);}})({});</script>
<?php
	endif;
?>

</head>

<body <?php body_class(); ?>>
    <?php get_template_part('src/template_parts/header') ?>
