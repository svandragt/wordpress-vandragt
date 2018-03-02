<?php

include_once('functions/categoryposts.php');
include_once('functions/widgets.php');
include_once('functions/relatedposts.php');
include_once('vd_consolidate_post_format.php');

// disable wp embeds
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
//add_action( 'wp_footer', 'my_deregister_scripts' );

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
) );



function vdspf_update_post_format( $post_id ) {
	// Set category to status if post_format is status (used by feeds)
	if ($format == 'status') {
		if ( ! wp_is_post_revision( $post_id ) ) {

			// unhook this function so it doesn't loop infinitely
			remove_action('save_post', 'vdspf_update_post_format');

			// update the post, which calls save_post again
			$my_post = array(
		      'ID'          	=> $post_id,
			  'post_category'   => array(236),
			);
			wp_update_post( $my_post);

			// re-hook this function
			add_action('save_post', 'vdspf_update_post_format');
		}
	}


}
add_action( 'save_post', 'vdspf_update_post_format' );

function vdspf_exclude_nonstandard_format( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
    	vd_cpf_set_postmeta_format($query, 'standard');
    }

}
add_action( 'pre_get_posts', 'vdspf_exclude_nonstandard_format' );

add_action('after_setup_theme', 'vd_create_homepage');
function vd_create_homepage(){
    $home_grouped_page_id = get_option("vd-home_grouped_page_id");
    if ($home_grouped_page_id) {
	    $page = get_post($home_grouped_page_id);
	    if ($page) {
	    	return;
	    }
    }


    //create a new page and automatically assign the page template
    $args = array(
        'post_title' => "Home",
        'post_content' => "",
        'post_status' => "publish",
        'post_type' => 'page',
    );
    $id = wp_insert_post($args, true);
    if (is_wp_error($id)) {
    	return;
    }

    update_post_meta($id, "_wp_page_template", "home-grouped.php");
    update_option("vd-home_grouped_page_id", $id);

    // Use a static front page
	update_option( 'page_on_front',$id );
	update_option( 'show_on_front', 'page' );

}

add_action('after_setup_theme', 'vd_create_archives');
function vd_create_archives(){
    $archives_page_id = get_option("vd-archives_page_id");
    if ($archives_page_id) {
	    $page = get_post($archives_page_id);
	    if ($page) {
	    	return;
	    }
    }


    //create a new page and automatically assign the page template
    $args = array(
        'post_title' => "Archives",
        'post_content' => "",
        'post_status' => "publish",
        'post_type' => 'page',
    );
    $id = wp_insert_post($args, true);
    if (is_wp_error($id)) {
    	return;
    }

    update_post_meta($id, "_wp_page_template", "archives.php");
    update_option("vd-archives_page_id", $id);
}