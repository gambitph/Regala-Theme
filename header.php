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
<?php 

$headerImageUrl = '';
if ( get_header_image() ) {
	$headerImageUrl = get_header_image();
}
if ( is_single() && has_post_thumbnail() ) {
	$imageAttachment = wp_get_attachment_image_src( get_the_ID(), 'regala-wallpaper' );
	
	if ( ! empty( $imageAttachment ) ) {
		$headerImageUrl = $imageAttachment[0];
	}
}
?>
<style id="regala_header">
	header {
		background-image: url(<?php echo esc_url( $headerImageUrl ) ?>);
	}
</style>
</head>

<body <?php body_class( ! empty( $headerImageUrl ) ? 'has-header-image' : '' ) ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'regala' ); ?></a>

	<div id="site-top">
		        
		<?php // TODO: regala_create_social_icons() ?>
		
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title" rel="home"><?php bloginfo( 'name' ); ?></a>
	</div>

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><span class="genericon genericon-menu"></span></button>
		<div class="menu">
		    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'inner-menu' ) ); ?>
		    <?php get_sidebar('main-menu'); ?>
        </div>
	</nav>

	<?php if ( ! empty( $headerImageUrl ) ) : ?>
	<header id="masthead" class="site-header" role="banner">
		
		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		
		<?php // TODO: caption ?>
        
        </div>
	</header><!-- #masthead -->
	<?php endif; ?>

	<div id="content" class="site-content">
