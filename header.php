<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package regala
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

$bodyClasses = '';

/**
 * Get the header image to display
 */
$headerImageUrl = '';
$headerImageGradientColor = '';
$stop1Opacity = 0.6;
$stop2Opacity = 0.4;
if ( get_header_image() ) {
	$headerImageUrl = get_header_image();
	$headerImageGradientColor = '41,51,56';
}
if ( ( is_single() || is_page() ) && has_post_thumbnail() ) {
	$imageAttachment = wp_get_attachment_image_src( get_post_thumbnail_id(), 'regala-wallpaper' );

	if ( ! empty( $imageAttachment ) ) {
		$headerImageUrl = $imageAttachment[0];
	}
}
if ( is_single() || is_page() ) {
	
	$headerImageGradientColor = '41,51,56';
	$stop1Opacity = 0.7;
	$stop2Opacity = 0.5;
	
}
if ( ! empty( $headerImageUrl ) ) {
	$bodyClasses = ' has-header-image';
}

/**
 * Add sidebar class
 */
if ( is_single() || is_page() ) {	
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$bodyClasses .= ' has-sidebar';
	}
}
	
	
?>
<style id="regala_header">
	header#masthead {
		background-image: linear-gradient(45deg, rgba(<?php echo $headerImageGradientColor ?>,<?php echo $stop1Opacity ?>) 0%,rgba(<?php echo $headerImageGradientColor ?>,<?php echo $stop2Opacity ?>) 48%,rgba(<?php echo $headerImageGradientColor ?>,0) 100%), url( <?php echo esc_url( $headerImageUrl ) ?> );
	}
</style>
</head>

<body <?php body_class( $bodyClasses ) ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'regala' ); ?></a>
	<?php
		
	
	/**
	 * Header image
	 */	
	if ( ! empty( $headerImageUrl ) ) : ?>
	<header id="masthead" class="site-header" role="banner">
		
		<?php 
		// For the frontpage, display the site tagline
		if ( is_home() || is_front_page() ) {
			?>
			<div id="masthead-inner" class="tagline">
			
				<?php if ( get_bloginfo( 'description' ) ) : ?>
				<h1 class="site-description"><?php bloginfo( 'description' ) ?></h1>
				<?php endif; ?>	
		
				<?php regala_get_home_caption() ?>
        
	        </div>
			<?php
		
		// For the rest of the pages, display the title
		} else if ( is_single() ) {
			?>
			<div id="masthead-inner">
				<?php
				if ( 'post' == get_post_type() ) {
					?><span class="entry-category"><?php regala_entry_category() ?></span><?php
					?><span class="entry-date"><?php regala_posted_on() ?></span><?php
				}
				?>
				<h1 class="site-description"><?php the_title() ?></h1>
	        </div>
			<?php
			
		} else if ( is_archive() ) {
			?>
			<div id="masthead-inner">
				<h1 class="site-description"><?php the_archive_title() ?></h1>
	        </div>
			<?php
			
		} else if ( is_search() ) {
			?>
			<div id="masthead-inner">
				<span class="search-label"><?php _e( 'Search Results for:', 'regala' ) ?></span>
				<h1 class="site-description"><?php echo esc_html( get_search_query() ) ?></h1>    
	        </div>
			<?php
		} else if ( is_404() ) {
			?>
			<div id="masthead-inner">
				<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'regala' ); ?></h1>
	        </div>
			<?php
		
		// For the rest of the pages, display the title
		} else {
			?>
			<div id="masthead-inner">
				<h1 class="site-description"><?php the_title() ?></h1>
			</div>
			<?php
		}
		?>
		
	</header>
	<?php endif;
	

	/**
	 * Main menu
	 */	
	?>
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><span class="genericon genericon-menu"></span></button>
		<div id="main-menu" class="menu">
			<div class="inner-menu">
				<div class="menu-container">
					<?php
					$title = __( 'Menu', 'regala' );
					if ( class_exists( 'TitanFramework' ) ) {
						$titan = TitanFramework::getInstance( 'regala' );
						$title = $titan->getOption( 'menu_title' );
					}
					?>
					<h4><?php echo esc_html( $title ) ?></h4>
				    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</div>
			    <?php get_sidebar( 'main-menu' ); ?>
			</div>
        </div>
	</nav>
	<?php
	
	
	/**
	 * Logo & social icons
	 */
	?>
	<div id="site-top">   
		<span class="social-navigation"><?php regala_create_social_icons() ?></span>

		<?php
		if ( function_exists( 'jetpack_the_site_logo' ) ) {
			jetpack_the_site_logo();
		} else {
			?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title site-logo-link" rel="home"><?php esc_html( bloginfo( 'name' ) ); ?></a><?php
		}
		?>
		
	</div>
	<?php
		
		
	?>
	<div id="content" class="site-content">

