<?php get_header(); ?>

<div class="container">
	<main id="content" role="main" class="single">
		<?php the_post(); ?>
	    <?php get_template_part( 'format.single', get_post_format() ); ?>

	    <?php get_template_part( 'comments' ); ?>
	    
	    <?php edit_post_link( 'Edit This', '<div class="editlink">', '</div>'); ?> 
	</main>

	<?php //get_sidebar( 'content-bottom' ); ?>

</div>

<?php get_footer(); ?>

