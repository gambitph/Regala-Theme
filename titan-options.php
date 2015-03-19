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
		'css' => '.site-title:visited, .site-title:hover, .site-title:link { color: value}',
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
	
	$font = $titan->createThemeCustomizerSection( array(
	    'name' => __( 'Frontpage Tagline Area', 'regala' ),
	    'panel' => __( 'Theme Options & Colors', 'regala' ),
	) );
	
	$font->createOption( array(
	   'name' => __( 'Tagline Font', 'regala' ),
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
	   'css' => 'h1.site-description { value }',
	) );
	
	$font->createOption( array(
	    'name' => __( 'Text Color of the Tagline Caption', 'regala' ),
	    'id' => 'tagline_caption_color',
	    'type' => 'color',
	    'desc' => __( 'This color changes the color of the tagline caption', 'regala' ),
	    'default' => '#FFFFFF',
		'css' => 'p.tagline-description { color: value }',
	) );
	
	$font->createOption( array(
	    'name' => __( 'Tagline Area Bottom Offset', 'regala' ),
	    'id' => 'tagline_area_bottom_offset',
	    'type' => 'number',
	    'desc' => __( 'You can move your tagline upward by adding a bottom offset. A lower number means your tagline will be closer to the bottom of the screen', 'regala' ),
	    'default' => '100px',
		'css' => '#masthead-inner { bottom: valuepx }',
	) );
	
	/**
	 * Create an admin panel & tabs
	 * You should put options here that do not change the look of your theme
	 */
	
	$adminPanel = $titan->createAdminPanel( array(
	    'name' => __( 'Theme Settings', 'regala' ),
	) );
	
	$generalTab = $adminPanel->createTab( array(
	    'name' => __( 'General', 'regala' ),
	) );

	$generalTab->createOption( array(
	    'name' => __( 'Custom Javascript Code', 'regala' ),
	    'id' => 'custom_js',
	    'type' => 'code',
	    'desc' => __( 'If you want to add some additional Javascript code into your site, add them here and it will be included in the frontend header. No need to add <code>script</code> tags', 'regala' ),
	    'lang' => 'javascript',
	) );
	
	$generalTab->createOption( array(
	    'type' => 'save',
	) );
	
	
	$footerTab = $adminPanel->createTab( array(
	    'name' => __( 'Footer', 'regala' ),
	) );
	
	$footerTab->createOption( array(
		'name' => __( 'Copyright Text', 'regala' ),
		'id' => 'copyright',
		'type' => 'text',
		'desc' => __( 'Enter your copyright text here (sample only)', 'regala' ),
	) );
	
	$footerTab->createOption( array(
	    'type' => 'save',
	) );
	
	
	/*
	* Social Icons
	*/
	
	$social = $titan->createThemeCustomizerSection( array(
	    'name' => __( 'Social Icons', 'regala' ),
		'desc' => 'Social link icons are placed on the top of your site. Paste the links to your social profiles below.'
	) );
	
	for ( $i = 0; $i <= 10; $i++ ) {
		$social->createOption( array(
		    'name' => $i ? '' : __( 'Social Links', 'regala' ),
		    'id' => 'social_' . $i,
		    'type' => 'text',
		) );
	}
	
	/*
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