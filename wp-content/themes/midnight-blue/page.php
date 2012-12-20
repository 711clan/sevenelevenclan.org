<?php get_header(); ?>

		<div id="main">
				<div id="content">
						<?php if (have_posts()) : ?>

						<?php while (have_posts()) : the_post(); ?>
							
							<div class="post single" id="post-<?php the_ID(); ?>">
								<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				
								<div class="entry">
									<?php the_content('Read the rest of this entry &raquo;'); ?>
									
									<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
								</div><!--entry -->
							</div><!--post -->
				
						<?php endwhile; ?>
					<?php endif; ?>
				<div class="spacer"></div>
				</div><!--end: #content -->


<?php get_sidebar(); ?>

<?php get_footer(); ?>