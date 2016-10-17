<?php
    /**
    * Template Name: Home
    */
 get_header(); ?>

<?php // get_sidebar( 'home' ); ?>


<div class="container">
	<div id="content" role="main" class="index">
		<?php
		// todo group by category, then limit to only x per cat; keeping paging ok
		$category_posts = vd_posts_grouped_by_category();
		foreach ($category_posts as $category => $posts):
			printf('<article><h2>%s</h2>',$category);
			foreach ($posts as $post):
				setup_postdata($post);
				get_template_part( 'format.list', get_post_format() );
			endforeach;
			print('</article>');
		endforeach;
		?>

		<p class="article-footer"><a href="/archives">Archives, search</a></p>
	</div>



</div>

<?php get_footer(); ?>


