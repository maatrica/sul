<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package superultra
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php 
    global $superultra_settings,$superultra_array_of_default_settings;
    $superultra_settings = wp_parse_args(  get_option( 'superultra_theme_settings', array() ),  superultra_get_option_defaults() ); ?>
	<div id="page" class="site">
		<header class="site-header">
			<div class="container">
				<div class="menu-toggle">
					<span class="toggle-bar"></span>
					<span class="toggle-bar"></span>
					<span class="toggle-bar"></span>
				</div>
				<div class="site-branding logo-text">
					<div class="site-logo">
						<?php the_custom_logo(); ?>
					</div>
					<div class="site-text-wrap">
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
						</h1>
						<?php
						$superultra_description = get_bloginfo( 'description', 'display' );
						if ( $superultra_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $superultra_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>
				</div> <!-- .site-branding -->
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<div class="menu-wrap">
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle">
							<span class="toggle-bar"></span>
							<span class="toggle-bar"></span>
							<span class="toggle-bar"></span>
						</button>
					
						<?php  
							wp_nav_menu(array(  
										  'theme_location' => 'primary',
										  'items_wrap'     => '<ul class="uk-nav-default uk-nav-parent-icon" uk-nav>%3$s</ul>',
										)); 
						?>
					</nav>
					<?php endif; ?>
					<?php if($superultra_settings['superultra_hide_search']==0){?>
					<div class="header-search">
						<span class="search-toggle">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><defs><style>.a{fill:none;}</style></defs><g transform="translate(83 -7842)"><rect class="a" width="18" height="18" transform="translate(-83 7842)"/><path d="M18,16.415l-3.736-3.736a7.751,7.751,0,0,0,1.585-4.755A7.876,7.876,0,0,0,7.925,0,7.876,7.876,0,0,0,0,7.925a7.876,7.876,0,0,0,7.925,7.925,7.751,7.751,0,0,0,4.755-1.585L16.415,18ZM2.264,7.925a5.605,5.605,0,0,1,5.66-5.66,5.605,5.605,0,0,1,5.66,5.66,5.605,5.605,0,0,1-5.66,5.66A5.605,5.605,0,0,1,2.264,7.925Z" transform="translate(-83 7842)"/></g></svg>
						</span>
						<div class="header-search-form">
							<div class="container">
								<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<label>
										<span class="screen-reader-text">Search for:</span>
										<input class="search-field" placeholder="Search anything and hit enter" value="" name="s" type="search">
									</label>
									<input class="search-submit" value="Search" type="submit">
								</form>
								<span class="close"></span>
							</div>
						</div>
					</div>
				<?php } ?>
				</div>
			</div>
		</header> <!-- .site-header -->
		<?php
			if(is_front_page() || is_home()) :
			if( is_active_sidebar( 'superultra_template' ) ) : ?>
					<?php dynamic_sidebar( 'superultra_template' ); ?>
				<?php 
			endif;
			endif;
		?> 
<div id="content" class="site-content">	
	
		