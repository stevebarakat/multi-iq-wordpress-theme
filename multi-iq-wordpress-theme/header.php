<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Multi IQ
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'multi-iq' ); ?></a>

	<header id="masthead" class="site-header" role="banner"> <!-- Start Grid -->
		
		<div class="site-branding col-md-4">
			<h1 class="logo img-responsive"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php echo( get_header_image() ); ?>" alt="<?php echo( get_bloginfo( 'title' ) ); ?>" /></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding -->

		<div id="header-widget-middle" class="col-md-4">
			<?php dynamic_sidebar( 'sidebar-8' ); ?>
		</div>

		<div id="header-widget-right" class="col-md-4">
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Menu', 'multi-iq' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="container">
		<!-- Start Grid -->
		<div class="row">
			<div class="col-md-12">
				<div class="row">
		
