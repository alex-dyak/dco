<?php
/**
 * W4P Theme Functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage W4P-Theme
 * @since W4P Theme 1.0
 */

/**
 * Theme Setup.
 */
function dco_setup() {
	load_theme_textdomain( 'dco', get_template_directory() . '/languages' );
	add_theme_support( 'structured-post-formats', array( 'link', 'video' ) );
	add_theme_support( 'post-formats', array(
			'aside',
			'audio',
			'chat',
			'gallery',
			'image',
			'quote',
			'status',
		)
	);
	register_nav_menu( 'primary', __( 'Navigation Menu', 'dco' ) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );

	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'mobile_img', 280, 280, true );
		add_image_size( 'plunshet_img', 300, 300, TRUE );
	}

}

add_action( 'after_setup_theme', 'dco_setup' );

/**
 * Scripts & Styles.
 */
function dco_scripts_styles() {
	global $wp_styles;

	// Load Comments.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Load Stylesheets.
	wp_enqueue_style( 'dco-style', get_template_directory_uri() . '/css/application.css');

	// This is where we put our custom JS functions.
	wp_enqueue_script( 'dco-application', get_template_directory_uri() . '/js/app.min.js', array( 'jquery' ), null, true );

    wp_enqueue_script( 'typekit', 'https://use.typekit.net/zfh5oso.js', array(), null, false );
    wp_add_inline_script( 'typekit', 'try{Typekit.load({ async: true });}catch(e){}' );
}

add_action( 'wp_enqueue_scripts', 'dco_scripts_styles' );

/**
 * WP Title.
 *
 * @param string $title Where something interesting takes place.
 * @param string $sep Separator string.
 *
 * @return string
 */
function dco_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'dco' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'dco_wp_title', 10, 2 );

// Custom Menu.
register_nav_menu( 'primary', __( 'Navigation Menu', 'dco' ) );


/**
 * Navigation - update coming from twentythirteen.
 */
function post_navigation() {
	echo '<div class="navigation">';
	echo '	<div class="next-posts">' . esc_html( get_next_posts_link( '&laquo; Older Entries' ) ) . '</div>';
	echo '	<div class="prev-posts">' . esc_html( get_previous_posts_link( 'Newer Entries &raquo;' ) ) . '</div>';
	echo '</div>';
}

// Include theme options.
require_once( get_template_directory() . '/inc/options.php' );

// Widgets and Sidebars.
require_once( get_template_directory() . '/inc/widgets-sidebars.php' );

// Custom post types & Taxonomies.
require_once( get_template_directory() . '/inc/custom-post-types.php' );
require_once( get_template_directory() . '/inc/custom-taxonomies.php' );

// Filters and functions to manipulate content.
require_once( get_template_directory() . '/inc/filters.php' );

// Custom shortcodes.
require_once( get_template_directory() . '/inc/shortcodes.php' );

if( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
}
