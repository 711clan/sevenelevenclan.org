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

		<h3><?php the_title(); ?></h3>

		<div class="contents">
				<?php the_content(); ?>
				<div class="clear"></div>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

<p><?php edit_post_link('Edit this post', '(', ')'); ?></p>
		</div>


<!-- calling meta data -->
			<div class="metaDataWrapper">
				<ul class="metaData">
					<li class="metaDataDate">Modified on <a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>"><?php the_modified_date('F jS, Y') ?></a></li>
					<li class="metaDataAuthor">Posted by <?php the_author(); ?></li>
				</ul>
					<div class="clear"></div>
			</div>
<!-- ending meta data -->
		</div>
		</div>
		<!-- ending entry -->

<?php endwhile; ?>
	<?php comments_template(); ?>
<?php else : ?>
	<div class="entry">
		<h3>Not Found</h3>
		<div class="contents">
			<p>Sorry, but you are looking for something that isn't here.</p>
		</div>
	</div>
<?php endif; ?>
	</div>
<!-- ending entries -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>