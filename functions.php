<?php
/**
 * regala functions and definitions
 *
 * @package regala
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600; /* pixels */
}

if ( ! function_exists( 'regala_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function regala_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on regala, use a find and replace
	 * to change 'regala' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'regala', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 400, 225, true );
	add_image_size( 'regala-wallpaper', 1600, 1024, true );
	add_image_size( 'jetpack-portfolio', 600, 400, true );
    
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'regala' ),
		'social' => __( 'Social Menu', 'regala' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside',
	// ) );

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'regala_custom_background_args', array(
	//         'default-color' => 'ffffff',
	//         'default-image' => '',
	//     ) ) );
	
	// Remove the header text
	defined( 'NO_HEADER_TEXT' ) or define( 'NO_HEADER_TEXT', true );
}
endif; // regala_setup
add_action( 'after_setup_theme', 'regala_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function regala_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'regala' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'The sidebar available in pages & blog posts', 'regala' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Left', 'regala' ),
		'id'            => 'footer-1',
		'description'   => __( 'The left footer widget area', 'regala' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Right', 'regala' ),
		'id'            => 'footer-3',
		'description'   => __( 'The right footer widget area', 'regala' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) ); 
	register_sidebar( array(
		'name'          => __( 'Main Menu Widgets', 'regala' ),
		'id'            => 'main-menu',
		'description'   => __( 'Widgets here appear in the main menu of the site.', 'regala' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'regala_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function regala_scripts() {
    
    // Use our copy of genericons instead of Jetpack's since we are using a newer version
	// wp_deregister_style( 'genericons' );

	if ( ! wp_script_is( 'genericons', 'registered' ) ) {
		wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css' );
	}
	
	wp_enqueue_style( 'regala-style', get_stylesheet_uri() );
	
	// wp_enqueue_style( 'regala-google-fonts', 'http://fonts.googleapis.com/css?family=Lato:100,400,700,900,400italic,900italic|PT+Serif:400,700,400italic,700italic' );
	                                         
    // wp_enqueue_style( 'regala_fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
    
    wp_enqueue_script( 'regala-scroll-article', get_template_directory_uri() . '/js/scroll-article.js', array( 'jquery' ), '20150216', true );
    // wp_enqueue_script( 'regala-background-picture', get_template_directory_uri() . '/js/background-picture.js', array( 'jquery' ), '20150216', true );
    
    // wp_enqueue_script( 'regala-hide-search', get_template_directory_uri() . '/js/hide-search.js', array(), '20140404', true );
    
    // wp_enqueue_script( 'regala-masonry-settings.js', get_template_directory_uri() . '/js/masonry-settings.js', array( 'masonry' ), '20140129'. true );
    
	wp_enqueue_script( 'regala-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'regala-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'regala_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load TGM Plugin Activation
 */
require get_template_directory() . '/tgm-plugin-activation.php';

/**
 * Load Titan Framework plugin checker
 */
require get_template_directory() . '/titan-framework-checker.php';

/**
 * Load Titan Framework options
 */
require get_template_directory() . '/titan-options.php';