<?php
/**
 * superultra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package superultra
 */

if ( ! function_exists( 'superultra_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function superultra_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on superultra, use a find and replace
		 * to change 'superultra' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'superultra', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'superultra' ),
			'social' => esc_html__('Social Navigation', 'superultra') ,
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'superultra_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'superultra_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function superultra_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$content_width = apply_filters( 'superultra_content_width', 640 );
}
add_action( 'after_setup_theme', 'superultra_content_width', 0 );


//No reference to add_editor
function superultra_metro_news_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'superultra_metro_news_add_editor_styles' );



function superultra_media_js( $hook ) {
    if( $hook != 'widgets.php' )
    return;
  wp_enqueue_script('superultra_meta_upload_widget', get_template_directory_uri().'/inc/js/add-image-script-widget.js', array('jquery', 'media-upload', 'thickbox'), false, true);
}
add_action('admin_enqueue_scripts', 'superultra_media_js', 10);


/**
 * Enqueue scripts and styles.
 */
function superultra_scripts() {

	wp_register_style( 'superultra_google_font', '//fonts.googleapis.com/css?family=family=Abhaya+Libre:400,500,600,700,800|Nunito+Sans:400,400i,600,600i,700,700i');
  	wp_enqueue_style( 'superultra_google_font' );
	
	wp_enqueue_style( 'superultra-raratheme-companion-public-css', get_template_directory_uri(). '/css/raratheme-companion-public.css', array(),  false );
	
	wp_enqueue_style( 'superultra-fontawesome-all-css', get_template_directory_uri(). '/css/fontawesome-all.css', array(),  false );

	wp_enqueue_style( 'superultra-style', get_stylesheet_uri() );

	wp_enqueue_script( 'superultra-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'superultra-scripts', get_template_directory_uri() . '/js/jquery-1.12.0.js', array(),'20151215', true );

	if(is_single()){
	wp_enqueue_script( 'superultra-sticky-sidebar-scripts', get_template_directory_uri() . '/js/sticky-sidebar.js', array(),'20151215', true );
	}

	wp_enqueue_script( 'superultra-custom-scripts', get_template_directory_uri() . '/js/custom.js', array(), '20151215',  true );

	wp_enqueue_script( 'superultra-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'superultra_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Body classes additions.
 */
//require get_template_directory() . '/inc/body-classes.php';

/**
 * Load widgets and sidebar file
 */
require get_template_directory() . '/inc/widgets/superultra-widgets.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


//pagination
if ( ! function_exists( 'twentynineteen_the_posts_navigation' ) ) :
	
	function superultra_the_posts_navigation() {
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf(
					'%s %s',
					( '<span class="prev-arrow"></span>' ),
					__( 'Prev', 'superultra' )
				),
				'next_text' => sprintf(
					'%s %s',
					__( 'Next', 'superultra' ),
					( '<span class="next-arrow"></span>' )
				),
			)
		);
	}
endif;