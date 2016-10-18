<?php get_header(); ?>
	<div id="content" role="main" class="page">
		<article class="page">
			<?php the_post(); ?>

			<h2><?php the_title(); ?></h2>
			<?php
				the_content('Continue reading &raquo;');
			?>
		</article>
	</div>
<?php get_footer();