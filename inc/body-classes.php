<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package superultra
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
/****************************************************************************************/
add_filter('body_class', 'superultra_body_class');
/**
 * Filter the body_class
 *
 * Throwing different body class for the different layouts in the body tag
 */
function superultra_body_class($classes) {
	global $superultra_site_layout, $superultra_content_layout, $superultra_settings,$superultra_array_of_default_settings;
	$superultra_settings = wp_parse_args(  get_option( 'superultra_theme_settings', array() ),  superultra_get_option_defaults() );
	global $post;

	if ($post) {
		$superultra_layout = get_post_meta($post->ID, 'superultra_sidebarlayout', true);
	}
	$superultra_site_layout = $superultra_settings['superultra_design_layout'];
	//$superultra_blog_layout = $superultra_settings['superultra_blog_layout'];
	//$superultra_content_layout = $superultra_settings['superultra_content_layout'];
	$superultra_frontpage_id = get_option('page_on_front'); // for front page
	//$superultra_banner = get_post_meta( $superultra_frontpage_id, 'superultra_sidebarlayout', true );
	$superultra_page_id = ( 'page' == get_option( 'show_on_front' ) ? get_option( 'page_for_posts' ) : get_the_ID() );
	$superultra_home_blog = get_post_meta( $superultra_page_id, 'superultra_sidebarlayout', true );
	if (empty($superultra_layout) || is_archive() || is_search() || is_home()) {
		$superultra_layout = 'default';
	}
	if ('default' == $superultra_layout) {
		$superultra_themeoption_layout = $superultra_content_layout;
		if ('left' == $superultra_themeoption_layout) {
			$classes[] = 'left-sidebar-layout';
		}
		elseif ('right' == $superultra_themeoption_layout) {
			$classes[] = '';
		}
		elseif ('fullwidth' == $superultra_themeoption_layout) {
			$classes[] = 'full-width-layout';
		}
		elseif ('nosidebar' == $superultra_themeoption_layout) {
			$classes[] = 'no-sidebar-layout';
		}
	}elseif ('left-sidebar' == $superultra_layout) {

	$classes[] = 'left-sidebar-layout';
	}
	elseif ('right-sidebar' == $superultra_layout) {
		$classes[] = '';//css blank
	}
	elseif ('no-sidebar-full-width' == $superultra_layout) {
		$classes[] = 'full-width-layout';
	}
	elseif ('no-sidebar' == $superultra_layout) {
		$classes[] = 'no-sidebar-layout';//css for no-sidebar-layout from <body >
	}
	if ($superultra_site_layout =='off') {

		$classes[] = 'rightsidebar list-view';
	}

	if (is_page_template('page-templates/page-template-front.php')) {
		$classes[] = 'business-layout';
	}

	// if ($superultra_blog_layout =='off') {
	// 	if(!is_single()){
	// 		$classes[] = 'blog-medium';
	// 	}
	// }

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	if(has_header_video() && has_header_image() ){
		if ( is_front_page() && is_home() ) {
			$classes[] = '';
		}elseif(is_front_page()){
			$classes[] = '';
		}else{
			$classes[] = 'header-image';
		}
	}elseif(has_header_image()){
		$classes[] = 'header-image';
	}
	return $classes;
}
/****************************************************************************************/
add_action( 'superultra_main_sidebar_content', 'superultra_sidebar_content');
/**
 * Function to display the content for the single post, single page, archive page, index page etc.
 */
