<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>

<body>
	<div id="page">
		<div id="header">
			<div id="topnav">
				<span><?php wp_loginout(); ?><?php wp_register(' | ', ''); ?></span><?php wp_meta(); ?>
			</div><!-- end: #topnav -->
			<div id="logo">
			
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<span><?php bloginfo('description'); ?></span>
			
			<!-- <a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('template_directory');?>/images/logo.gif" alt="<?php bloginfo('name'); ?>" /></a>
			-->
			</div>
		</div><!-- end: #header -->
		<!-- begin: main navigation #nav -->
		<div id="nav">
			<div class="spacer">&nbsp;</div>
			<ul id="nav_list">
				<li class="<?php if(is_front_page()) echo ("current_page_item");?>"><a href="<?php echo get_option('home'); ?>/">Home</a></li>
				<?php wp_list_pages('title_li='); ?>
			</ul>
			<div class="spacer">&nbsp;</div>
		</div><!-- end: #nav -->