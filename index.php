<?php get_header(); ?>

<div class="container">
	<div id="content" role="main" class="index">
		<?php  
		// todo group by category, then limit to only x per cat; keeping paging ok
		if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'format.single', get_post_format() ); ?>
		<?php endwhile; else: ?>
		<div class="warning">
			<p>Sorry, but you are looking for something that isn't here.</p>
		</div>
		<?php endif; ?>
		<div class="previousnext">
			<?php posts_nav_link('','&laquo; Newer','Older &raquo;'); ?>
		</div>
	</div>

	<div id="sidebar">
		<?php 
		if ( is_active_sidebar( 'home_1' ) ) : 
			dynamic_sidebar( 'home_1' ); 
		endif; 
		?>

	</div>
</div>

<?php get_footer(); ?> 
