		<?php get_header(); ?>
		<div id="main">
				<div id="content">
						<?php if (have_posts()) : ?>

						<?php while (have_posts()) : the_post(); ?>
							<div class="navigation">
								<div class="spacer"></div>
								<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
								<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
								<div class="spacer"></div>
							</div>
							<div class="post single" id="post-<?php the_ID(); ?>">
								<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<div class="metadata">
									<span class="calendar"><?php the_time('F jS, Y') ?></span>
									<span class="author"><?php the_author_link() ?></span>
									<span class="cat"><?php the_category(', ') ?></span>
									</div><!--metadata -->
								<div class="tags"><?php the_tags('Tags: ', ', ', '<br />'); ?></div>
				
								<div class="entry">
									<?php the_content('Read the rest of this entry &raquo;'); ?>
									
									<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
								</div><!--entry -->
							</div><!--post -->
				<?php comments_template(); ?>
						<?php endwhile; ?>
				
						<div class="navigation">
							<div class="spacer"></div>
							<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
							<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
							<div class="spacer"></div>
						</div>
				
					<?php else : ?>
				
						<h2 class="center">Not Found</h2>
						<p class="center">Sorry, but you are looking for something that isn't here.</p>
						<?php include (TEMPLATEPATH . "/searchform.php"); ?>
				
					<?php endif; ?>
				<div class="spacer"></div>
				</div><!--end: #content -->
			<?php get_sidebar(); ?>
			<?php get_footer(); ?>
			
