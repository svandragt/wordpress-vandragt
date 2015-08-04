<?php
add_shortcode( 'vd_category_posts', 'vd_categoryposts2' );

function vd_categoryposts2($atts) {
	# get the latest posts and group them by category
	// 	$loops = vd_categoryposts2(); foreach ($loops as $category => $posts):
	// 	printf("<h2>%s</h2>", get_the_category_by_ID( $category ));
	// 	foreach ( $posts as $post ) : setup_postdata( $post );
	// 		get_template_part( 'format.single', get_post_format() );
	// 	endforeach; 
	// 	wp_reset_postdata();
	// endforeach; 


	$posts = get_posts(array(
		'posts_per_page' => 999
	));
	
	$category_posts = array();
	foreach ($posts as $post) {
		$post_categories = get_the_category( $post->ID);
		foreach ($post_categories as $post_category) {
			if (!isset($category_posts[$post_category->name])) {
				$category_posts[$post_category->name] = array();
			}
			if (count($category_posts[$post_category->name]) < 3) {
			$category_posts[$post_category->name][] = $post;

			}
		}
	}

	foreach ($category_posts as $category => $posts) {

		printf("<h2>%s</h2><dl>", $category);
		foreach ($posts as $post) {
			printf("<dt><a href='%s'>%s</a></dt><dd>%s</dd>", get_the_permalink($post), $post->post_title, get_the_time('M j, Y', $post));
			// get_template_part( 'format.single', get_post_format($post->ID) ); 
			// var_dump($post);
		}
		print('</dl>');
	}

	// $my_query = new WP_Query( 'posts_per_page=' . get_option('posts_per_page') );
	// var_dump($my_query);
	// while ( $my_query->have_posts() ) : $my_query->the_post();
	// 	// get_template_part( 'format.single', get_post_format() ); 
	// endwhile;

	// return $category_posts;
}


function vd_categoryposts() {
	#  the last edited documents grouped by section ordered by max(document lastedited)?
	# get the categories
	# for each category: get the latest post date
	# order categories by latest post date
	# for each category: get x post

	$args = array(
		'parent' => 0,
	);
	$categories = get_categories($args);
	$category_dates = array();
	foreach ($categories as $category) {
		$category->cat_ID;
		$args = array(
			'category' => $category->cat_ID,
			'posts_per_page' => 1,

		);
		$last_post = array_pop(get_posts($args));
		$category_dates[$category->cat_ID] = $last_post->post_date;
	}
	uasort($category_dates, "vd_sortByDate"); 

	$category_queries = array();
	foreach ($category_dates as $category => $category_date) {
		$args = array(
			'category' => $category,
			'posts_per_page' => 3,
		);
		$category_queries[$category] = get_posts($args);
	}
	return $category_queries;
}

function vd_sortByDate( $a, $b ) {
    return strtotime($b) - strtotime($a);
}
