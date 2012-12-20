<?php get_header(); ?>

								
                    <!-- Inner Content Section starts here -->
                    <div id="inner_content_section">
               			<?php if(of_get_option('show_magpro_slider_single') == 'true') : ?>                    
						<?php get_template_part( 'slider', 'wilto' ); ?>
                  		<?php endif; ?>
                        
                        	             
                        <!-- Main Content Section starts here -->
                        <div id="main_content_section">
                

										<?php if (have_posts()) : ?>
											<?php $count = 0; while (have_posts()) : the_post(); $count++; ?>
												<!-- Actual Post starts here -->
												<div <?php post_class('actual_post') ?> id="post-<?php the_ID(); ?>">
													<div class="ta_meta_container">
                                                        <div class="actual_post_title">
                                                            <h2><?php the_title(); ?></h2>
                                                        </div>
                                                        <?php if ( function_exists('the_ratings') && (!of_get_option('show_ratings_standard') || of_get_option('show_ratings_standard') == 'true')) : ?>
                                                        <div class="actual_post_ratings">
                                                            <?php the_ratings(); ?>
                                                        </div>   
                                                        <?php endif; ?>                                                    
                                                        <div class="actual_post_author">
                                                            <div class="actual_post_posted"><?php _e('Posted by :','Destro'); ?><span><?php the_author() ?></span> <?php _e('On :','Destro'); ?> <span><?php the_time(get_option( 'date_format' )) ?></span></div>
                                                            <div class="actual_post_comments"><?php comments_number( '0', '1', '%' ); ?></div>
                                                        </div>
                                                        <?php if(!of_get_option('show_ctags_standard') || of_get_option('show_ctags_standard') == 'true') : ?>                                                                        
                                                        <div class="metadata">
                                                            <p>
                                                                <span class="label"><?php _e('Category:', 'Destro') ?></span>
                                                                <span class="text"><?php the_category(', ') ?></span>
                                                            </p>
                                                            <?php the_tags('<p><span class="label">'.__('Tags:','Destro').'</span><span class="text">', ', ', '</span></p>'); ?>
                                                            
                                                        </div><!-- /metadata -->
                                                        <?php endif; ?>
                                                        <div class="bookmark_button_container">
                                                        
                                                       
                                                        
                                                                <div class="bookmark_button">
                                                                        <a href="https://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="vertical">Tweet</a>

    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                                                                </div>
                                                                <div class="bookmark_button">
                                                                    <!-- Place this tag where you want the su badge to render -->
                                                                    <su:badge layout="5"></su:badge>
                                                                    
                                                                    <!-- Place this snippet wherever appropriate --> 
                                                                     <script type="text/javascript"> 
                                                                     (function() { 
                                                                         var li = document.createElement('script'); li.type = 'text/javascript'; li.async = true; 
                                                                          li.src = 'https://platform.stumbleupon.com/1/widgets.js'; 
                                                                          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(li, s); 
                                                                     })(); 
                                                                     </script>
                                                                </div>
                                                                                                                                                                                        
                                                                <div class="bookmark_button">
                                                                    <!-- Place this tag where you want the +1 button to render -->
                                                                    <g:plusone size="tall" href="<?php the_permalink(); ?>"></g:plusone>
                                                                    
                                                                    <!-- Place this render call where appropriate -->
                                                                    <script type="text/javascript">
                                                                      (function() {
                                                                        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                                                        po.src = 'https://apis.google.com/js/plusone.js';
                                                                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                                                      })();
                                                                    </script>
                                                                </div>
                                                                
                                                                <div class="bookmark_button_facebook">
                                                                	<div class="bookmark_button">
                                                                    <div id="fb-root"></div>
                                                                    <script>(function(d, s, id) {
                                                                      var js, fjs = d.getElementsByTagName(s)[0];
                                                                      if (d.getElementById(id)) return;
                                                                      js = d.createElement(s); js.id = id;
                                                                      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                                                                      fjs.parentNode.insertBefore(js, fjs);
                                                                    }(document, 'script', 'facebook-jssdk'));</script>
                                                                    <div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="box_count" data-show-faces="false"></div>
                                                                	</div>  
                                                                </div>                                                               


                                                        </div><!-- /metadata -->
                                                    </div>	
                                                    
                                                    <!-- Post entry starts here -->												
													<div class="post_entry">

														<div class="entry">
															<?php the_content(__('<span>Continue Reading >></span>', 'Destro')); ?>
															<div class="clear"></div>
															<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'Destro' ) . '</span>', 'after' => '</div>' ) ); ?>	
                                                          	<?php 
																
																if (is_attachment()){ 
																	echo '<p class="destro_prev_img_attch">';
																	previous_image_link( false, '&#171; '.__('Previous Image' , 'Destro').'' ); 
																	echo '</p>';
																}  
															?> 
                                                          	<?php 
																
																if (is_attachment()){ 
																	echo '<p class="destro_prev_img_attch">';
																	next_image_link( false, ''.__('Next Image' , 'Destro').' &#187;' );
																	echo '</p>'; 
																}
															?>                                                                                                                        																			
														</div>

																												
													</div>
                                                    <!-- post entry ends here -->
                                                   
	                                                <?php if(!of_get_option('show_author_bio') || of_get_option('show_author_bio')=='true') : ?>
													<!-- Bio starts here -->
                                                    <div class="post_author_bio">
                                                        <div class="post_author_bio_bio">
                                                        
                                                        	<div class="post_author_bio_bio_pic">
                                                            	<?php echo get_avatar( get_the_author_meta('ID'), 88 ); ?>
                                                            </div>
                                                            
                                                        	<div class="post_author_bio_bio_desc">
                                                            	<p class="post_author_pic"><?php the_author() ?></p>
                                                                <p><?php the_author_meta('description'); ?></p>
                                                            </div>                                                            
                                                        
                                                        
                                                        </div>
                                                        <div class="post_author_bio_social">
                                                        
                                                        	
                                                            	<?php 
																	$authorswebsitelink =  destro_get_custom_field('authors_website', get_the_ID(), true);
																	
																	if( !empty($authorswebsitelink) ) {
																		$authorswebsite =  $authorswebsitelink;
																			}else {
																				$authorswebsite =  get_the_author_meta('user_url');
																			}
																?>
                                                                <?php if(!empty($authorswebsite)) : ?>
                                                                <div class="authors_website">
                                                                
                                                                	<p><a href="<?php echo $authorswebsite; ?>"><?php _e("Visit Author's Website",'destro'); ?></a></p>
                                                            	</div>
                                                                <?php endif; ?>
                                                            
                                                        	
                                                            	<?php 
																	$authorstwitterlink =  destro_get_custom_field('authors_twitter', get_the_ID(), true);
																	
																	if( !empty($authorstwitterlink) ) {
																		$authorstwitter =  $authorstwitterlink;
																			}else {
																				$authorstwitter =  of_get_option('twitter_id');
																			}
																?> 
                                                                <?php if(!empty($authorstwitter)) : ?>
                                                                <div class="authors_twitter">                                                           
                                                            		<p><a href="https://www.twitter.com/<?php echo $authorstwitter; ?>"><?php _e("Follow On Twitter",'destro'); ?></a></p>
                                                            	</div>  
                                                            	<?php endif; ?>
                                                                
                                                                
                                                        	
                                                            	<?php 
																	$authorsfacebooklink =  destro_get_custom_field('authors_facebook', get_the_ID(), true);
																	
																	if( !empty($authorsfacebooklink) ) {
																		$authorsfacebook =  $authorsfacebooklink;
																			}else {
																				$authorsfacebook =  of_get_option('facebook_id');
																			}
																?>   
                                                                
                                                                <?php if(!empty($authorsfacebook)) : ?>
                                                                <div class="authors_facebook">                                                           
                                                            		<p><a href="<?php echo $authorsfacebook; ?>"><?php _e("Like On Facebook",'destro'); ?></a></p>
                                                            	</div>
																<?php endif; ?>                                                                                                                      
                                                        
                                                        </div>                                                        
                                                    </div>
                                                    <!-- Bio ends here -->       
                                                    <?php endif; ?>

                                                    
                                                    <?php if(!of_get_option('show_np_box') || of_get_option('show_np_box')=='true') : ?>
                                                    <!-- Next/prev post starts here -->  
                                                    <div class="single_np">
                                                    
                                                    	

                                                            
                                                          	<?php 
																
																previous_post_link('<div class="single_np_prev"><p class="single_np_prev_np">'.__('Previous Post' , 'Destro').'</p><p> %link</p></div>');
																
															?>                                                            
                                                            
                                                        
                                                        
                                                    	

                                                          	<?php 
																
																next_post_link('<div class="single_np_next"><p class="single_np_next_np">'.__('Next Post' , 'Destro').'</span></p><p> %link</p></div>');
																
															?>                                                             
                                                                                                                
                                                    
                                                    </div>                                                    
                                                    <!-- Next/prev post ends here --> 
                                                    <?php endif; ?>
                                                    
                                                    
												</div>
												<!-- Actual Post ends here -->		
												<?php comments_template(); ?>
												<?php endwhile; ?>
												<?php endif; ?>
                
                
                        </div>	
                        <!-- Main Content Section ends here -->

                        <!-- Sidebar Section starts here -->
                        <?php get_sidebar(); ?> 	
                        <!-- Sidebar Section ends here -->

                        <!-- Footer Sidebar Section starts here -->
               			<?php if(!of_get_option('show_footer_widgets_single') || of_get_option('show_footer_widgets_single') == 'true') : ?>                    
                        <?php get_template_part( 'magpro', 'footerwidgets' ); ?>	
                  		<?php endif; ?>                        
                        <!-- Footer Sidebar Section ends here -->




                    </div>	
                    <!-- Inner Content Section ends here -->
                    
           			<?php get_footer(); ?>
							
								
									

							
								
									
