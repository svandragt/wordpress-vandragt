<?php get_header(); ?>

<div class="container">
	<div id="content" role="main" class="single">
	    <?php get_template_part( 'previousnext' ); ?>
		<?php the_post(); ?>
	    <?php get_template_part( 'format.single', get_post_format() ); ?>
		
		<?php get_template_part('post_relatedposts'); ?>   

	    <?php get_template_part( 'comments' ); ?>
	</div>
</div>
 
<?php get_footer(); ?>

