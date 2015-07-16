<?php get_header(); ?>
<div class="container">
	<div id="content" role="main" class="page">
		<article class="page">
			<?php the_post(); ?>
 
			<h2><?php the_title(); ?></h2>
			<?php 
				the_content('Read the rest of this entry &raquo;');
			?>
			</article>
		</article>
	</div>
</div>
<?php get_footer();