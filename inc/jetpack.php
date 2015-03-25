<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package regala
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function regala_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'regala_jetpack_setup' );


/**
 * Add theme support for Portfolio Custom Post Type.
 * @see http://www.elegantthemes.com/blog/tips-tricks/what-you-need-to-know-about-the-new-portfolio-post-type-in-jetpack-3-1
 * @see http://en.support.wordpress.com/portfolios/portfolio-shortcode/
 */
function gambit_theme_jetpack_portfolio_cpt() {
	add_theme_support( 'jetpack-portfolio' );
}
add_action( 'after_setup_theme', 'gambit_theme_jetpack_portfolio_cpt' );


/**
 * Make all videos responsive
 * @see http://www.elegantthemes.com/blog/tips-tricks/what-you-need-to-know-about-the-new-portfolio-post-type-in-jetpack-3-1
 * @see http://en.support.wordpress.com/portfolios/portfolio-shortcode/
 */
function gambit_theme_jetpack_responsive_videos() {
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'gambit_theme_jetpack_responsive_videos' );

/**
 * Make all videos responsive
 * @see http://jetpack.me/support/site-logo/
 */
function regala_jetpack_site_logo() {
	$args = array(
	    'header-text' => array(
	        'site-title',
	        'site-description',
	    ),
	    'size' => 'full',
	);
	add_theme_support( 'site-logo', $args );
}
add_action( 'after_setup_theme', 'regala_jetpack_site_logo' );




function gambit_theme_jetpack_post_thumbnail_html( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
	if ( get_post_type( $post_id ) == 'jetpack-portfolio' && ( $size == 'full' || $size == 'large' ) ) {
		$size = 'jetpack-portfolio';
		return get_the_post_thumbnail( $post_id, $size, $attr );
	}
	return $html;
}
add_filter( 'post_thumbnail_html', 'gambit_theme_jetpack_post_thumbnail_html', 10, 5 );