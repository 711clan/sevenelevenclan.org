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
<?php endwhile; ?>
<?php else : ?>
	<div class="entry" id="post-<?php the_ID(); ?>">
		<h3>404 Not Found</h3>
		<div class="contents">
		<p>Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>
		</div>
	</div>
<?php endif; ?>
	</div>
<!-- ending entries -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>