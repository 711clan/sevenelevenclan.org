<!-- calling sidebar -->
<div id="sidebar">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar") ) : ?>


<!-- calling calendar -->
		<div class="sidebarWrapper">
		        <div class="sidebarHeader"></div>
			<h4 title="Calendar">Calendar</h4>
		<div class="sidebar">
			<?php get_calendar(); ?>
		</div>
		        <div class="sidebarFooter"></div>
		</div>
<!-- ending calendar -->

<!-- calling random blogroll -->
		<div class="sidebarWrapper">
		        <div class="sidebarHeader"></div>
			<h4 title="RandomBlogroll">Random Blogroll</h4>
		<div class="sidebar">
			<ul>
			<?php wp_list_bookmarks('title_li=&categorize=0&orderby=rand&limit=5'); ?>
			</ul>
		</div>
		        <div class="sidebarFooter"></div>
		</div>
<!-- ending random blogroll -->

<?php endif; ?>
</div>
<!-- ending sidebar -->