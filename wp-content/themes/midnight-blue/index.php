		<?php get_header(); ?>
		<div id="main">
				<div id="content">
						<?php if (have_posts()) : ?>

						<?php while (have_posts()) : the_post(); ?>
				
							<div class="post" id="post-<?php the_ID(); ?>">
								<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
								<div class="metadata">
									<span class="calendar"><?php the_time('F jS, Y') ?></span>
									<span class="author"><?php the_author_link() ?></span>
									<span class="cat"><?php the_category(', ') ?></span>
									<span class="comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span></div><!--metadata -->
								<div class="tags"><?php the_tags('Tags: ', ', ', '<br />'); ?></div>
				
								<div class="entry">
									<?php the_content('Read the rest of this entry &raquo;'); ?>
									<div class="spacer">&nbsp;</div>
								</div><!--entry -->
							</div><!--post -->
				
						<?php endwhile; ?>
				
						<div class="navigation">
							<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
							<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
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
			
