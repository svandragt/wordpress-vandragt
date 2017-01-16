<?php
/*
Plugin Name: Consolidate Post Format
Plugin URI: https://vandragt.com
Description: Consolidate post format into post meta. This allows efficient post format queries.
Author: Sander van Dragt
Version: 1.0
Author URI: https://vandragt.com
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define('VD_CPF_POST_FORMAT', '_vd_cpf_post_format');

function vd_cpf_save_post( $post_id ) {
	// consolidate post format into postmeta
	$format = get_post_format() ? : 'standard';
	update_post_meta($post_id, VD_CPF_POST_FORMAT , $format);
}
add_action( 'save_post', 'vdcpf_save_post' );

// utility function for pre_get_posts use
function vd_cpf_set_postmeta_format($query, $format) {
   $query->set( 'meta_key', VD_CPF_POST_FORMAT);
   $query->set( 'meta_value',$format );
}
