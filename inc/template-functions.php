<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package superultra
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function superultra_get_option_defaults() {
	global $superultra_array_of_default_settings;
	$superultra_array_of_default_settings = array(
		'superultra_design_layout' =>'on',
		'superultra_singlepost_design_layout' => 'on',
		'superultra_hide_search' => 0
	);
	return apply_filters( 'superultra_get_option_defaults', $superultra_array_of_default_settings );

	}
function superultra_body_classes( $classes ) {
	global $superultra_site_layout, $superultra_content_layout, $superultra_settings,$superultra_array_of_default_settings;
	$superultra_settings = wp_parse_args(  get_option( 'superultra_theme_settings', array() ),  superultra_get_option_defaults() );
	global $post;
	$superultra_site_layout = $superultra_settings['superultra_design_layout'];
	$superultra_singlepost_design_layout = $superultra_settings['superultra_singlepost_design_layout'];
	
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	
	$superultra_layout = 'rightsidebar';

	if ( is_404() ) {
		$classes[] = 'full-width';
	}

	if(is_home() || is_archive() ||is_search() || is_search() || (is_page()) ){
		if ($superultra_site_layout =='off') {

		$classes[] = 'rightsidebar list-view';
		}
		if ($superultra_site_layout =='on') {

			$classes[] = 'rightsidebar';
		}
	}

	if ( is_single() ) {
		if ($superultra_singlepost_design_layout =='off') {
		$classes[] = 'fullwidth-centered';
		}
		else{
			$classes[] = 'rightsidebar';
		}

	}

	return $classes;
}
add_filter( 'body_class', 'superultra_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function superultra_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'superultra_pingback_header' );
