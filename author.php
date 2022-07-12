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
						<div class="author-img">
							<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
						</div>
						<div class="author-content-wrap">
							<h1 class="page-title">
								<span class="sub-title">All Posts By</span>
							<?php the_author(); ?>
							</h1>
							<div class="author-desc">
								<?php the_author_meta('description'); ?>
							</div>
							<!-- <ul class="social-list">
								<li><a data-title="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a data-title="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a data-title="google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
								<li><a data-title="linkedin" href="#"><i class="fab fa-linkedin-in"></i></a></li>
								<li><a data-title="pinterest" href="#"><i class="fab fa-pinterest"></i></a></li>
							</ul> -->
						</div>    
					</header>
					<div class="showing-result">
						Showing: 1 - 10 of 391 RESULTS
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
