<article class="format <?php echo get_post_format(); ?>">
	<h2>
		<?php printf('<a href="%s">%s</a>', get_post_meta(get_the_ID(), 'link', true),  get_the_title()); ?>
	</h2>

	<?php 
		the_content('Read the rest of this entry &raquo;');
		get_template_part('format.date');
	?>
</article>