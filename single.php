<?php get_header(); ?>

<div class="container">
	<div id="content" role="main" class="single">
		<?php the_post(); ?>
	    <?php get_template_part( 'format.single', get_post_format() ); ?>

	    <?php get_template_part( 'comments' ); ?>
	</div>

</div>
 
<?php get_footer(); ?>

