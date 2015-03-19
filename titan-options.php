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
	    'name' => __( 'Theme Options', 'regala' ),
	) );
	
	$section->createOption( array(
	    'name' => __( 'Background Color', 'regala' ),
	    'id' => 'sample_color1',
	    'type' => 'color',
	    'desc' => __( 'This color changes the background of your theme', 'regala' ),
	    'default' => '#FFFFFF',
		'css' => 'body { background-color: value }',
	) );
	
	// $section->createOption( array(
// 	    'name' => __( 'Headings Font', 'regala' ),
// 	    'id' => 'headings_font',
// 	    'type' => 'font',
// 	    'desc' => __( 'Select the font for all headings in the site', 'regala' ),
// 		'show_color' => false,
// 		'show_font_size' => false,
// 	    'show_font_weight' => false,
// 	    'show_font_style' => false,
// 	    'show_line_height' => false,
// 	    'show_letter_spacing' => false,
// 	    'show_text_transform' => false,
// 	    'show_font_variant' => false,
// 	    'show_text_shadow' => false,
// 	    'default' => array(
// 	        'font-family' => 'Fauna One',
// 	    ),
// 		'css' => 'h1, h2, h3, h4, h5, h6 { value }',
// 	) );
	
	
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