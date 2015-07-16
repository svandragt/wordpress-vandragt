<?php
wp_deregister_script( 'admin-bar' );
wp_deregister_style( 'admin-bar' );
remove_action('wp_footer','wp_admin_bar_render',1000);
remove_action('wp_head', '_admin_bar_bump_cb');
?><!DOCTYPE html><html lang="<?php bloginfo('language'); ?>">
<head>
  <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
  <meta name="viewport" content="width=device-width">
  <meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="<?php bloginfo('description'); ?>" />
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="http://vandragt.com/rss.xml" />
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Snippets Feed" href="http://vandragt.com/snippets.xml" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
  <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  <!-- WP-Minify CSS -->
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
  <div id="header">
    <h1><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo('name'); ?></a></h1>
    <div id="nav">
      <?php wp_page_menu(array(
        'show_home'   => false,
        ));  ?>
        
      </div>
    </div>