<?php get_header(); ?>

<div id="content" class="single projects">
	<?php the_post(); ?>
    <?php get_template_part( 'format.single', get_post_format() ); ?>
    <?php get_template_part( 'project-meta' ); ?>
    <?php get_template_part( 'comments' ); ?>
</div>

<div class="previousnext">
	<?php previous_post_link('%link', '&laquo; %title') ?>
	<?php next_post_link('%link', '%title  &raquo;') ?>
</div>

<?php get_footer(); ?>