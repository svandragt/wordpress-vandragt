<!DOCTYPE html><html lang="<?php bloginfo('language'); ?>">
<head>
  <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="<?php bloginfo('description'); ?>" />
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Full post feed" href="/rss.xml" />
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Status feed" href="/snippets.xml" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
  <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  <!-- WP-Minify CSS -->
  <meta name="95912bf4b466264c68a97a19f004f07fc9eb2558" content="69167b4b93905e89932bf8ab9c907f85e9d12ca9" />
</head>
<body>
  <div id="header">
    <h1><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo('name'); ?></a></h1>
    <nav id="nav">
			<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'primary-menu',
				 ) );
			?>
    </nav>
  </div>