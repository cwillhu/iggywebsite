<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<link rel="icon" type="image/png" href="/images/favicon.png"> 
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- MC BEGIN Minilims status plugin -->
  <link rel="stylesheet" href="/scripts/includes/jquery-ui-1.8.15.custom.css" type="text/css" />
<style>
.axis path, .axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

.statusbox {
 font: 8px sans-serif;

}
</style>
  <script type="text/javascript" src="/scripts/includes/jquery-1.6.2.js"></script>
  <script type="text/javascript" src="/scripts/includes/jquery-ui-1.8.15.custom.js"></script>
  <script type="text/javascript" src="/scripts/includes/d3.js"></script>
  <script type="text/javascript" src="/scripts/minilims/jquery.MinilimsStatusBox.js "></script>
  <script type="text/javascript" src="/scripts/minilims/D3ChordChart.js "></script>
<!-- MC END Minilims include -->

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
                 <a href="http://www.harvard.edu"</a>
                 <img class="logoL" src="<?php echo get_stylesheet_directory_uri(); ?>/images/hulogo_sm_trans.png" width="155.77777" height="41.55555" alt="logo"/>
                 <a href="http://www.fas.harvard.edu"</a>
                 <img class="logoR" src="<?php echo get_stylesheet_directory_uri(); ?>/images/FASlogo_sm_trans.png" width="155.77777" height="41.55555" alt="logo"/> 
		<hgroup id="maintitle">
			<h1 id="maintitle" class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">
