<?php
if ( ! isset( $content_width ) )
	$content_width = 520;

$Destro_themename = "Destro";
$Destro_textdomain = "Destro";

function Destro_setup(){
  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'mainmenu' => __( 'Main Navigation', 'Destro' )
  ) );

  // This theme uses post thumbnails
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'Destrothumb', 450, 300, true );  
  // Add default posts and comments RSS feed links to head
  add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'Destro_setup' );

/* 
 * Loads the Options Panel
 */
 
if ( !function_exists( 'optionsframework_init' ) ) {

	/* Set the file path based on whether we're in a child theme or parent theme */


		define('OPTIONS_FRAMEWORK_URL', get_template_directory() . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/');


	require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');
}

/* 
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}
	
});
</script>

<?php
}













/**
 * Get ID of the page, if this is current page
 */
function Destro_get_page_id() {
	global $wp_query;

	$page_obj = $wp_query->get_queried_object();

	if ( isset( $page_obj->ID ) && $page_obj->ID >= 0 )
		return $page_obj->ID;

	return -1;
}

/**
 * Get custom field of the current page
 * $type = string|int
 */
function Destro_get_custom_field($filedname, $id = NULL, $single=true)
{
	global $post;
	
	if($id==NULL)
		$id = get_the_ID();
	
	if($id==NULL)
		$id = Destro_get_page_id();

	$value = get_post_meta($id, $filedname, $single);
	
	if($single)
		return stripslashes($value);
	else
		return $value;
}

/**
 * Get Limited String
 * $output = string
 * $max_char = int
 */
function Destro_get_limited_string($output, $max_char=100, $end='...')
{
    $output = str_replace(']]>', ']]&gt;', $output);
    $output = strip_tags($output);
    $output = strip_shortcodes($output);

  	if ((strlen($output)>$max_char) && ($espacio = strpos($output, " ", $max_char )))
	{
        $output = substr($output, 0, $espacio).$end;
		return $output;
   }
   else
   {
      return $output;
   }
}

/**
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param mixed $cats The target categories. Integer ID or array of integer IDs
 * @param mixed $_post The post
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Gets descendants of target category
 * @uses in_category() Tests against descendant categories
 * @version 2.7
 */
function Destro_post_is_in_descendant_category( $cats, $_post = null )
{
	foreach ( (array) $cats as $cat ) {
		// get_term_children() accepts integer ID only
		$descendants = get_term_children( (int) $cat, 'category');
		if ( $descendants && in_category( $descendants, $_post ) )
			return true;
	}
	return false;
}

/**
 * Twitter's Blogger.js output for Twitter widgets
 * $unique_id = string
 * $username = string
 * limit = int
 */
function Destro_twitter_script($unique_id,$username,$limit) {
?>
<script type="text/javascript">
<!--//--><![CDATA[//><!--

    function twitterCallback2(twitters) {
      var statusHTML = [];
      for (var i=0; i<twitters.length; i++){
        var username = twitters[i].user.screen_name;
        var status = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
          return '<a href="'+url+'">'+url+'</a>';
        }).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
          return  reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'">'+reply.substring(1)+'</a>';
        });
        statusHTML.push('<p>'+status+'</p><p class="twittime"><a class="twittertime" href="http://twitter.com/'+username+'/">'+relative_time(twitters[i].created_at)+'</a></p>');
      }
      document.getElementById('twitter_update_list_<?php echo $unique_id; ?>').innerHTML = statusHTML.join('');
    }
    
    function relative_time(time_value) {
      var values = time_value.split(" ");
      time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
      var parsed_date = Date.parse(time_value);
      var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
      var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
      delta = delta + (relative_to.getTimezoneOffset() * 60);
    
      if (delta < 60) {
        return 'less than a minute ago';
      } else if(delta < 120) {
        return 'about a minute ago';
      } else if(delta < (60*60)) {
        return (parseInt(delta / 60)).toString() + ' minutes ago';
      } else if(delta < (120*60)) {
        return 'about an hour ago';
      } else if(delta < (24*60*60)) {
        return 'about ' + (parseInt(delta / 3600)).toString() + ' hours ago';
      } else if(delta < (48*60*60)) {
        return '1 day ago';
      } else {
        return (parseInt(delta / 86400)).toString() + ' days ago';
      }
    }
//-->!]]>
</script>
<script type="text/javascript" src="https://api.twitter.com/1/statuses/user_timeline/<?php echo $username; ?>.json?callback=twitterCallback2&amp;count=<?php echo $limit; ?>"></script>
<?php
}

/**
 * Custom comments for single or page templates
 */
