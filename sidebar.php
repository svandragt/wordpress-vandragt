<?php
/**
 * The template for the sidebar containing the main widget area
 */
global $wp_registered_sidebars;
if (false === empty($wp_registered_sidebars)):
?>


<aside id="secondary" class="sidebar widget-area" role="complementary">

     <?php if ( is_active_sidebar( 'frontpage-1' ) && is_front_page()  ) : ?>
    		<?php dynamic_sidebar( 'frontpage-1' ); ?>
    <?php endif; ?>


    <?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
    		<?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php endif; ?>
</aside><!-- .sidebar .widget-area -->
<?php
endif;