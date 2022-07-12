<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package superultra
 */

get_header();
?>
<div class="container">
	<div id="primary" class="content-area">
		<header class="page-header">
		<h1 class="page-title">
			<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for:', 'superultra' ), '<span>' . get_search_query() . '</span>' );
			?>
		</h1>
		<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label>
				<span class="screen-reader-text">Search for:</span>
				<input class="search-field" placeholder="Search anything and hit enter" value="<?php echo esc_html( get_search_query( false ) );  ?>" name="s" type="search">
			</label>
				<input class="search-submit" value="Search" type="submit">
		</form>
		
		</header>
		
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->

		<?php superultra_the_posts_navigation(); ?>
	</div>

<?php
get_sidebar();
get_footer();