function Destro_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   
   <div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">  <?php echo get_avatar($comment,'82'); ?> <cite class="fn"><?php echo get_comment_author_link(); ?></cite></div>
		<div class="comment-meta commentmetadata"><a href="<?php echo esc_html( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s','Destro'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)','Destro'),'  ','') ?></div>
      <?php if ($comment->comment_approved == '0') : ?>
         <p><em><?php _e('Your comment is awaiting moderation.','Destro') ?></em></p>
      <?php endif; ?>
		<div class="entry">
		<?php comment_text() ?>
		</div>
		<div class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
	</div>
<?php
}

/**
 * Browser detection body_class() output
 */
function Destro_browser_body_class($classes) {
	global $is_Destro, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_Destro) $classes[] = 'Destro';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}
/**
 * Add StyleSheets
 */
function Destro_add_stylesheets( ) {
	
	if( !is_admin() ) {

								wp_enqueue_style('Destro_dropdowncss', get_stylesheet_directory_uri().'/css/dropdown.css');
								wp_enqueue_style('Destro_rtldropdown', get_stylesheet_directory_uri().'/css/dropdown.vertical.rtl.css');
								wp_enqueue_style('Destro_advanced_dropdown', get_stylesheet_directory_uri().'/css/default.advanced.css');

								
								echo '<!--[if lte IE 7]>
<style type="text/css">
html .jquerycssmenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]--> ';

								wp_enqueue_style('Destro_wilto', get_stylesheet_directory_uri().'/css/wilto.css');
									
								if( of_get_option('skin_style') == 'azurite' ) {
									wp_enqueue_style('Destro_Azuritestyle', get_stylesheet_directory_uri().'/azurite.css');	
									wp_enqueue_style('Destro_AzuriteResponsive', get_stylesheet_directory_uri().'/azuriteresponsive.css');	
								}elseif( of_get_option('skin_style') == 'blaze' ) {
									wp_enqueue_style('Destro_Blazestyle', get_stylesheet_directory_uri().'/blaze.css');	
									wp_enqueue_style('Destro_BlazeResponsive', get_stylesheet_directory_uri().'/blazeresponsive.css');
								}elseif( of_get_option('skin_style') == 'mead' ) {
									wp_enqueue_style('Destro_meadstyle', get_stylesheet_directory_uri().'/mead.css');	
									wp_enqueue_style('Destro_meadResponsive', get_stylesheet_directory_uri().'/meadresponsive.css');
								}elseif( of_get_option('skin_style') == 'kawfee' ) {
									wp_enqueue_style('Destro_kawfeestyle', get_stylesheet_directory_uri().'/kawfee.css');
									wp_enqueue_style('Destro_kawfeeResponsive', get_stylesheet_directory_uri().'/kawfeeresponsive.css');	
								}elseif( of_get_option('skin_style') == 'liten' ) {
									wp_enqueue_style('Destro_kawfeestyle', get_stylesheet_directory_uri().'/liten.css');
									wp_enqueue_style('Destro_kawfeeResponsive', get_stylesheet_directory_uri().'/litenresponsive.css');	
								}elseif( of_get_option('skin_style') == 'pink' ) {
									wp_enqueue_style('Destro_pinkstyle', get_stylesheet_directory_uri().'/pink.css');
									wp_enqueue_style('Destro_pinkResponsive', get_stylesheet_directory_uri().'/pinkresponsive.css');	
								}elseif( of_get_option('skin_style') == 'alken' ) {
									wp_enqueue_style('Destro_alkenstyle', get_stylesheet_directory_uri().'/alken.css');
									wp_enqueue_style('Destro_alkenResponsive', get_stylesheet_directory_uri().'/alkenresponsive.css');	
								}else {
									wp_enqueue_style('Destro_Defaultstyle', get_stylesheet_directory_uri().'/destro.css');
									wp_enqueue_style('Destro_Defaultresponsive', get_stylesheet_directory_uri().'/destroresponsive.css');
								}									
										

	}
}
/**
 * Add JS scripts
 */
function Destro_add_javascript( ) {

	if (is_singular() && get_option('thread_comments'))
		wp_enqueue_script('comment-reply');
		
	wp_enqueue_script('jquery');
	
	if( !is_admin() ) {

		wp_enqueue_script('Destro_jquery', get_template_directory_uri().'/js/respond.min.js' );
		wp_enqueue_script('Destro_jquery', get_template_directory_uri().'/js/jquery-1.7.2.min.js' );
		wp_enqueue_script('Destro_tabcontent', get_template_directory_uri().'/js/tabcontent.js' );
		wp_enqueue_script('Destro_respmenu', get_template_directory_uri().'/js/tinynav.min.js' );	
		wp_enqueue_script('Destro_wilto', get_template_directory_uri().'/js/wilto.js');
		wp_enqueue_script('Destro_wiltoint', get_template_directory_uri().'/js/wilto.int.js');

	}

}

