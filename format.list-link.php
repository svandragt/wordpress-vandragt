	<h2><?php
		printf('<a href="%s">%s</a>', get_post_meta(get_the_ID(), 'link', true),  get_the_title());
	?></h2>
	<?php the_excerpt('Continue Reading &raquo;');?>
