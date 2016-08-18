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

		<p class="article-footer"><a href="/archives">Archives, search</a></p>
	</div>

</div>

<?php get_footer(); ?>
