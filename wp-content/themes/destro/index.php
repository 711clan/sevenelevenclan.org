<?php get_header(); ?>

			<?php
							
								if ( of_get_option('homepage_layout') == 'mag' ) {
									$homelayout = 'mag';
								} elseif ( of_get_option('homepage_layout') == 'maglite' ) {
									$homelayout = 'maglite';
								} else {
									$homelayout = 'standard';
								}
							
								get_template_part( 'index', $homelayout );
							
							
			?>					

							
								
									
			<?php get_footer(); ?>