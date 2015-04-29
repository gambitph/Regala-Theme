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
		'default' => '0.0',
		'min' => '0.0',
		'max' => '1.0',
		'step' => '0.01',
	) );
	
	
	/**
	 * Fonts
	 */
	$section = $titan->createThemeCustomizerSection( array(
	    'name' => __( 'Fonts', 'regala' ),
		'panel' => __( 'Theme Options & Colors', 'regala' ),
		'desc' => __( 'Change the fonts used across your site', 'regala' ),
	) );
	
	$section->createOption( array(
	    'name' => __( 'Headings Font', 'regala' ),
	    'id' => 'headings_font',
	    'type' => 'font',
	    'desc' => __( 'Select the font for all headings in the site', 'regala' ),
		'show_color' => false,
		'show_font_size' => false,
	    // 'show_font_weight' => false,
	    // 'show_font_style' => false,
	    'show_line_height' => false,
	    'show_letter_spacing' => false,
	    'show_text_transform' => false,
	    'show_font_variant' => false,
	    'show_text_shadow' => false,
	    'default' => array(
	        'font-family' => 'Playfair Display',
			'font-weight' => '900',
			'font-style' => 'italic',
	    ),
		'css' => '.paging-navigation li span, .paging-navigation li a, .paging-navigation li a:link, .paging-navigation li a:visited,
		h1, h2, h3, h4, h5, h6, .site-logo-link,
		body .saboxplugin-wrap .saboxplugin-authorname,
		.main-navigation li a
		{ value }',
	) );
	
	$section->createOption( array(
	    'name' => __( 'Heading 1 Size', 'regala' ),
	    'id' => 'heading1_font',
	    'type' => 'font',
	    'desc' => __( 'The size of all <code>h1</code> headings', 'regala' ),
		'show_font_family' => false,
		'show_color' => false,
		// 'show_font_size' => false,
	    'show_font_weight' => false,
	    'show_font_style' => false,
	    'show_line_height' => false,
	    // 'show_letter_spacing' => false,
	    // 'show_text_transform' => false,
	    'show_font_variant' => false,
	    'show_text_shadow' => false,
	    'default' => array(
	        'font-size' => '60px',
			'letter-spacing' => 'normal',
			'text-transform' => 'normal',
	    ),
		'css' => 'h1
		{ value }',
	) );
	
	$section->createOption( array(
	    'name' => __( 'Heading 2 Size', 'regala' ),
	    'id' => 'heading2_font',
	    'type' => 'font',
	    'desc' => __( 'The size of all <code>h2</code> headings', 'regala' ),
		'show_font_family' => false,
		'show_color' => false,
		// 'show_font_size' => false,
	    'show_font_weight' => false,
	    'show_font_style' => false,
	    'show_line_height' => false,
	    // 'show_letter_spacing' => false,
	    // 'show_text_transform' => false,
	    'show_font_variant' => false,
	    'show_text_shadow' => false,
	    'default' => array(
	        'font-size' => '50px',
			'letter-spacing' => 'normal',
			'text-transform' => 'normal',
	    ),
		'css' => 'h2 { value }
		@media screen and (max-width: 710px) {
			h1 { value }
		}',
	) );
	
	$section->createOption( array(
	    'name' => __( 'Heading 3 Size', 'regala' ),
	    'id' => 'heading3_font',
	    'type' => 'font',
	    'desc' => __( 'The size of all <code>h3</code> headings', 'regala' ),
		'show_font_family' => false,
		'show_color' => false,
		// 'show_font_size' => false,
	    'show_font_weight' => false,
	    'show_font_style' => false,
	    'show_line_height' => false,
	    // 'show_letter_spacing' => false,
	    // 'show_text_transform' => false,
	    'show_font_variant' => false,
	    'show_text_shadow' => false,
	    'default' => array(
	        'font-size' => '28px',
			'letter-spacing' => 'normal',
			'text-transform' => 'normal',
	    ),
		'css' => 'h3 { value }
		@media screen and (max-width: 710px) {
			h2 { value }
		}',
	) );
	
	$section->createOption( array(
	    'name' => __( 'Heading 4 Size', 'regala' ),
	    'id' => 'heading4_font',
	    'type' => 'font',
	    'desc' => __( 'The size of all <code>h4</code> headings', 'regala' ),
		'show_font_family' => false,
		'show_color' => false,
		// 'show_font_size' => false,
	    'show_font_weight' => false,
	    'show_font_style' => false,
	    'show_line_height' => false,
	    // 'show_letter_spacing' => false,
	    'show_text_transform' => false,
	    'show_font_variant' => false,
	    'show_text_shadow' => false,
	    'default' => array(
	        'font-size' => '22px',
			'letter-spacing' => 'normal',
	    ),
		'css' => 'h4,
		body div#jp-relatedposts div.jp-relatedposts-items .jp-relatedposts-post .jp-relatedposts-post-title a
		{ value }
		@media screen and (max-width: 710px) {
			h3, h4 { value }
		}',
	) );
	
	$section->createOption( array(
	    'name' => __( 'Heading 5 Size', 'regala' ),
	    'id' => 'heading5_font',
	    'type' => 'font',
	    'desc' => __( 'The size of all <code>h5</code> headings', 'regala' ),
		'show_font_family' => false,
		'show_color' => false,
		// 'show_font_size' => false,
	    'show_font_weight' => false,
	    'show_font_style' => false,
	    'show_line_height' => false,
	    // 'show_letter_spacing' => false,
	    'show_text_transform' => false,
	    'show_font_variant' => false,
	    'show_text_shadow' => false,
	    'default' => array(
	        'font-size' => '16px',
			'letter-spacing' => 'normal',
	    ),
		'css' => 'h5
		{ value }
		@media screen and (max-width: 710px) {
			h5 { value }
		}',
	) );
	
	$section->createOption( array(
	    'name' => __( 'Heading 6 Size', 'regala' ),
	    'id' => 'heading6_font',
	    'type' => 'font',
	    'desc' => __( 'The size of all <code>h6</code> headings', 'regala' ),
		'show_font_family' => false,
		'show_color' => false,
		// 'show_font_size' => false,
	    'show_font_weight' => false,
	    'show_font_style' => false,
	    'show_line_height' => false,
	    // 'show_letter_spacing' => false,
	    'show_text_transform' => false,
	    'show_font_variant' => false,
	    'show_text_shadow' => false,
	    'default' => array(
	        'font-size' => '14px',
			'letter-spacing' => 'normal',
	    ),
		'css' => 'h6
		{ value }
		@media screen and (max-width: 710px) {
			h6 { value }
		}',
	) );
	
	$section->createOption( array(
	    'name' => __( 'Body Font', 'regala' ),
	    'id' => 'body_font',
	    'type' => 'font',
	    'desc' => __( 'The normal body font', 'regala' ),
		// 'show_font_family' => false,
		'show_color' => false,
		// 'show_font_size' => false,
	    // 'show_font_weight' => false,
	    'show_font_style' => false,
	    // 'show_line_height' => false,
	    // 'show_letter_spacing' => false,
	    'show_text_transform' => false,
	    'show_font_variant' => false,
	    'show_text_shadow' => false,
	    'default' => array(
			'font-family' => 'Gudea',
	        'font-size' => '16px',
			'line-height' => '1.6em',
			'letter-spacing' => 'normal',
			'font-weight' => 'normal',
	    ),
		'css' => 'body { value }',
	) );
	
	// $section->createOption( array(
