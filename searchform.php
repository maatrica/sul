<?php
/**
 * The template for displaying search form of the theme
 *
 *
 * @package superultra
 */
?>
	<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label>
		<input class="search-field" placeholder="<?php esc_attr_e( 'Search...', 'superultra' ); ?>" value="" name="s" type="search">
		</label>
		<input class="search-submit" value="Search" type="submit">
	</form>