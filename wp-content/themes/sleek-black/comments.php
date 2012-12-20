<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to sleekblack_comment which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Sleek Black
 * @since 1.0
 */
?>
			<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword">This post is password protected. Enter the password to view any comments.</p>
			</div>
<?php
	return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
			<h3 id="comments-title"><?php
			printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'Sleek Black' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="pagination">
				<?php paginate_comments_links(); ?>
			</div>
<?php endif; // check for comment navigation ?>

			<ol class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'sleekblack_comment' ) ); ?>
			</ol>


<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="pagination">
				<?php paginate_comments_links(); ?>
			</div>
<?php endif; // check for comment navigation ?>


<?php else : // or, if we don't have comments:
	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() && !is_page()) :
?><h3>Comments</h3>
<p>Comments are closed.</p>
<?php endif; // end ! comments_open() ?>
<?php endif; // end have_comments() ?>

<?php comment_form(); ?>

</div>