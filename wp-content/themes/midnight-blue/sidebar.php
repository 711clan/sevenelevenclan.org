					<div id="sidebar">
							<ul id="sidebar_list">
								<?php 	/* Widgetized sidebar, if you have the plugin installed. */
										if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
										
								<li class="sidebar_box searchbox">
									<?php include (TEMPLATEPATH . '/searchform.php'); ?>
								</li><!--end: .sidebar_box -->
								
								<li>
									<h2>Feeds(RSS)</h2>
									<ul>
										<li><a href="<?php bloginfo('rss2_url'); ?>">Posts</a></li>
										<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments</a></li>
									</ul>
								</li>
								

								<li class="sidebar_box">
									<h2>Archives</h2>
									<ul>
									<?php wp_get_archives('type=monthly'); ?>
									</ul>
								</li><!--end: .sidebar_box -->

								<?php wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>
								<?php wp_list_bookmarks(); ?>
								
								<li><h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<?php wp_meta(); ?>
				</ul>
				</li>

								<?php endif; ?>
							</ul><!-- end: sidebar_list -->
					</div><!-- end: #sidebar -->