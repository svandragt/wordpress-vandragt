<?php get_header(); ?>

	<main id="content" role="main" class="single">
		<?php the_post(); ?>
        <?php get_template_part('format/single', get_post_format()); ?>

	    <?php get_template_part( 'comments' ); ?>

	</main>

<?php get_footer(); ?>

