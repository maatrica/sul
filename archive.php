<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package superultra
 */

get_header();
?>

<div class="container">
	<div id="primary" class="content-area">
		<header class="page-header">
			<h1 class="page-title"><span class="sub-title"><?php
    			printf( __( 'Category %s', 'superultra' ), '</span>' . single_cat_title( '', false ) . '</span>' );?>
    		</h1>
    		<span class="total-result">
	    		<?php
	            $published_posts = wp_count_posts()->publish; 
	            echo esc_attr($published_posts).esc_attr(' RESULTS' , 'superultra'); 
				?>
			</span>
		</header>
		<div class="showing-result">
			<!-- Showing: 1 - 10 of 391 RESULTS -->
		</div>
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->

		<?php superultra_the_posts_navigation(); ?>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
