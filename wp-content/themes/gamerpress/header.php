<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="distribution" content="global" />
<meta name="robots" content="follow, all" />
<meta name="language" content="en" />
<meta name="description" content="<?php bloginfo('description') ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta name="keywords" content="" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/box.css" media="screen" />	
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/glide.css" media="screen" />	


<?php 
wp_enqueue_script('jquery');
wp_enqueue_script('jcarousel', '/wp-content/themes/gamerpress/js/jcarousel.js');
wp_enqueue_script('cufon', '/wp-content/themes/gamerpress/js/cufon.js');
wp_enqueue_script('jquery.easing.1.1', '/wp-content/themes/gamerpress/js/jquery.easing.1.1.js');
wp_enqueue_script('Myriad', '/wp-content/themes/gamerpress/js/Myriad_Pro_700.font.js');
wp_enqueue_script('Rockwell', '/wp-content/themes/gamerpress/js/Rockwell_Std_400.font.js');
wp_enqueue_script('Effects', '/wp-content/themes/gamerpress/js/effects.js');
wp_enqueue_script('jquery-ui-personalized-1.5.2.packed', '/wp-content/themes/gamerpress/js/jquery-ui-personalized-1.5.2.packed.js');

?>

<script type="text/javascript"><!--//--><![CDATA[//><!--
sfHover = function() {
	if (!document.getElementsByTagName) return false;
	var sfEls1 = document.getElementById("catmenu").getElementsByTagName("li");
	for (var i=0; i<sfEls1.length; i++) {
		sfEls1[i].onmouseover=function() {
			this.className+=" sfhover1";
		}
		sfEls1[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover1\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);
//--><!]]></script>

<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>
<?php 
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_head(); ?>

</head>
<body>

<div id="wrapper">
<div id="top"> 
<?php include (TEMPLATEPATH . '/searchform.php'); ?>	
<div class="blogname">
	<h1><a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('name');?>"><?php bloginfo('name');?></a></h1>
	<h2><?php bloginfo('description'); ?></h2>
</div>



</div>
<div class="clear"></div>

<div id="catmenucontainer">
		<div id="catmenu">
		<ul>
			<li class="page_item <?php if ( is_home() ) { ?>current_page_item<?php } ?>"><a href="<?php echo get_settings('home'); ?>/" title="Home">Home</a></li>
			<?php wp_list_pages('sort_column=post_title&title_li=');?>
		
		</ul>
	</div>		
		
<div id="foxmenucontainer">
		<div id="menu">
			<ul>
				<?php wp_list_categories('sort_column=name&title_li=&depth=4'); ?>
			</ul>
</div>		
	
</div>
</div>


<div id="casing">		