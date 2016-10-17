<article class="format <?php echo get_post_format(); ?>">
	<?php get_template_part('format.date'); ?>
	<h2>
		<?php printf('<a href="%s">%s</a>', get_post_meta(get_the_ID(), 'link', true),  get_the_title()); ?>
	</h2>

	<?php
		the_content('Continue reading &raquo;');
	?>
	<?php edit_post_link( 'Edit This', '<div class="editlink">', '</div>'); ?>
</article>