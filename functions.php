<?php

include_once('functions.categoryposts.php');
include_once('functions.widgets.php');
include_once('functions.relatedposts.php');

// disable jetpack css
add_filter( 'jetpack_implode_frontend_css', '__return_false' );

// remove emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// ADD POST FORMATS
add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );

if (!is_admin()) {
	// remove admin bar
	wp_deregister_script( 'admin-bar' );
	wp_deregister_style( 'admin-bar' );
	remove_action('wp_footer','wp_admin_bar_render',1000);
	remove_action('wp_head', '_admin_bar_bump_cb');
}

function vd_first_category_titles() { 
	// return category titles
	$titles = array();
	foreach((get_the_category()) as $category) { 
	    $titles[] = $category->cat_name . ' '; 
	} 
	return implode(' and ', $titles);
}