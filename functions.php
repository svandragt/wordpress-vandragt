<?php

include_once('functions.categoryposts.php');
include_once('functions.widgets.php');
include_once('functions.relatedposts.php');

// disable jetpack css
add_filter( 'jetpack_implode_frontend_css', '__return_false' );
// disable admin bar
// add_filter('show_admin_bar', '__return_false');

// remove emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// disable wp embeds
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

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


define('VDSPF_POST_FORMAT', 'vdspf_post_format');

function vdspf_update_post_format( $post_id ) {
	// detect post format (including standard!)
	$format = get_post_format() ? : 'standard';
	update_post_meta($post_id, VDSPF_POST_FORMAT , $format);
}
add_action( 'save_post', 'vdspf_update_post_format' );

function vdspf_exclude_nonstandard_format( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        var_dump($query->query_vars);
    }

}
add_action( 'pre_get_posts', 'vdspf_exclude_nonstandard_format' );