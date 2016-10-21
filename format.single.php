<article class="format <?php echo get_post_format(); ?>">
	<?php get_template_part('format.date'); ?>

	<h2><?php
		printf('<a href="%s">%s</a>', get_permalink(),  get_the_title());
	?></h2>

	<?php
		the_content('Continue Reading &raquo;');
		get_template_part(get_post_type(), 'meta');
	?>

</article>