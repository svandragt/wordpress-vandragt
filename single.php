<?php get_header(); ?>

	<main id="content" role="main" class="single">
		<?php the_post(); ?>
        <?php get_template_part('format/single', get_post_format()); ?>

	    <?php get_template_part( 'comments' ); ?>

		<div class="about">VanDragt.com is a cllection and semi organised thought process on web, development and technology news by Sander van Dragt.</div>
	</main>

<?php get_footer(); ?>

