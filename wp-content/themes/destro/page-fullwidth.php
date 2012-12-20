<?php
/*
Template Name: Page With No Sidebar
*/
?>
<?php get_header(); ?>

								
                    <!-- Inner Content Section starts here -->
                    <div id="inner_content_section">
               			<?php if(of_get_option('show_magpro_slider_page') == 'true') : ?>                    
						<?php get_template_part( 'slider', 'wilto' ); ?>
                  		<?php endif; ?>
                        
                        	             
                        <!-- Main Content Section starts here -->
                        <div id="main_content_section_full">
                

										<?php if (have_posts()) : ?>
											<?php $count = 0; while (have_posts()) : the_post(); $count++; ?>
												<!-- Actual Post starts here -->
												<div <?php post_class('actual_post_full') ?> id="post-<?php the_ID(); ?>">
													<div class="ta_meta_container_full">
                                                    <div class="actual_post_title_page_full">
														<h2><?php the_title(); ?></h2>
													</div>
													</div>
													<div class="post_entry_full">

														<div class="entry">
															<?php the_content(__('<span>Continue Reading >></span>', 'Destro')); ?>
															<div class="clear"></div>
															<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'Destro' ) . '</span>', 'after' => '</div>' ) ); ?>																				
														</div>

														
													
													</div>
												</div>
												<!-- Actual Post ends here -->		
												<?php comments_template(); ?>
												<?php endwhile; ?>
												<?php endif; ?>
                
                
                        </div>	
                        <!-- Main Content Section ends here -->







                    </div>	
                    <!-- Inner Content Section ends here -->
							
			<?php get_footer(); ?>								
									

							
								
									
