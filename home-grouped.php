<?php
    /**
    * Template Name: Category Grouped Timeline
    */
 get_header(); ?>

    <!--suppress HtmlUnknownTarget -->
    <div id="content" role="main" class="index">
		<?php
		$category_posts = vd_posts_grouped_by_category(true);
		foreach ($category_posts as $category => $posts):
			$category_id = get_cat_ID( $category);
			$category_link = get_category_link( $category_id );
			printf('<article class="format-list"><h2 class="category"><a href="%s">%s</a></h2>',$category_link,$category);

			foreach ($posts as $post):
				setup_postdata($post);
                get_template_part('format/list', get_post_format());
			endforeach;
			print('</article>');
		endforeach;
		?>

		<p class="article-footer"><a href="/archives">Archives, search</a></p>
	</div>

<?php get_footer();