// 	    'name' => __( 'Smaller Body Font', 'regala' ),
// 	    'id' => 'body_font_small',
// 	    'type' => 'font',
// 	    'desc' => __( 'The smaller body font found in various places in the theme', 'regala' ),
// 		'show_font_family' => false,
// 		'show_color' => false,
// 		// 'show_font_size' => false,
// 	    'show_font_weight' => false,
// 	    'show_font_style' => false,
// 	    'show_line_height' => false,
// 	    // 'show_letter_spacing' => false,
// 	    'show_text_transform' => false,
// 	    'show_font_variant' => false,
// 	    'show_text_shadow' => false,
// 	    'default' => array(
// 	        'font-size' => '12px',
// 			// 'line-height' => '1.5em',
// 			'letter-spacing' => 'normal',
// 	    ),
// 		'css' => 'article .entry-footer,
// 		.entry-meta,
// 		.entry-header .cat-links, .entry-header #breadcrumbs,
// 		.page-header .taxonomy-description,
// 		.navigation .nav-previous a span, .navigation .nav-next a span,
// 		#comments .comment-metadata > a, #comments .comment-metadata > a:visited,
// 		#comments .comment-reply-link,
// 		#comments .logged-in-as,
// 		body div#jp-relatedposts div.jp-relatedposts-items .jp-relatedposts-post .jp-relatedposts-post-context, body div#jp-relatedposts div.jp-relatedposts-items .jp-relatedposts-post .jp-relatedposts-post-date,
// 		.featured-content figcaption span
// 		{ value }
// 		',
// 	) );
	
	
	/**
	 * Social Icons
	 */
	
	$social = $titan->createThemeCustomizerSection( array(
	    'name' => __( 'Social Icons', 'regala' ),
        'panel' => __( 'Theme Options & Colors', 'regala' ),
		'desc' => 'Social link icons are placed on the top of your site. Paste the links to your social profiles below.'
	) );
	
	// $social->createOption( array(
	//     'name' => __( 'Icon Color', 'regala' ),
	//     'id' => 'social_link_color',
	//     'type' => 'color',
	//     'default' => '#FFFFFF',
	// 	'css' => '.social-navigation a:before { color: value}',
	// ) );
	
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
		'default' => '#212527',
		// 'css' => '#site-navigation { background: value }',
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
	   'show_text_shadow' => false,
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
        'default' => '#ffffff',
        'css' => '.paging-navigation { background: value }',
    ) );
    
    $navigation->createOption( array(
        'name' => __( 'Font Navigation', 'regala' ),
        'id' => 'navigation_fonts',
        'type' => 'font',
	    	   'default' => array(
		       'color' => '#c4b371',
		       'line-height' => '1em',
		       'font-size' => '28px',
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
        'desc' => __( 'Colors for the footer widgets', 'verdant' ),
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
		'css' => '.site-info-container, .site-info-container a:hover, .site-info-container a:visited:hover, .social-navigation a:before, .social-navigation a:link:before, .social-navigation a:visited:before { color: value }',
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
 	
 	$section = $titan->createThemeCustomizerSection( array(
 	    'name' => 'Color',
    ) );
	
	$section->createOption( array(
		'name' => __( 'Main / Highlight / Link Color', 'regala' ),
		'id' => 'highlight',
		'type' => 'color',
		'default' => '#d9b760',
		'css' => '
			blockquote, q { box-shadow: -5px 0 0 value; }
			body.search .site-main .no-results > .genericon, body.error404 .page-content > .genericon,
			#comments > .genericon { background: value }
			
			.widget-area a, .widget-area a:visited,
			.widget_calendar a, .widget_calendar a:visited,
			.widget_recent_comments .comment-author-link a, .widget_recent_comments .comment-author-link a:visited,
			.widget_tag_cloud .tagcloud a:hover, .widget_tag_cloud .tagcloud a:visited:hover,
			a, a:link, a:visited,
			.saboxplugin-wrap .saboxplugin-web a,
			body .comment-reply-link, body .comment-reply-link:link, body .comment-reply-link:visited,
			body .comment-edit-link,
			body .comment-edit-link:link,
			body .comment-edit-link:visited,
			body .btn,
			body .btn:link,
			body .btn:visited, body .btn-default, body .btn-default:link, body .btn-default:visited, body button, body button:link, body button:visited,
			body input[type="button"],
			body input[type="button"]:link,
			body input[type="button"]:visited,
			body input[type="reset"],
			body input[type="reset"]:link,
			body input[type="reset"]:visited,
			body input[type="submit"],
			body input[type="submit"]:link,
			body input[type="submit"]:visited,
		    body .comment-reply-link:hover, body .comment-reply-link:link:hover, body .comment-reply-link:visited:hover,
		    body .comment-edit-link:hover,
		    body .comment-edit-link:link:hover,
		    body .comment-edit-link:visited:hover,
		    body .btn:hover,
		    body .btn:link:hover,
		    body .btn:visited:hover, body .btn-default:hover, body .btn-default:link:hover, body .btn-default:visited:hover, body button:hover, body button:link:hover, body button:visited:hover,
		    body input[type="button"]:hover,
		    body input[type="button"]:link:hover,
		    body input[type="button"]:visited:hover,
		    body input[type="reset"]:hover,
		    body input[type="reset"]:link:hover,
		    body input[type="reset"]:visited:hover,
		    body input[type="submit"]:hover,
		    body input[type="submit"]:link:hover,
		    body input[type="submit"]:visited:hover,
			#comments .comment-metadata > a:hover, #comments .comment-metadata > a:visited:hover
			{ color: value; }
			
			body .comment-reply-link, body .comment-reply-link:link, body .comment-reply-link:visited,
			body .comment-edit-link,
			body .comment-edit-link:link,
			body .comment-edit-link:visited,
			body .btn,
			body .btn:link,
			body .btn:visited, body .btn-default, body .btn-default:link, body .btn-default:visited, body button, body button:link, body button:visited,
			body input[type="button"],
			body input[type="button"]:link,
			body input[type="button"]:visited,
			body input[type="reset"],
			body input[type="reset"]:link,
			body input[type="reset"]:visited,
			body input[type="submit"],
			body input[type="submit"]:link,
			body input[type="submit"]:visited,
			span.tags-links a {
				border-color: value }
			',
	) );
 	
}