/**
 * Get YouTube Id from Url
 */
function Destro_quickYouTubeId($youtubeurl) {
	 	preg_match("#[a-zA-Z0-9-_]{11}#", $youtubeurl, $id);
		return (strlen($id[0])==11) ? $id[0] : false;
}



/**
 * Register widgetized areas
 */
function Destro_the_widgets_init() {
	
    if ( !function_exists('register_sidebars') )
        return;
    
    $before_widget = '<div id="%1$s" class="sidebar_widget %2$s">
																			<div class="sidebar_widget_top"></div>
																			<div class="widget">';
    $after_widget = '</div>
																			<div class="sidebar_widget_bottom"></div>
																		</div>';
    $before_title = '<h3 class="widgettitle">';
    $after_title = '</h3>';

	
	

    register_sidebar(array('name' => __('Default','Destro'),'id' => 'default','before_widget' => $before_widget,'after_widget' => $after_widget,'before_title' => $before_title,'after_title' => $after_title));
   
}

/**
 * Filter for get_the_excerpt
 */
 
function Destro_get_the_excerpt($content){
	return str_replace(' [...]','',$content);
}

/**
 * Get the sidebar ID
 */
 
function Destro_get_sidebar_id(){
	global $post;
	$sidebar_id = 'sidebar-default';
	if(isset($post->ID))
		if(is_active_sidebar('sidebar-'.$post->ID))
			$sidebar_id = 'sidebar-'.$post->ID;
	return $sidebar_id;
}


/* Wp Title */
function Destro_doc_title( $doc_title ) {
        if( is_category() ) {
                $doc_title = __( 'Category: ', 'Destro' ) . $doc_title . ' - ';
        } elseif( is_tag() ) {
                $doc_title = single_tag_title( __( 'Tag Archive for &quot;', 'Destro'), false ) . '&quot; - ';
        } elseif( is_archive() ) {
                $doc_title .= __( ' Archive - ', 'Destro' );
        } elseif( is_page() ) {
                $doc_title .= ' - ';
        } elseif( is_search() ) {
                $doc_title = __('Search for &quot;','Destro') . get_search_query() . '&quot; - ';
        } elseif( ! is_404() && is_single() || is_page() ) {
                $doc_title .= ' - ';
        } elseif( is_404() ) {
                $doc_title = __( 'Not Found - ', 'Destro' );
        }
        $doc_title .= get_bloginfo('name');
        return $doc_title;
}

add_filter( 'wp_title', 'Destro_doc_title' );

function Destro_theme_250_ads_show()
{

	if( !of_get_option('magpro_sidebar_ads_twofifty') ) {
		$count = '0';
		}else {
		$count = of_get_option('magpro_sidebar_ads_twofifty');
		}

	if($count>0)
	{
		for($i=1; $i<=$count; $i++)
		{
			$banner_ad = of_get_option('magpro_sidebar_ads_twofifty_ad'.$i);			

			if(!empty($banner_ad))
			{
			?><p class="sidebar_ad_250"><?php echo $banner_url; ?></p><?php
			}
		}
	}
}






add_filter( 'the_content_more_link', 'Destro_more_link', 10, 2 );

function Destro_more_link( $more_link, $more_link_text ) {
	return '<br /><br />'.$more_link;
}

add_filter('the_title','Destro_has_title');
function Destro_has_title($title){
	global $post;
	if($title == ''){
		return get_the_time(get_option( 'date_format' ));
	}else{
		return $title;
	}
}




if (!is_admin()){
	add_action( 'wp_print_styles', 'Destro_add_stylesheets' );	
	add_action( 'wp_enqueue_scripts', 'Destro_add_javascript' );
}

add_filter('body_class','Destro_browser_body_class');
add_filter('the_excerpt', 'Destro_get_the_excerpt');
add_filter('get_the_excerpt', 'Destro_get_the_excerpt');
add_action( 'widgets_init', 'Destro_the_widgets_init' );

// Allow Shortcodes in Sidebar Widgets
add_filter('widget_text', 'do_shortcode');

/**
 * Add default options and show Options Panel after activate
 */
if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	
	//Do redirect

	wp_redirect( admin_url( 'admin.php?page=options-framework' ) ); exit;
	
}

?>