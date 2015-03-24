<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package regala
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function regala_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'regala_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function regala_wp_title( $title, $sep ) {
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
			$title .= " $sep " . sprintf( __( 'Page %s', 'regala' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'regala_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function regala_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'regala_render_title' );
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
	    .site-title, .site-logo-link {
    		background: rgba({$rgb[0]}, {$rgb[1]}, {$rgb[2]}, {$opacity});
    	}
    </style>";
}
add_action( 'wp_head', 'regala_titan_custom_css' );


/**
 * Halves the size of the site-logo to make it retina ready
 *
 * @param	$html string The rendered site-logo html
 * @param	$logo array The logo-Jetpack object
 * @param	$size string The size of the logo
 * @see	jetpack_the_site_logo filter in Jetpack
 */
function regala_the_site_logo( $html, $logo, $size ) {
	
	if ( empty( $logo ) ) {
		return '<a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo-link" rel="home"><img class="site-logo attachment" width="160" src="' . get_template_directory_uri() . '/images/logo.png" title="Regala WordPress Theme"/></a>';
	}
	if ( empty( $logo['url'] ) ) {
		return '<a href="' . esc_url( home_url( '/' ) ) . '" class="site-logo-link" rel="home"><img class="site-logo attachment" width="160" src="' . get_template_directory_uri() . '/images/logo.png" title="Regala WordPress Theme"/></a>';
	}
	
	// Checker, comes from jetpack_the_site_logo
	if ( ! jetpack_has_site_logo() ) {
		return $html;
	}
	
	// Get the image size
	$imageAttachment = wp_get_attachment_image_src( $logo['id'], $size );
	
	// Half the image size since we want a retina ready image
	$html = preg_replace( '/width="(\d+)"/i', 'width="' . ( $imageAttachment[1] / 2 ) . '"', $html );
	$html = preg_replace( '/height="(\d+)"/i', 'height="' . ( $imageAttachment[2] / 2 ) . '"', $html );
	
	return $html;
}
add_filter( 'jetpack_the_site_logo', 'regala_the_site_logo', 10, 3 );


/**
 * This snippet will make `is_active_sidebar` work correctly with Custom Sidebars
 * @author Benjamin Intal
 * @see https://wordpress.org/support/topic/is_active_sidebar-not-reflecting-new-sidebar?replies=2#post-6483681
 * @see https://gist.github.com/bfintal/5b565eb32e8472e755a9
 */

/**
 * Gathers all the sidebar IDs and the replacement IDs
 */
add_action( 'cs_predetermineReplacements', 'gambit_theme_custom_sidebars_determine_replacements' );
function gambit_theme_custom_sidebars_determine_replacements( $defaults ) {
	global $_verdant_sidebar_ids_to_replace;
	$_verdant_sidebar_ids_to_replace = array();
	
	$customSidebarReplacer = CustomSidebarsReplacer::instance();
	
	$replacements = $customSidebarReplacer->determine_replacements( $defaults );

	foreach ( $replacements as $sb_id => $replace_info ) {

		if ( ! is_array( $replace_info ) || count( $replace_info ) < 3 ) {
			continue;
		}

		// Fix rare message "illegal offset type in isset or empty"
		$replacement = (string) @$replace_info[0];
		$replacement_type = (string) @$replace_info[1];
		$extra_index = (string) @$replace_info[2];

		$check = $customSidebarReplacer->is_valid_replacement( $sb_id, $replacement, $replacement_type, $extra_index );

		if ( $check ) {
			$_verdant_sidebar_ids_to_replace[ $sb_id ] = $replacement;
		}
	}
}


/**
 * Checks the sidebars being replaced and make corresponding is_active_sidebar calls to work
 */
add_filter( 'is_active_sidebar', 'verdant_custom_sidebars_is_active_sidebar', 10, 2 );
function verdant_custom_sidebars_is_active_sidebar( $is_active_sidebar, $index ) {
	global $_verdant_sidebar_ids_to_replace;
	
	if ( empty( $_verdant_sidebar_ids_to_replace ) ) {
		return $is_active_sidebar;
	}
	
	if ( ! empty( $_verdant_sidebar_ids_to_replace[ $index ] ) ) {
		// Return the current value if it's the same replacement	
		if ( $_verdant_sidebar_ids_to_replace[ $index ] == $index ) {
			return $is_active_sidebar;
		}
		
		return is_active_sidebar( $_verdant_sidebar_ids_to_replace[ $index ] );
	}
	
	return $is_active_sidebar;
}