<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package theme1
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function theme1_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'theme1_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function theme1_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'theme1' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'theme1_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function theme1_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'theme1_render_title' );
endif;

function regala_create_social_icons() {
	if ( ! class_exists( 'TitanFramework' ) ) {
		return;
	}
	$titan = TitanFramework::getInstance( 'regala' );
	
	for ( $i = 0; $i <= 10; $i++ ) {
		$url = $titan->getOption( 'social_' . $i );
		if ( empty( $url ) ) {
			continue;
		}
		
		echo "<a href='" . esc_attr( $url ) . "' target='_blank'></a>";
	}
}

function regala_get_home_caption() {
	if ( ! class_exists( 'TitanFramework' ) ) {
	    return;
	}
	
	$titan = TitanFramework::getInstance( 'regala' );
	
	if ( ! $titan->getOption( 'home_caption' ) ) {
		return;
	}
	
	echo "<p class='tagline-description'>" . $titan->getOption( 'home_caption' ) . "<p>";
}

// @see	http://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/
if ( ! function_exists( 'regala_hex2rgb' ) ) {
	function regala_hex2rgb($hex) {
	   $hex = str_replace("#", "", $hex);

	   if(strlen($hex) == 3) {
	      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   } else {
	      $r = hexdec(substr($hex,0,2));
	      $g = hexdec(substr($hex,2,2));
	      $b = hexdec(substr($hex,4,2));
	   }
	   $rgb = array($r, $g, $b);
	   //return implode(",", $rgb); // returns the rgb values separated by commas
	   return $rgb; // returns an array with the rgb values
	}
}

function regala_titan_custom_css() {
    if ( ! class_exists( 'TitanFramework' ) ) {
	    return;
	}
	
	$titan = TitanFramework::getInstance( 'regala' );
	
	$bg = $titan->getOption( 'logo_bg_color' );
	$opacity = $titan->getOption( 'logo_bg_opacity' );
	$rgb = regala_hex2rgb( $bg );
	
	echo "<style>
	    .site-title {
    		background: rgba({$rgb[0]}, {$rgb[1]}, {$rgb[2]}, {$opacity});
    	}
    </style>";
}
add_action( 'wp_head', 'regala_titan_custom_css' );
