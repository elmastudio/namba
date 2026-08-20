<?php
/**
 * The themes Header file.
 *
 * Displays all of the <head> section, you find further header content in masthead.php
 *
 * @package Namba
 * @since Namba 1.0
 */
 ?><!DOCTYPE html>
<html id="doc" class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
		<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="container">
	<div class="sidebar-border"></div>

<div id="sidebar">
	<header id="masthead" class="clearfix" role="banner">
		<div id="site-title">
			<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- end #site-title -->
	</header><!-- end #masthead -->

	<a href="#nav-mobile" id="mobile-menu-btn"><span><?php _e('Menu', 'namba') ?></span></a>
	<a href="#nav-mobile" id="mobile-info-btn"><span><?php _e('Info', 'namba') ?></span></a>
	<nav id="site-nav" class="clearfix">
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</nav><!-- end #site-nav -->

	<?php get_sidebar(); ?>

</div><!-- end #sidebar -->

<div id="main-wrap">

	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div id="widget-area-top" class="clearfix">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div><!-- .widget-area-top -->
	<?php endif; ?>
