<?php get_header(); 
set_post_thumbnail_size( 300, 150, false );
?>
<div id="content" role="main" class="index archive projects">
	<h2>Projects</h2>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article class="format <?php echo get_post_format(); ?>">
		<?php

		if ( has_post_thumbnail() ) {
			printf('<a href="%s" class="gallery-item">%s</a>', get_permalink(),  get_the_post_thumbnail() );
		} 
 ?>
	</article>
	<?php endwhile; else: ?>
	<div class="warning">
		<p>Sorry, but you are looking for something that isn't here.</p>
	</div>
	<?php endif; ?>
</div>
<div id="sidebar">
	<h2>Archives</h2>
	<ul class="archive_list">
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
</div>

<?php get_footer(); ?>
