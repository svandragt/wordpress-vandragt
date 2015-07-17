<?php get_header(); ?>

<div id="content" class="single projects">
	<?php the_post(); ?>
    <?php get_template_part( 'format.single', get_post_format() ); ?>
    <?php get_template_part( 'project-meta' ); ?>
    <?php get_template_part( 'comments' ); ?>
    <?php get_template_part( 'previousnext' ); ?>
</div>

<?php get_footer(); ?>