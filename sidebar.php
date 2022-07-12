<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package superultra
 */
global $superultra_settings,$superultra_array_of_default_settings;
$superultra_settings = wp_parse_args(  get_option( 'superultra_theme_settings', array() ),  superultra_get_option_defaults() );
$superultra_singlepost_design_layout = $superultra_settings['superultra_singlepost_design_layout'];
if( $superultra_singlepost_design_layout == 'on' ){
if ( ! is_active_sidebar( 'superultra_right_sidebar ' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'superultra_right_sidebar' ); ?>
</aside><!-- #secondary -->
</div>
<?php } 
else
{
	?>
	<?php if(!is_single()): ?>
	<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'superultra_right_sidebar' ); ?>
	</aside><!-- #secondary -->
	</div>
	<?php
endif;
}

?>

