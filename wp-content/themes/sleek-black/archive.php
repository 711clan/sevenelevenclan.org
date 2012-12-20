<?php get_header(); ?>
<!-- calling entries -->
	<div id="entries">

	<div id="breadcrumbsWrapper">
		<div id="breadcrumbs">
			<?php sleekblack_get_breadcrumbs(); ?>
		<div class="clear"></div>
		</div>
	</div>

<?php if ( have_posts () ) : while (have_posts()):the_post();?>

		<!-- calling entry -->
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry">


<div class="post-date">
<div class="month"><?php the_time('M') ?></div>
<div class="day"><?php the_time('d') ?></div>
</div>


		<h3><a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

		<div class="contents">
				<?php the_content('Read more...'); ?>
				<div class="clear"></div>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		</div>


<!-- calling meta data -->
			<div class="metaDataWrapper">
				<ul class="metaData">
					<li class="metaDataDate">Posted on <a href="<?php echo get_permalink(); ?>"><?php the_time('F jS, Y') ?></a></li>
					<li class="metaDataAuthor">Posted by <?php the_author(); ?></li>
					<li class="metaDataComments"><?php comments_popup_link('No Comment &#187;','1 Comment &#187;','% Comments &#187;'); ?></li>
					<li class="metaDataCategories">Filed under: <?php the_category(', ', '' ); ?></li>
					<li class="metaDataTags">Tags: <?php the_tags('', ', ', ''); ?></li>

				</ul>
					<div class="clear"></div>
			</div>
<!-- ending meta data -->

		</div>
		</div>
		<!-- ending entry -->

<?php endwhile; ?>
	<div id="pagination">
		<?php if (function_exists("sleekblack_pagination")) { sleekblack_pagination(); } ?>
	</div>
<?php else : ?>
	<div class="entry">
		<h3>404 - Not Found</h3>
		<div class="contents">
			<p>Sorry, but you are looking for something that isn't here. </p>
		</div>

		<h3>Latest 20 Posts</h3>
		<div class="contents">
			<ul><?php wp_get_archives('type=postbypost&limit=20'); ?></ul>
		</div>


	</div>
<?php endif; ?>
	</div>
<!-- ending entries -->



<?php get_sidebar(); ?>
<?php get_footer(); ?>