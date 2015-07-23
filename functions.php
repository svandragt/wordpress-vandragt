<?php
// remove emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// ADD POST FORMATS
add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function vd_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Home Sidebar', 'theme-slug' ),
		'id'            => 'home_1',
		'description' => __( 'Widgets in this area will be shown on the homepage.', 'theme-slug' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'vd_widgets_init' );


/**
 * Root categories widget 
 */
function vd_root_categories($args) {
   echo $args['before_widget'];
   printf("%s%s%s", $args['before_title'], "Categories", $args['after_title']);
   printf("<ul>%s</ul>", wp_list_categories( 'title_li=&depth=1' ));
   echo $args['after_widget'];
}

wp_register_sidebar_widget(
    'vd_root_categories',        // your unique widget id
    'Root Categories',          // widget name
    'vd_root_categories',  // callback function
    array(                  // options
        'description' => 'Display first level categories.'
    )
);
/**
 * Post Volume widget 
 */
function vd_post_volume($args) {
   echo $args['before_widget'];
   printf("%s%s%s", $args['before_title'], "Stay updated", $args['after_title']);
   printf("<p>Around %s entries per month.</p>", vd_posts_per_month_count());
   echo $args['after_widget'];
}

wp_register_sidebar_widget(
    'vd_post_volume',        // your unique widget id
    'Post Volume',          // widget name
    'vd_post_volume',  // callback function
    array(                  // options
        'description' => 'How often you post.'
    )
);



function vd_categoryposts2() {
	# get the latest posts and group them by category
	// 	$loops = vd_categoryposts2(); foreach ($loops as $category => $posts):
	// 	printf("<h2>%s</h2>", get_the_category_by_ID( $category ));
	// 	foreach ( $posts as $post ) : setup_postdata( $post );
	// 		get_template_part( 'format.single', get_post_format() );
	// 	endforeach; 
	// 	wp_reset_postdata();
	// endforeach; 


	$posts = get_posts(array(
		'posts_per_page' => get_option('posts_per_page')
	));
	
	$category_posts = array();
	foreach ($posts as $post) {
		$post_categories = get_the_category( $post->ID);
		foreach ($post_categories as $post_category) {
			if (!isset($category_posts[$post_category->cat_ID])) {
				$category_posts[$post_category->cat_ID] = array();
			}
			if (count($category_posts[$post_category->cat_ID]) < 3) {
			$category_posts[$post_category->cat_ID][] = $post;

			}
		}
	}
	return $category_posts;
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


function vd_relatedposts_fromcategories($categories) {
	// return a random selection of posts based on the categories provided
	$cats = array();
	if($categories){
		foreach($categories as $category) {
			$cats[] = $category->term_id;
		}
	}
	$args = array(
		'posts_per_page'   => 5,
		'offset'           => 0,
		'category'         => implode(',', $cats),
		'orderby'          => 'rand',
		'order'            => 'DESC',

	);
	$posts_array = get_posts( $args );
	return $posts_array;
}

function vd_template_post_relatedposts() {
	// use in the loop
	// template the related posts
	$posts = vd_relatedposts_fromcategories(get_the_category());
	$the_ID =  get_the_ID();

	foreach ($posts as $post){
		if ($post->ID == $the_ID) continue;
		// var_dump($post);
		$link =get_permalink($post->ID);
		printf('<dt><a href="%s">%s</a></dt>',$link, $post->post_title);
		printf('<dd>%s</dd>',get_excerpt_by_id($post->ID));

	}
}

function vd_first_category_titles() { 
	// return category titles
	$titles = array();
	foreach((get_the_category()) as $category) { 
	    $titles[] = $category->cat_name . ' '; 
	} 
	return implode(' and ', $titles);
}

function get_excerpt_by_id($post_id){
	// generate an except based on the first $excerpt_length number of words
	
    $the_post = get_post($post_id); //Gets post ID
    $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
    $excerpt_length = 35; //Sets excerpt length by word count
    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
    $words = explode(' ', $the_excerpt, $excerpt_length + 1);

    if(count($words) > $excerpt_length) :
        array_pop($words);
        array_push($words, '…');
        $the_excerpt = implode(' ', $words);
    endif;

    $the_excerpt = '<p>' . $the_excerpt . '</p>';

    return $the_excerpt;
}

function vd_posts_per_month_count($number_of_months = 6) {
	$a = wp_get_archives('type=monthly&show_post_count=1&format=custom&echo=0&limit=' . $number_of_months); 
	$entries = explode('&nbsp;', $a);
	array_walk($entries, 'vd_post_count_from_entry');
	return round(array_sum(array_filter($entries)) / $number_of_months);
}

function vd_post_count_from_entry(&$item, $key)
{
   if (preg_match('/\((\d+)\)/', $item, $regs)) {
	$item = (int)$regs[1];
	} else {
		$item = null;
	}
}