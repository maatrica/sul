<?php
/**
 * SuperUltra Theme Customizer
 *
 * @package superultra
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! class_exists( 'WP_Customize_Section' ) ) {
	return null;
}
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function superultra_customize_register( $wp_customize ) {
	$wp_customize->add_panel( 'superultra_theme_settings', array(
	'priority'       => 10,
	'capability'     => 'edit_theme_options',
	'title'          => __('SuperUltra Theme Options', 'superultra')
	));
	global $superultra_settings, $superultra_array_of_default_settings;
	$superultra_settings = wp_parse_args(  get_option( 'superultra_theme_settings', array() ),  superultra_get_option_defaults());

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/******************** Layout Options ******************************************/
	$wp_customize->add_section('superultra_layout_options', array(
		'title'					=> __('Layout Options', 'superultra'),
		'priority'				=> 10,
		'panel'					=>'superultra_theme_settings'
	));

	$wp_customize->add_setting('superultra_theme_settings[superultra_design_layout]', array(
		'default'				=> 'on',
		'sanitize_callback'	=> 'superultra_sanitize_choices',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control('superultra_theme_settings[superultra_design_layout]', array(
		'label'					=> __('Site Layout','superultra'),
		'section'				=> 'superultra_layout_options',
		'settings'				=> 'superultra_theme_settings[superultra_design_layout]',
		'type'					=> 'radio',
		'checked'				=> 'checked',
		'choices'				=> array(
			'on'					=> __('Rigtsidebar','superultra'),
			'off'					=> __('Rightsidebar List View','superultra'),
		),
	));

	//singlepost layout
	$wp_customize->add_setting('superultra_theme_settings[superultra_singlepost_design_layout]', array(
		'default'				=> 'on',
		'sanitize_callback'	=> 'superultra_sanitize_choices',
		'type' 					=> 'option',
		'capability' 			=> 'manage_options'
	));
	$wp_customize->add_control('superultra_theme_settings[superultra_singlepost_design_layout]', array(
		'label'					=> __('Single Post Layout','superultra'),
		'section'				=> 'superultra_layout_options',
		'settings'				=> 'superultra_theme_settings[superultra_singlepost_design_layout]',
		'type'					=> 'radio',
		'checked'				=> 'checked',
		'choices'				=> array(
			'on'					=> __('Rigtsidebar','superultra'),
			'off'					=> __('Fullwidth Centered','superultra'),
		),
	));
	
	
	$wp_customize->add_setting('superultra_theme_settings[superultra_hide_search]', array(
		'default'					=>0,
		'sanitize_callback'		=>'superultra_sanitize_integer',
		'type' 						=> 'option',
		'capability' 				=> 'manage_options'
	));
	$wp_customize->add_control( 'superultra_theme_settings[superultra_hide_search]', array(
		'priority'					=>70,
		'label'						=> __('Hide Search Icon', 'superultra'),
		'section'					=> 'superultra_layout_options',
		'settings'					=> 'superultra_theme_settings[superultra_hide_search]',
		'type'						=> 'checkbox',
	));
	

}
/******************** Sanitize the values ******************************************/
function superultra_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}
function superultra_sanitize_integer( $input) {
    return absint($input);
}

add_action( 'customize_register', 'superultra_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function superultra_customize_preview_js() {
	wp_enqueue_script( 'superultra_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'superultra_customize_preview_js' );

