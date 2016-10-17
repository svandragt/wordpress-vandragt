<?php

function vd_posts_grouped_by_category($single_category = false) {
	// get the latest posts and group them by category


	// get the last 50 posts
	$posts = get_posts(array(
		'posts_per_page' => 50,
		'category' => -236
	));

	// sort first 3 posts per category
	$category_posts = array();
	foreach ($posts as $post) {
		$post_categories = get_the_category( $post->ID);
		foreach ($post_categories as $post_category) {
			if ($post_categories[0] !== $post_category && $single_category) {
				continue;
			}
			if (!isset($category_posts[$post_category->name])) {
				$category_posts[$post_category->name] = array();
			}
			if (count($category_posts[$post_category->name]) < 3) {
			$category_posts[$post_category->name][] = $post;
			}
		}
	}


	return $category_posts;
}