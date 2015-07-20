<article class="format <?php echo get_post_format(); ?>">
	<h2><?php 
		printf('<a href="%s">%s</a>', get_permalink(),  get_the_title());
	?></h2> 

	<?php 
		the_content('Read the rest of this entry &raquo;');
		get_template_part(get_post_type(), 'meta');
		get_template_part('format.date');
	?>
</article>

<?php get_template_part('post_relatedposts'); ?>   