

								
                    <!-- Inner Content Section starts here -->
                    <div id="inner_content_section">
               			<?php if(!of_get_option('show_magpro_slider_home') || of_get_option('show_magpro_slider_home') == 'true') : ?> 
                        <?php get_template_part( 'slider', 'wilto' ); ?>                  
                  		<?php endif; ?>
                        	             
                        <!-- Main Content Section starts here -->
                        <div id="main_content_section_maglite">
                
									<?php if (have_posts()) : ?>
									<?php $count = 0; while (have_posts()) : the_post(); $count++; ?>									
										<?php 
										$num = $count;
											if($num&1) {
											  $pcont = 'mag_two_post_odd';
											} else {
											  $pcont = 'mag_two_post';
											}
										?>
										<div <?php post_class($pcont) ?> id="post-<?php the_ID(); ?>">
										
											<div class="mag_two_post_title">
												<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'Destro' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
											</div>
											
											<?php if ( function_exists('the_ratings') && (!of_get_option('show_ratings_maglite') || of_get_option('show_ratings_maglite') == 'true')) : ?>
											<div class="mag_two_post_ratings">
												<?php the_ratings(); ?>
											</div>
											<?php endif; ?>
											
											<div class="mag_two_post_excerpt">
												
                                                
												<?php if ( has_post_thumbnail() && (!of_get_option('show_postthumbnail_maglite') || of_get_option('show_postthumbnail_maglite') == 'true')) : ?>
												<?php 
													$maglitethumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'Destrothumb', false, '' ); 
												?>
                                                <div class="mag_two_post_excerpt_img">
												<img src="<?php echo $maglitethumb[0]; ?>" alt="<?php echo Destro_get_limited_string(get_the_title(), 40, '...') ?>" />
												</div>
												<?php endif; ?>
                                                
												<div class="mag_two_post_excerpt_p">
                                                	<p><?php echo Destro_get_limited_string(get_the_excerpt(), 150, '...') ?></p>
                                                </div>
											</div>																						
																						
										</div>
									<?php endwhile; ?>
									
												<?php 
													$next_page = get_next_posts_link(__('Previous', 'Destro')); 
													$prev_pages = get_previous_posts_link(__('Next', 'Destro'));
													if(!empty($next_page) || !empty($prev_pages)) :
													?>
													<div class="pagination">
														<?php if(!function_exists('wp_pagenavi')) : ?>
														<div class="al"><?php echo $next_page; ?></div>
														<div class="ar"><?php echo $prev_pages; ?></div>
														<?php else : wp_pagenavi(); endif; ?>
													</div><!-- /pagination -->
													<?php endif; ?>
													
												<?php else : ?>
													<div class="nopost">
														<p><?php _e('Sorry, but you are looking for something that isn\'t here.', 'Destro') ?></p>
													 </div><!-- /nopost -->
												<?php endif; ?>
                
                        </div>	
                        <!-- Main Content Section ends here -->

                        <!-- Sidebar Section starts here -->
                        <?php get_sidebar(); ?> 
                        <!-- Sidebar Section ends here -->


                    </div>	
                    <!-- Inner Content Section ends here -->
							
								
									
