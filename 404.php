<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package superultra
 */

get_header();
?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Uh-Oh...', 'superultra' ); ?></h1>
					<div class="page-desc">
						<?php esc_html_e( 'The page you are looking for may have been moved, deleted, or possibly never existed.', 'superultra' ); ?>
					</div>
				</header>
				<div class="page-content">
					<div class="error-num"><?php esc_html_e( '404', 'superultra' ); ?></div>
					<a class="bttn" href="index.html"><?php esc_html_e( 'Take me to the home page', 'superultra' ); ?></a>
					<?php get_search_form();
					?>			
				</div><!-- .page-content -->
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

					<?php
					// custom recent posts widgets in 404 Widget Sidebar
					if( is_active_sidebar( 'superultra_404' ) ) : ?>
					<?php dynamic_sidebar( 'superultra_404' );
					endif;
					?>		
		
		</div>
<?php
get_footer();
