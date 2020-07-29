<?php

/* STYLE AND SCRIPTS */
function wlcstarter_scripts() {

	wp_enqueue_style( 'wlc-style', get_stylesheet_uri() );
	wp_enqueue_style( 'wlc-bootstrap', get_template_directory_uri() . '/build/css/bootstrap.min.css', array() );
	wp_enqueue_style( 'wlc-css', get_template_directory_uri() . '/build/css/global.css', array() );

	// If you use sprite SVG load this
	// wp_enqueue_style( 'wlc-sprite', get_template_directory_uri() . '/build/css/sprite.css', array() );
	//

	wp_enqueue_script( 'wlc-app', get_template_directory_uri() . '/build/js/app.js', array( 'jquery' ), null, true );

		$theme_uri = array(
			'theme' => get_template_directory_uri(),
		);

		wp_localize_script( 'app', 'object_theme', $theme_uri );
}
add_action( 'wp_enqueue_scripts', 'wlcstarter_scripts' );

/* LOGO */
function wlc_theme_setup() {

	add_theme_support( 'custom-logo', array(
		'height'     => '80',
		'width'      => '150',
		'flex-width' => true,
	) );
}
add_action( 'after_setup_theme', 'wlc_theme_setup' );

/* MENU BOOTSTRAP 4 */
require_once get_template_directory() . '/bootstrap-navwalker/class-wp-bootstrap-navwalker.php';

register_nav_menus(
	array(
		'primary' => __( 'Primary Menu', 'wlcstarter' ),
	)
);

function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

/* ACF */
if ( function_exists( 'acf_add_options_page' ) ) {

	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title' 	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'redirect'		=> false,
	));
}

/* PHONE TO LINK */
function phone_to_link( $string ) {
	$string = str_replace( '+', '00', $string );
	$string = str_replace( '-', '', $string );
	$string = str_replace( ' ', '', $string );
	$string = str_replace( '.', '', $string );
	$string = str_replace( '(0)', '', $string );

	return 'tel:'.$string;
}

add_theme_support( 'automatic-feed-links' );

/* NODE MODULES FOLDER EXPORT EXCLUDE */
/* Please edit theme (wlcstarter) name to correct name*/
add_filter(
	'ai1wm_exclude_content_from_export',
	function ( $exclude_filters ) {
		$exclude_filters[] = 'themes/wlcstarter/node_modules';

		return $exclude_filters;
	}
);
