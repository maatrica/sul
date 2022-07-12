<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package superultra
 */

get_header();
?>

<?php $thumb = get_the_post_thumbnail_url(); ?>
<header class="page-header" style="background-image: url('<?php echo $thumb;?>');">
	<div class="container">
		<h1 class="page-title"><?php the_title();?></h1>
	</div>
</header>

<div class="container">
	<div id="primary" class="content-area sticky-meta">
		<main id="main" class="site-main">
			<div class="entry-meta">
							
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>
		
<?php
get_sidebar();
get_footer();
