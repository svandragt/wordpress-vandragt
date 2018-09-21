<?php
/**
 * The template for the sidebar containing the main widget area
 */
?>

<aside id="secondary" class="sidebar widget-area" role="complementary">

      <div id="header">
    <h1><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo('name'); ?></a></h1>
    <nav id="nav">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'primary-menu',
					'depth'          => 2,
				 ) );
			?>
    </nav>
  </div>

    <?php if ( is_active_sidebar( 'frontpage-1' ) && is_front_page()  ) : ?>
    		<?php dynamic_sidebar( 'frontpage-1' ); ?>
    <?php endif; ?>


    <?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
    		<?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php endif; ?>
</aside><!-- .sidebar .widget-area -->
