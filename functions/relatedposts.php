<?php

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
		printf('<dd>%s</dd>',get_excerpt_for_post($post));

	}
}

function get_excerpt_for_post($post){
	// generate an except based on the first $excerpt_length number of words
	
	if (is_integer($post)) {
	    $the_post = get_post($post); //Gets post ID
	} elseif (is_object($post)) {
		$the_post = $post;
	}
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
