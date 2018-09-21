<?php

/**
 * Register our sidebars and widgetized areas.
 *
 */
function vd_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Frontpage Sidebar', 'theme-slug' ),
		'id'            => 'frontpage-1',
		'description' => __( 'Widgets in this area will be shown on the frontpage.', 'theme-slug' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vd_widgets_init' );


/**
 * Root categories widget
 * @param $args
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
 * @param $args
 */
function vd_post_volume($args) {
   echo $args['before_widget'];
   printf("%s%s%s", $args['before_title'], "Stay updated", $args['after_title']);
   $stats = vd_posts_volume_count();
   printf("<p title='%s entries over %s months'>Around %s entries per month.</p>", $stats['total_entries'], $stats['total_months'], $stats['postvolume']);
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

function vd_posts_volume_count($number_of_months = 6) {
	$a = wp_get_archives('type=monthly&show_post_count=1&format=custom&echo=0&limit=' . $number_of_months);
	$entries = explode('&nbsp;', $a);
	array_walk($entries, 'vd_post_count_from_entry');
	$number_of_entries = array_sum(array_filter($entries));
	$stats = array();

	$stats['total_entries'] = $number_of_entries;
	$stats['total_months'] = $number_of_months;
	$stats['postvolume']  = round($number_of_entries / $number_of_months);
	return $stats;
}

function vd_post_count_from_entry(&$item, $key)
{
   if (preg_match('/\((\d+)\)/', $item, $regs)) {
	$item = (int)$regs[1];
	} else {
		$item = null;
	}
}