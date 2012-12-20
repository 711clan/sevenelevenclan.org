<?php get_header(); ?>


<div id="content">

<?php include (TEMPLATEPATH . '/slide.php'); ?>

<?php include (TEMPLATEPATH . '/ad1.php'); ?>


<?php if (have_posts()) : ?>
<?php $count = 0; ?>
<?php while (have_posts()) : the_post(); ?>

<div <?php post_class('box') ?> id="post-<?php the_ID(); ?>">

<div class="boxcover">
<div class="entry">
<div class="boximage">
<div class="boxtitle">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php echo ShortenText(get_the_title()); ?></a></h2>
</div>

	<?php if ( has_post_thumbnail() ) {?>
	<?php  the_post_thumbnail( 'home-thumbnail' );?>
	<?php } else { ?>
	<img src="<?php bloginfo('template_directory'); ?>/images/place.jpg" alt=""  />
	<?php } ?>
	
</div>

<?php the_excerpt(); ?> 

<div class="clear"></div>

</div>
</div>

<div class="boxinfo">

<div class="boxauthor">Posted by <?php the_author(); ?> </div>
<div class="boxmore"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title(); ?>">Read Full Post</a> </div>
<div class="boxcoms"><?php comments_popup_link('0', '1', '%','','' ); ?> </div>
</div>


</div>
<?php if(++$counter % 2 == 0) : ?>
<div class="clear"></div>
<?php endif; ?>
<?php endwhile; ?>
		
		<div class="clear"></div>
 <div id="navigation">
  <?php if(function_exists('wp_pagenavi')) : ?>
        <?php wp_pagenavi() ?>
 	   <?php else : ?>
        <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries','arclite')) ?></div>
        <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;','arclite')) ?></div>
        <div class="clear"></div>
       <?php endif; ?>

</div>


	<?php else : ?>

		<h1 class="title">Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>


</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
