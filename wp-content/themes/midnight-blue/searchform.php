<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<div>
	<input type="text" value="<?php the_search_query(); ?>" alt="keywords" name="s" id="s" />
	<input type="submit" alt="search" id="searchsubmit" value="GO" />
</div>
</form>