function superultra_sidebar_content() {
	global $post;
	global $superultra_site_layout, $superultra_content_layout, $superultra_settings,$superultra_array_of_default_settings;
	$superultra_settings = wp_parse_args(  get_option( 'superultra_theme_settings', array() ),  superultra_get_option_defaults() );

	if( $post ) {
		$superultra_layout = get_post_meta( $post->ID, 'superultra_sidebarlayout', true );
		$superultra_frontpage_id = get_option('page_on_front'); // for front page
		$superultra_content_layout = $superultra_settings['superultra_content_layout'];
		$superultra_banner = get_post_meta( $superultra_frontpage_id, 'superultra_sidebarlayout', true );
		$superultra_page_id = ( 'page' == get_option( 'show_on_front' ) ? get_option( 'page_for_posts' ) : get_the_ID() );
		$superultra_home_blog = get_post_meta( $superultra_page_id, 'superultra_sidebarlayout', true ); 
	}
	if( empty( $superultra_layout ) || is_archive() || is_search() || is_home() ) {
		$superultra_layout = 'default';
	}
	if(is_front_page() && $superultra_banner):
		if( 'default' == $superultra_banner ) {//checked from the themeoptions.
		$superultra_themeoption_layout = $superultra_content_layout;
			if( 'left' == $superultra_themeoption_layout ) { 
			get_sidebar('left');//used sidebar-left.php
			}
			elseif( 'right' == $superultra_themeoption_layout ) { 
			get_sidebar();//used sidebar.php
			}
			else {
			return; // doesnot display sidebar content
			}
		}
		elseif( 'left-sidebar' == $superultra_banner ) { //checked from the particular page / post.
			get_sidebar( 'left' );//used sidebar-left.php
		}
		elseif( 'right-sidebar' == $superultra_banner ) {
			get_sidebar();//used sidebar.php
		}
		else { 
			return; // doesnot display sidebar content
		}
		elseif(is_front_page()):
		if( 'default' == $superultra_layout ) {//checked from the themeoptions.
		$superultra_themeoption_layout = $superultra_content_layout;
			if( 'left' == $superultra_themeoption_layout ) { 
			get_sidebar( 'left' );//used sidebar-left.php
			}
			elseif( 'right' == $superultra_themeoption_layout ) { 
			get_sidebar();//used sidebar.php
			}
			else {
			return; // doesnot display sidebar content
			}
		}
		elseif( 'left-sidebar' == $superultra_layout ) { //checked from the particular page / post.
			get_sidebar( 'left' );//used sidebar-left.php
		}
		elseif( 'right-sidebar' == $superultra_layout ) {
			get_sidebar();//used sidebar.php
		}
		else { 
			return; // doesnot display sidebar content
		}
	elseif(is_home()):
		if( 'default' == $superultra_layout ) {//checked from the themeoptions. 
		$superultra_themeoption_layout = $superultra_content_layout;
			if( 'left' == $superultra_themeoption_layout ) { 
			get_sidebar( 'left' );//used sidebar-left.php
			}
			elseif( 'right' == $superultra_themeoption_layout ) {
			get_sidebar();//used sidebar.php
			}
			else {
			return; // doesnot display sidebar content
			}
		}
		elseif( 'left-sidebar' == $superultra_home_blog ) { //checked from the particular page / post.
			get_sidebar( 'left','sidebar' );//used sidebar-left.php
		}
		elseif( 'right-sidebar' == $superultra_home_blog ) {
			get_sidebar();//used sidebar.php
		}
		else { 
			return; // doesnot display sidebar content
		}
	else:
		if( 'default' == $superultra_layout ) { //checked from the themeoptions.
		$superultra_themeoption_layout = $superultra_content_layout;
			if( 'left' == $superultra_themeoption_layout ) {

			get_sidebar( 'left','sidebar' );//used sidebar-left.php
			}
			elseif( 'right' == $superultra_themeoption_layout ) {
			get_sidebar();//used sidebar.php
			}
			else {
			return; // doesnot display sidebar content
			}
		}
		elseif( 'left-sidebar' == $superultra_layout ) {//checked from the particular page / post.
			get_sidebar( 'left','sidebar' );//used sidebar-left.php
		}
		elseif( 'right-sidebar' == $superultra_layout ) {
			get_sidebar();//used sidebar.php
		}
		else {
			return; // doesnot display sidebar content
		}
	endif;
}

