<?php
/**
 * RI Shows DIN functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RI_Shows_DIN
 */

if ( ! function_exists( 'rishows_din_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rishows_din_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on RI Shows DIN, use a find and replace
		 * to change 'rishows-din' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rishows-din', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'rishows-din' ),
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
		add_theme_support( 'custom-background', apply_filters( 'rishows_din_custom_background_args', array(
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
add_action( 'after_setup_theme', 'rishows_din_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rishows_din_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'rishows_din_content_width', 640 );
}
add_action( 'after_setup_theme', 'rishows_din_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rishows_din_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'rishows-din' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'rishows-din' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'rishows_din_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rishows_din_scripts() {
	wp_enqueue_style( 'rishows-din-style', get_template_directory_uri() . '/css/style.css' );

	wp_enqueue_script( 'rishows-din-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'rishows-din-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rishows_din_scripts' );

// use Events post type in User Submitted Post plugin
function usp_modify_post_type($post_type) {
	return 'tribe_events';
}
add_filter('usp_post_type', 'usp_modify_post_type');

// Remove Tribe Events Bar
add_filter( 'tribe-events-bar-should-show', '__return_false', 9999 );

// Changes the text for calendar export button
remove_action( 'tribe_events_after_footer', array( tribe( 'tec.iCal' ), 'maybe_add_link' ) );
add_action( 'tribe_events_after_footer', 'customized_tribe_single_event_links' );

function customized_tribe_single_event_links()	{
	if ( is_single() && post_password_required() ) {
		return;
	}
	echo '<a class="tribe-events-ical tribe-events-button button" title="Use this to share calendar data with Google Calendar, Apple iCal and other compatible apps" href="' . tribe_get_ical_link() . '">+ Export</a>';
}

// open event website link in a new window
// @link https://gist.github.com/cliffordp/3584b8aee70cde484700
add_filter( 'tribe_get_event_website_link_target', 'rishows_din_blank_target_for_new_window' );
function rishows_din_blank_target_for_new_window() {
	return '_blank';
}


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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

