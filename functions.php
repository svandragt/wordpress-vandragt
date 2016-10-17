<?php

include_once('functions.categoryposts.php');
include_once('functions.widgets.php');
include_once('functions.relatedposts.php');

// disable jetpack css
add_filter( 'jetpack_implode_frontend_css', '__return_false' );
// disable admin bar
add_filter('show_admin_bar', '__return_false');

// ADD POST FORMATS
add_theme_support( 'post-formats',
	array(
		'aside',
		'chat',
		'gallery',
		'image',
		'link',
		'quote',
		'status',
		'video',
		'audio'
	));

function vd_first_category_titles() {
	// return category titles
	$titles = array();
	foreach((get_the_category()) as $category) {
	    $titles[] = $category->cat_name . ' ';
	}
	return implode(' and ', $titles);
}


// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'vandragt' ),
	// 'social'  => __( 'Social Links Menu', 'vandragt' ),
) );
