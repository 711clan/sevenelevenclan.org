
                        <div id="sidebar_section">
							

                            

                            <?php if(of_get_option('facebook_id') || of_get_option('twitter_id')) : ?>
                            <!-- FeedBurner starts here -->
                            <div id="feed_social">
                            
											
                                            
                                            <?php if(of_get_option('facebook_id')) : ?>
                                            <div id="sidebar_facebook">
                                            
                                            	<p><a href="<?php echo of_get_option('facebook_id'); ?>"><?php _e('Be A Fan On Facebook', 'ThemeAttack') ?></a></p>
                                            
                                            </div>
                                            
                                            <?php endif; ?>
                                            
                                            <?php if(of_get_option('twitter_id')) : ?>
                                            <div id="sidebar_twitter">

                                            	<p><a href="http://www.twitter.com/<?php echo of_get_option('twitter_id'); ?>"><?php _e('Follow On Twitter', 'ThemeAttack') ?></a></p>                                            
                                            
                                            </div>  
                                            
                                            
                                            <?php if(!of_get_option('show_twitter_updates') || of_get_option('show_twitter_updates')=='true') : ?>
                                            <div id="sidebar_twitter_updates">
                                            
	                                            <div id="twitter_update_list_1985"></div>
                                                

                                            
                                            </div>                                              
                                            <?php endif; ?>
                                            <?php endif; ?>
                                           
                                            
                                                                        
                            </div>
							<!-- FeedBurner ends here -->
                            <?php endif; ?>
                            
                            <!-- Social box starts here -->
                            <div id="sidebar_search_social">
                            	<div id="social_section">
                                    <ul>
    
                                        <?php if(of_get_option('redit_id')) : ?>
                                        <li><a href="<?php echo of_get_option('redit_id'); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/redit.png" alt="redit" /></a></li>
                                        <?php endif; ?>
    
                                        <?php if(of_get_option('delicious_id')) : ?>
                                        <li><a href="<?php echo of_get_option('delicious_id'); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/delicious.png" alt="delicious" /></a></li>
                                        <?php endif; ?>
    
                                        <?php if(of_get_option('stumble_id')) : ?>
                                        <li><a href="<?php echo of_get_option('stumble_id'); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/stumble.png" alt="stumble" /></a></li>
                                        <?php endif; ?>
    
                                        <?php if(of_get_option('youtube_id')) : ?>
                                        <li><a href="<?php echo of_get_option('youtube_id'); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/youtube.png" alt="youtube" /></a></li>
                                        <?php endif; ?>
    
                                        <?php if(of_get_option('flickr_id')) : ?>
                                        <li><a href="<?php echo of_get_option('flickr_id'); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/flickr.png" alt="flickr" /></a></li>
                                        <?php endif; ?>
    
                                        <?php if(of_get_option('linkedin_id')) : ?>
                                        <li><a href="<?php echo of_get_option('linkedin_id'); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkedin.png" alt="linkedin" /></a></li>
                                        <?php endif; ?>
    
                                        <?php if(of_get_option('google_id')) : ?>
                                        <li><a href="<?php echo of_get_option('google_id'); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/google.png" alt="google" /></a></li>
                                        <?php endif; ?>
                                        
                                        <li><a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rss.png" width="35" height="35" border="0" alt="Rss" /></a></li>
                                                                        
                                    </ul>
								</div>		
                                
                            	<?php get_search_form(); ?>                             
                            
                            
                            </div>
                            <!-- Social box ends here -->                            





                           <!-- Sidebar Starts Here --> 
                            <div id="sidebar">
                            
										<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('default') ){
																			} else { ?>
																		<div class="sidebar_widget">
																			<div class="sidebar_widget_top"></div>
																			<div class="widget widget_categories">
																				<h3 class="widgettitle"><?php _e('Categories', 'Destro') ?></h3>
																				<ul>
																					<?php wp_list_categories('show_count=0&title_li='); ?>
																				</ul>	
																			</div>
																			<div class="sidebar_widget_bottom"></div>
																		</div><!-- /widget -->
																		
																		<div class="sidebar_widget">
																			<div class="sidebar_widget_top"></div>
																			<div class="widget widget_categories">
																				<h3 class="widgettitle"><?php _e('Archives', 'Destro') ?></h3>
																				<ul>
																					<?php wp_get_archives('type=monthly'); ?>
																				</ul>
																			</div>
																			<div class="sidebar_widget_bottom"></div>
																		</div><!-- /widget -->
																		
																		<div class="sidebar_widget">
																			<div class="sidebar_widget_top"></div>
																			<div class="widget widget_categories">
																				<h3 class="widgettitle"><?php _e('Blogrolls', 'Destro') ?></h3>
																				<ul>
																					<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
																				</ul>
																			</div>
																			<div class="sidebar_widget_bottom"></div>
																		</div><!-- /widget -->
				
																		
																					
										<?php } ?>                           
                            
                            
                            
                            
                            </div> 
               
                        </div>	
