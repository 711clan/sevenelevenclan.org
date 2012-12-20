<?php
	require_once(TEMPLATEPATH . '/controlpanel.php'); 
	require_once(TEMPLATEPATH . '/guide.php');
if ( function_exists('register_sidebar') )
    register_sidebar(array(
    'before_widget' => '<div class="sidebox">',
    'after_widget' => '</div>',
	'before_title' => '<h3 class="sidetitle">',
    'after_title' => '</h3>',
    ));

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'home-thumbnail', 325, 150, true ); 
add_image_size( 'box-thumb', 60, 60, true ); 
}


function ShortenText($text)

{

// Change to the number of characters you want to display

$chars_limit = 50;

$chars_text = strlen($text);

$text = $text." ";

$text = substr($text,0,$chars_limit);

$text = substr($text,0,strrpos($text,' '));

// If the text has more characters that your limit,
//add ... so the user knows the text is actually longer

if ($chars_text > $chars_limit)

{

$text = $text."...";

}

return $text;

}

function popular_posts($no_posts = 5, $before = '<li class="jinslist">', $after = '</li>', $show_pass_post = false, $duration='') {
global $wpdb;
$request = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS 'comment_count' FROM $wpdb->posts, $wpdb->comments";
$request .= " WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish'";
if(!$show_pass_post) $request .= " AND post_password =''";
if($duration !="") { $request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
}

$request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
$posts = $wpdb->get_results($request);
$output = '';
if ($posts) {
foreach ($posts as $post) {
$post_title = stripslashes($post->post_title);
$pop_title=substr($post_title, 0, 50) . "...";
$comment_count = $post->comment_count;
$permalink = get_permalink($post->ID);
$default = get_option('siteurl'). '/wp-content/themes/gamerpress/images/default.png';
$img = get_the_post_thumbnail( $post->ID,'box-thumb');
$imgpath = '';
				if (empty($img)) {
					$imgpath = '<img src=" ' . $default . ' " />';
				} else {
					$imgpath = $img;
				}

$output .= $before . '' .  $imgpath  . '  <a class="poplink" href="' . $permalink . '" title="' . $post_title.'">' . $pop_title . '</a> <div class="jinmeta"> ' . $comment_count . ' Comments </div>' . $after;
}
} else {
$output .= $before . "None found" . $after;
}
echo $output;
} 
	
?>