<?php

/*
 * Titan Framework options sample code. We've placed here some
 * working examples to get your feet wet
 * @see	http://www.titanframework.net/get-started/
 */


add_action( 'tf_create_options', 'regala_create_options' );

/**
 * Initialize Titan & options here
 */
function regala_create_options() {

	$titan = TitanFramework::getInstance( 'regala' );
	
	
	/**
	 * Create a Theme Customizer panel where we can edit some options.
	 * You should put options here that change the look of your theme.
	 */
	
	$section = $titan->createThemeCustomizerSection( array(
	    'name' => __( 'Logo', 'regala' ),
	    'panel' => __( 'Theme Options & Colors', 'regala' ),
	) );
	
	$section->createOption( array(
	    'name' => __( 'Background Color of the Logo', 'regala' ),
	    'id' => 'logo_bg_color',
	    'type' => 'color',
	    'desc' => __( 'This color changes the background of your logo', 'regala' ),
	    'default' => '#000000',
	) );
	
	$section->createOption( array(
	    'name' => __( 'Text Color of the Logo', 'regala' ),
	    'id' => 'logo_text_color',
	    'type' => 'color',
	    'desc' => __( 'This color changes the color of the text logo', 'regala' ),
	    'default' => '#FFFFFF',
		'css' => '.site-title, .site-logo-link { &:visited, &:link, & { &, &:hover { color: value } } }',
	) );
	
	$section->createOption( array(
	    'name' => __( 'Background Opacity', 'regala' ),
	    'id' => 'logo_bg_opacity',
	    'type' => 'number',
		'default' => '0.5',
		'min' => '0.0',
		'max' => '1.0',
		'step' => '0.01',
	) );
	
	$section->createOption( array(
	    'name' => __( 'Hover Opacity', 'regala' ),
	    'id' => 'logo_hover_opacity',
	    'type' => 'number',
		'default' => '0.7',
		'min' => '0.0',
		'max' => '1.0',
		'step' => '0.01',
		'css' => '.site-title:hover, .site-title:visited:hover, .site-title:link:hover, .site-logo-link:hover, .site-logo-link:visited:hover, .site-logo-link:link:hover { opacity: value}',
	) );
	
	
	/**
	 * Social Icons
	 */
	
	$social = $titan->createThemeCustomizerSection( array(
	    'name' => __( 'Social Icons', 'regala' ),
        'panel' => __( 'Theme Options & Colors', 'regala' ),
		'desc' => 'Social link icons are placed on the top of your site. Paste the links to your social profiles below.'
	) );
	
	$social->createOption( array(
	    'name' => __( 'Icon Color', 'regala' ),
	    'id' => 'social_link_color',
	    'type' => 'color',
	    'default' => '#FFFFFF',
		'css' => '.social-navigation a:before { color: value}',
	) );
	
	for ( $i = 0; $i <= 10; $i++ ) {
		$social->createOption( array(
		    'name' => $i ? '' : __( 'Social Links', 'regala' ),
		    'id' => 'social_' . $i,
		    'type' => 'text',
		) );
	}
	
	
	/**
	 *   Menu button color option
	 */
	
	$menu = $titan->createThemeCustomizerSection( array(
	   'name' => __( 'Main Menu', 'regala' ),
	   'panel' => __( 'Theme Options & Colors', 'regala' ),
	) );
	
	$menu->createOption( array(
	   'name' => __( 'Menu Title', 'regala' ),
	   'id' => 'menu_title',
	   'type' => 'text',
	   'default' => __( 'Menu', 'regala' ),
	) );
	
	$menu->createOption( array(
	    'name' => __( 'Menu Button Icon Color', 'regala' ),
	    'id' => 'menu_icon_color',
	    'type' => 'color',
		'default' => '#616f7c',
		'css' => '.genericon-menu:before { color: value }',
	) );
	
	$menu->createOption( array(
	   'name' => __( 'Menu Button Background Color', 'regala' ),
	   'id' => 'menu_color',
	   'type' => 'color',
	   'default' => '#DADFE1',
	   'css' => '.menu-toggle { background: value }',
	) );
	
	$menu->createOption( array(
	    'name' => __( 'Menu Button Opacity', 'regala' ),
	    'id' => 'menu_opacity',
	    'type' => 'number',
		'default' => '0.7',
		'min' => '0.0',
		'max' => '1.0',
		'step' => '0.01',
		'css' => '.menu-toggle { opacity: value }',
	) );
    
    $menu->createOption( array(
	    'name' => __( 'Menu Button Hover Opacity', 'regala' ),
	    'id' => 'menu_hover_opacity',
	    'type' => 'number',
		'default' => '1',
		'min' => '0.0',
		'max' => '1.0',
		'step' => '0.01',
		'css' => '.menu-toggle:hover { opacity: value }',
	) );
	
	$menu->createOption( array(
	    'name' => __( 'Menu Area Background Color', 'regala' ),
	    'id' => 'inner_menu_color',
	    'type' => 'color',
		'default' => '#373A3C',
		'css' => '#site-navigation { background: value }',
	) );
	
	$menu->createOption( array(
	    'name' => __( 'Menu Area Text Color', 'regala' ),
	    'id' => 'inner_menu_text_color',
	    'type' => 'color',
		'default' => '#d3d2d1',
		'css' => '#main-menu { color: value }
		#main-menu {
			a, a:visited { 
				&:hover {
					color: value;
				}
			}
		}
		.main-navigation.toggled .genericon-menu:hover:before {
			color: value;
		}',
	) );
	
	$menu->createOption( array(
	    'name' => __( 'Menu Area Link Color', 'regala' ),
	    'id' => 'inner_menu_link_color',
	    'type' => 'color',
		'default' => '#d9b760',
		'css' => '#main-menu {
			a, a:visited { 
				color: value;
			}
		}
		.main-navigation.toggled .genericon-menu:before {
			color: value;
		}',
	) );
	
	
	/**
	 *   Tagline font and color options
	 */

	$font = $titan->createThemeCustomizerSection( array(
	    'name' => __( 'Frontpage Tagline Area', 'regala' ),
	    'panel' => __( 'Theme Options & Colors', 'regala' ),
	) );
	
	$font->createOption( array(
	   'name' => __( 'Tagline Heading Font', 'regala' ),
	   'id' => 'tagline_font',
	   'type' => 'font',
	   'default' => array(
	       'color' => '#FFFFFF',
	       'line-height' => '1.1em',
	       'font-size' => '50px',
	       'font-family' => 'Playfair Display',
           'font-weight' => '900',
           'font-style' => 'italic',
	   ),
	   'desc' => __( 'Select a Style', 'regala' ),
	   'css' => '#masthead-inner.tagline h1.site-description { value }',
	) );
	
	$font->createOption( array(
	    'name' => __( 'Tagline Caption Text Color', 'regala' ),
	    'id' => 'tagline_caption_color',
	    'type' => 'color',
	    'desc' => __( 'This color changes the color of the tagline caption', 'regala' ),
	    'default' => '#FFFFFF',
		'css' => 'p.tagline-description { color: value }',
	) );
	
	$font->createOption( array(
	    'name' => __( 'Bottom Offset', 'regala' ),
	    'id' => 'tagline_area_bottom_offset',
	    'type' => 'number',
	    'desc' => __( 'You can move your tagline upward by adding a bottom offset. A lower number means your tagline will be closer to the bottom of the screen', 'regala' ),
		'unit' => '%',
	    'default' => '20',
		'min' => '0',
		'step' => '0.1',
		'max' => '50',
		'css' => '#masthead-inner.tagline { bottom: valuevh }',
	) );
	
	
	/**
	 *   Default featured images
	 */
    
    $image = $titan->createThemeCustomizerSection( array(
        'name' => __( 'Default Featured Images', 'regala' ),
        'panel' => __( 'Theme Options & Colors', 'regala' ),
    ) );
    
    $image->createOption( array(
        'name' => __( 'Image 1', 'regala' ),
        'id' => 'featured_image',
        'type' => 'upload',
    ) );
    
    $image->createOption( array(
        'name' => __( 'Image 2', 'regala' ),
        'id' => 'featured_image2',
        'type' => 'upload',
    ) );
    
    $image->createOption( array(
        'name' => __( 'Image 3', 'regala' ),
        'id' => 'featured_image3',
        'type' => 'upload',
    ) );
    
    $image->createOption( array(
        'name' => __( 'Image 4', 'regala' ),
        'id' => 'featured_image4',
        'type' => 'upload', 
    ) );
    
    $image->createOption( array(
        'name' => __( 'Image 5', 'regala' ),
        'id' => 'featured_image5',
        'type' => 'upload',
    ) );
    
	
    /**
     *   Paging Navigation
     */
	
    $navigation = $titan->createThemeCustomizerSection( array(
        'name' => __( 'Paging Navigation', 'regala' ),
        'panel' => __( 'Theme Options & Colors', 'regala' ),
    ) );
    
    $navigation->createOption( array(
        'name' => __( 'Background Color Navigation', 'regala' ),
        'id' => 'navigation_bg_color',
        'type' => 'color',
        'default' => '#c4b371',
        'css' => '.paging-navigation { background: value }',
    ) );
    
    $navigation->createOption( array(
        'name' => __( 'Font Navigation', 'regala' ),
        'id' => 'navigation_fonts',
        'type' => 'font',
    	   'default' => array(
	       'color' => '#ffffff',
	       'line-height' => '1em',
	       'font-size' => '16px',
	       'font-family' => 'Playfair Display',
           'font-weight' => '900',
           'font-style' => 'italic',
	   ),
	   'desc' => __( 'Select a Style', 'regala' ),
	   'css' => 'ul.page-numbers a.page-numbers, ul.page-numbers span{ value }',
    ) );
    
	
    /**
     *   Color option for footer widgets
     */
    
    $footer = $titan->createThemeCustomizerSection( array(
        'name' => __( 'Footer Widgets Area', 'regala' ),
        'panel' => __( 'Theme Options & Colors', 'regala' ),
    ) );
    
    $footer->createOption( array(
        'name' => __( 'Background Color', 'regala' ),
        'id' => 'footer_bg_color',
        'type' => 'color',
        'default' => '#FFFFFF',
        'css' => '.site-footer { background: value }',
    ) );
    
    $footer->createOption( array(
        'name' => __( 'Text Color', 'regala' ),
        'id' => 'footer_text_color',
        'type' => 'color',
        'default' => '#616f7c',
        'css' => '.footer-widgets { color: value } 
			.footer-widgets a:hover, .footer-widgets a:link:hover, .footer-widgets a:visited:hover { color: value }',
    ) );
    
    $footer->createOption( array(
        'name' => __( 'Text Link Color', 'regala' ),
        'id' => 'footer_link_color',
        'type' => 'color',
        'default' => '#d9b760',
        'css' => '.footer-widgets a, .footer-widgets a:link, .footer-widgets a:visited { color: value }',
    ) );
	

	/**
	 * Footer copyright
	 */
	
	$section = $titan->createThemeCustomizerSection( array(
	    'name' => __( 'Footer Copyright Area', 'regala' ),
		'panel' => __( 'Theme Options & Colors', 'regala' ),
		'desc' => __( 'Colors & text of the bottom-most copyright area of the site', 'regala' ),
	) );

	$section->createOption( array(
	    'name' => __( 'Copyright Text', 'regala' ),
	    'id' => 'footer_copyright_text',
	    'type' => 'text',
		'default' => '&copy; ' . date( 'Y' ) . ', theme created by Gambit',
	) );

	$section->createOption( array(
	    'name' => __( 'Background Color', 'regala' ),
	    'id' => 'footer_copyright_bg_color',
	    'type' => 'color',
		'default' => '#000000',
		'css' => '.site-info-container { background: value }',
	) );

	$section->createOption( array(
	    'name' => __( 'Text Color', 'regala' ),
	    'id' => 'footer_copyright_text_color',
	    'type' => 'color',
		'default' => '#ffffff',
		'css' => '.site-info-container, .site-info-container a:hover, .site-info-container a:visited:hover { color: value }',
	) );
	
	
	/**
	 * Header Caption
 	 */
 	
 	$caption = $titan->createThemeCustomizerSection( array(
 	    'name' => 'title_tagline',
    ) );
	
	$caption->createOption( array(
		'name' => __( 'Home Page Tagline Caption', 'regala' ),
		'id' => 'home_caption',
		'type' => 'text',
	) );
 	
}