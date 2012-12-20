<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />
		<?php if(is_home()) { ?><title><?php bloginfo('name'); ?> &raquo; <?php bloginfo('description'); ?></title>
		<?php } elseif (is_category()) { ?><title><?php bloginfo('name'); ?> &raquo; <?php single_cat_title(); ?></title>
		<?php } elseif (is_page()) { ?><title><?php bloginfo('name'); ?> &raquo; <?php the_title(); ?></title>
		<?php } elseif (is_single()) { ?>
		<title><?php the_title(); ?> &raquo; <?php bloginfo('name'); ?></title>
		<?php } elseif (is_tag()) { ?><title><?php bloginfo('name'); ?> &raquo; <?php single_tag_title(); ?></title>
		<?php }else{ ?><title><?php bloginfo('name'); ?> &raquo; <?php bloginfo('description'); ?></title><?php }?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<?php wp_enqueue_script('jquery'); ?>
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">










<!-- calling header -->
	<div id="headerWrapper">
		<div id="header">
			<h1 title="<?php bloginfo('name'); ?>"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<h2 title="<?php bloginfo('description'); ?>"><?php bloginfo('description'); ?></h2>

<!-- calling search bar -->
	<div id="searchWrapper">
			<div id="search">
				<?php get_search_form(); ?>
					<div class="clear"></div>
			</div>
	</div>
<!-- ending search bar -->

			<a id="iconFeed" href="<?php bloginfo('rss2_url'); ?>" title="RSS Feed">RSS Feed</a>

			<div class="clear"></div>


		</div>
	</div>
<!-- ending header -->








<!-- calling navigation -->
	<div id="navigationWrapper">
		<div id="navigation">
<?php if ( has_nav_menu( 'primary' ) ) : ?>
<?php wp_nav_menu( array( 'menu' => 'Primary Navigation', 'container_id' => '', 'depth' => '4', 'menu_class' => 'dropdown', 'theme_location' => 'primary' ) ); ?>
<?php else: ?>
<ul class="dropdown">
<li class="<?php if (!is_paged() && is_home()) { ?>current_page_item<?php } else { ?>page_item<?php } ?>"><a href="<?php echo home_url(); ?>/"  title="Home">Home</a></li>
<?php wp_list_pages('sort_column=menu_order&sort_order=asc&title_li=&depth=4'); ?>
</ul>
<?php endif; ?>



			<div class="clear"></div>
		</div>
	</div>
<!-- ending navigation -->




<!-- calling boxes -->
	<div id="boxWrapper">
	<div id="box">
			<div id="boxLeft">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box Left") ) : ?>

<!-- calling categories -->
		<div class="boxWrapper">
		        <div class="boxHeader"></div>
			<h3 title="Categories">Categories</h3>
		<div class="box">
			<?php wp_dropdown_categories('show_option_none=Select category'); ?>
<script type="text/javascript"><!--
    var dropdown = document.getElementById("cat");
    function onCatChange() {
		if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
			location.href = "<?php echo home_url(); ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
		}
    }
    dropdown.onchange = onCatChange;
--></script>
		</div>
		        <div class="boxFooter"></div>
		</div>
<!-- ending categories -->



<!-- calling archives -->
		<div class="boxWrapper">
		        <div class="boxHeader"></div>
			<h3 title="Archives">Archives</h3>
		<div class="box">
			<select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'> 
			<option value=""><?php echo esc_attr('Select Month'); ?></option> 
				<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
			</select>
		</div>
		        <div class="boxFooter"></div>
		</div>
<!-- ending archives -->

				<?php endif; ?>
			</div>

			<div id="boxCenter">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box Center") ) : ?>
<!-- calling latest posts -->
		<div class="boxWrapper">
		        <div class="boxHeader"></div>
			<h3 title="Latest Posts">Latest Posts</h3>
		<div class="box">
			<ul>
				<?php wp_get_archives('title_li=&limit=5&type=postbypost'); ?>
			</ul>
		</div>
		        <div class="boxFooter"></div>
		</div>
<!-- ending latest posts -->
				<?php endif; ?>
			</div>

			<div id="boxRight">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Box Right") ) : ?>
<!-- calling tags -->
		<div class="boxWrapper">
		        <div class="boxHeader"></div>
			<h3 title="Tags">Tags</h3>
		<div class="box">
			<?php wp_tag_cloud('smallest=8&largest=22&orderby=name&order=ASC'); ?>
		</div>
		        <div class="boxFooter"></div>
		</div>
<!-- ending tags -->
				<?php endif; ?>
			</div>

		<div class="clear"></div>
	</div>
	</div>
<!-- ending boxes -->



<!-- calling main -->
		<div id="mainWrapper">
			<div id="main">