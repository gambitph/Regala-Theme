<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package theme1
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
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'theme1' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
	    <?php if ( get_header_image()) : ?>
    	    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
        	</a>
    	<?php endif; // End header image check. ?>
    	
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding -->
        
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><span class="genericon genericon-menu"></span></button>
			<div class="menu">
			    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'inner-menu' ) ); ?>
			    <?php get_sidebar('main-menu'); ?>
            </div>
		</nav><!-- #site-navigation -->
		        
		<?php theme1_social_menu(); ?>
		
		<div class="search-toggle">
            <i class="fa fa-search"></i>
            <a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'my-simone' ); ?></a>
        </div>
        
		<div id="search-container" class="search-box-wrapper clear">
            <div class="search-box clear">
                <?php get_search_form(); ?>
            </div>
        </div>
        
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
