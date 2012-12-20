<div class="right">

<div class="sidetitle"> Featured Video </div>

<div class="videopost">


<?php $vid = get_option('gpr_video'); echo stripslashes($vid); ?>

</div>

<div class="sidetitle"> Popular posts </div>
 <ul>
<?php popular_posts(); ?>
</ul>

<?php include (TEMPLATEPATH . '/sponsors.php'); ?>	


<div class="sidebar">

	<ul>
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>    
		<div class="sidebox">
		<li>
			<h3 class="sidetitle">Pages</h3>
			<ul>
			<?php wp_list_pages('title_li='); ?>
			</ul>
		</li>
	</div>
	
			<div class="sidebox">
		<li>
			<h3 class="sidetitle">Pages</h3>
			<ul>
			<?php wp_list_pages('title_li='); ?>
			</ul>
		</li>
	</div>
		
	<?php endif; ?>
	</ul>

</div>


</div>