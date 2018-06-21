<?php


/**
 *
 * [categoryposts posts_per_page="50" posts_per_cat="3"]
 *
 * @param array $atts
 * @return array
 */
function vd_categoryposts($atts)
{
    // get the latest posts and group them by category
    $a = shortcode_atts( array(
        'single_category' => true,
        'posts_per_page' => 50,
        'posts_per_cat' => 3,
    ), $atts );


    $single_category = (bool)$a['single_category'];
    $posts_per_page = (int)$a['posts_per_page'];
    $posts_per_cat = (int)$a['posts_per_cat'];


    // get the last 50 posts
    $posts = get_posts(array(
        'posts_per_page' => $posts_per_page,
        'suppress_filters' => false,
    ));

    // sort first 3 posts per category
    $category_posts = array();
    foreach ($posts as $post) {
        $post_categories = get_the_category($post->ID);
        foreach ($post_categories as $post_category) {
            // skip multiple categories if disabled
            if ($post_categories[0] !== $post_category && $single_category) {
                continue;
            }
            if (!isset($category_posts[$post_category->name])) {
                $category_posts[$post_category->name] = array();
            }
            if (count($category_posts[$post_category->name]) < $posts_per_cat) {
                $category_posts[$post_category->name][] = $post;
            }
        }
    }

    return $category_posts;

}

add_shortcode('categoryposts', 'vd_categoryposts');



