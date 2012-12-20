<script type="text/javascript">
var $jx = jQuery.noConflict(); 
$jx(function() {
 $jx(".mygallery").jCarouselLite({
 btnNext: ".snext",
        btnPrev: ".sprev",
		visible: 1,
		easing: "backout",
	    speed: 1000
    });

});
</script>

<div id="slidearea">

<div id="gallerycover">
<div class="mygallery">

	<ul>
			<?php 
			$gldcat = get_option('gpr_gldcat'); 
			$gldct = get_option('gpr_gldct');
			$my_query = new WP_Query('category_name='.$gldcat.'&showposts='.$gldct.'');
			while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
			?>
    <li>
	
	<div class="mytext">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php echo ShortenText(get_the_title()); ?></a></h2>
			

			
	<?php if ( has_post_thumbnail() ) {?>
	<?php  the_post_thumbnail( 'home-thumbnail', array('class' => 'slidim') );?>
	<?php } else { ?>
	<img class="slidim" src="<?php bloginfo('template_directory'); ?>/images/place.jpg" alt=""  />
	<?php } ?>
			
	<?php the_excerpt(); ?> 

		    </div>   	
	 </li>
			<?php endwhile; ?>
     </ul>

    <div class="clear"></div>  
	
</div>

</div>

<div class="slnav">
   <a href="#" class="sprev"></a>
   <a href="#" class="snext"></a>  
   <div class="clear"></div>
</div>
 
</div>