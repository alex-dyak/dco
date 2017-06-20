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
		add_image_size( 'mobile_img', 280, 280, TRUE );
		add_image_size( 'full_img_mobile_small', 480, '', TRUE );
		add_image_size( 'full_img_mobile_large', 770, '', TRUE );
		add_image_size( 'full_img_tablet', 992, '', TRUE );
		add_image_size( 'full_img_desktop_small', 1200, '', TRUE );
		add_image_size( 'full_img_desktop_medium', 1620, '', TRUE );
		add_image_size( 'full_img_desktop_large', 1920, '', TRUE );
		add_image_size( 'module_slider', 470, 290, TRUE );

		//need add the image size to array $image_sizes in the function dco_add_custom_image_srcset
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
    wp_enqueue_script( 'dco-vendor', get_template_directory_uri() . '/js/vendor.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'dco-application', get_template_directory_uri() . '/js/app.min.js', array( 'jquery', 'dco-vendor' ), null, true );

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

function dco_locate_template ( $template_name, $args = array() ) {
	$template_dir = dirname( __FILE__ ) .'/template-parts/';
	$located = '';
	$file = $template_dir . $template_name . '.php';
	if ( file_exists( $file) ) {
		$located = $file;
	}

	if( $located ){
		if( is_array($args) ) extract($args);
		include($located);
	}
	return $located;
}

// GET Clients Category
function clients_get_category( $post_ID ) {
	$term_list = wp_get_post_terms($post_ID, 'clients-category', array("fields" => "names"));

	return $term_list;
}

// GET Business Directions
function clients_get_business_directions( $post_ID ) {
	$term_list = wp_get_post_terms($post_ID, 'business-direction', array("fields" => "names"));

	return $term_list;
}

// Clients ADD NEW COLUMNS to admin
add_filter('manage_posts_columns', 'clients_columns_head');
function clients_columns_head( $defaults ) {
	$defaults['business_directions'] = 'Business Directions';
	$defaults['category']            = 'Category';

	return $defaults;
}

// Clients DISPLAY NEW COLUMNS to admin
add_action('manage_posts_custom_column', 'clients_columns_content', 10, 2);
function clients_columns_content( $column_name, $post_ID ) {
	if ( $column_name == 'category' ) {
		$clients_categories = clients_get_category( $post_ID );
		if ( $clients_categories ) {
			$total = count( $clients_categories );
			$counter = 0;
			foreach ( $clients_categories as $category ) {
				$counter++;
				if ( $counter == $total ) {
					echo $category;
				}
				else {
					echo $category . ', ';
				}
			}
		}
	}

	if ( $column_name == 'business_directions' ) {
		$business_directions = clients_get_business_directions( $post_ID );
		if ( $business_directions ) {
			$total = count( $business_directions );
			$counter = 0;
			foreach ( $business_directions as $direction ) {
				$counter++;
				if ( $counter == $total ) {
					echo $direction;
				}
				else {
					echo $direction . ', ';
				}
			}
		}
	}
}

// Make Business Direction column sortable.
add_filter( 'manage_edit-client_sortable_columns', 'set_custom_client_sortable_columns' );
function set_custom_client_sortable_columns( $columns ) {
	$columns['business_directions'] = 'business_directions';

	return $columns;
}

/**
 * filter function to force wordpress to add our custom srcset values
 * @param array  $sources {
 *     One or more arrays of source data to include in the 'srcset'.
 *
 *     @type type array $width {
 *          @type type string $url        The URL of an image source.
 *          @type type string $descriptor The descriptor type used in the image candidate string,
 *                                        either 'w' or 'x'.
 *          @type type int    $value      The source width, if paired with a 'w' descriptor or a
 *                                        pixel density value if paired with an 'x' descriptor.
 *     }
 * }
 * @param array  $size_array    Array of width and height values in pixels (in that order).
 * @param string $image_src     The 'src' of the image.
 * @param array  $image_meta    The image meta data as returned by 'wp_get_attachment_metadata()'.
 * @param int    $attachment_id Image attachment ID.
 */
add_filter( 'wp_calculate_image_srcset', 'dco_add_custom_image_srcset', 10, 5 );
function dco_add_custom_image_srcset( $sources, $size_array, $image_src, $image_meta, $attachment_id ){

	$image_sizes = array(
		'mobile_img',
		'full_img_mobile_small',
		'full_img_mobile_large',
		'full_img_tablet',
		'full_img_desktop_small',
		'full_img_desktop_medium',
		'full_img_desktop_large',
		'module_slider',
	);

	// image base name
	$image_basename = wp_basename( $image_meta['file'] );
	// upload directory info array
	$upload_dir_info_arr = wp_get_upload_dir();
	// base url of upload directory
	$baseurl = $upload_dir_info_arr['baseurl'];

	// Uploads are (or have been) in year/month sub-directories.
	if ( $image_basename !== $image_meta['file'] ) {
		$dirname = dirname( $image_meta['file'] );

		if ( $dirname !== '.' ) {
			$image_baseurl = trailingslashit( $baseurl ) . $dirname;
		}
	}

	$image_baseurl = trailingslashit( $image_baseurl );
	// check whether our custom image size exists in image meta
	foreach ( $image_sizes as $image_size ) {
		if( array_key_exists( $image_size, $image_meta['sizes'] ) ){
			// add source value to create srcset
			$sources[ $image_meta['sizes'][$image_size]['width'] ] = array(
				'url'        => $image_baseurl .  $image_meta['sizes'][$image_size]['file'],
				'descriptor' => 'w',
				'value'      => $image_meta['sizes'][$image_size]['width'],
			);
		}
	}

	//return sources with new srcset value
	return $sources;
}


