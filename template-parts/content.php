<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package superultra
 */

?>

<?php if (is_single()) : ?>
	<div class="sticky-inner">
		<div class="sidebar__inner">
	<?php superultra_posted_by_single_side();?>
			<span class="posted-on" itemprop="datePublished">
				<span class="meta-title">Published on</span>
		<?php superultra_posted_on();?>
			</span>
			<span class="category">
				<span class="meta-title">Category</span>
				<?php the_category(', '); ?>
			</span>
			<div class="sticky-social">
				<div class="post-favourite">
					<span class="fav-count">525</span>
					<a href="#" class="fav-icon"><i class="fas fa-heart"></i></a>
				</div>
					<ul class="social-list">
						<li><a data-title="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li><a data-title="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a data-title="google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
						<li><a data-title="linkedin" href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li><a data-title="pinterest" href="#"><i class="fab fa-pinterest"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>

			</main>
				<div class="author-profile">
					<div class="author-img">
						<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
					</div>
					<div class="author-content-wrap">
						<h1 class="page-title">
						<?php the_author(); ?>
						</h1>
					<div class="author-desc">
						<?php the_author_meta('description'); ?>
					</div>
					<ul class="social-list">
						<li><a data-title="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li><a data-title="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a data-title="google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
						<li><a data-title="linkedin" href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li><a data-title="pinterest" href="#"><i class="fab fa-pinterest"></i></a></li>
					</ul>
					</div>
				</div>

				
					<?php
					// custom recent posts widgets in 404 Widget Sidebar
					if( is_active_sidebar( 'superultra_404' ) ) : ?>
					<?php dynamic_sidebar( 'superultra_404' );
					endif;
					?>	
					<?php 
					//If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					?>
	</div><!-- #primary -->
	
	
<?php else: ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<figure class="post-thumbnail">
		
			<a href="<?php the_permalink();?>">
			
				<?php if(has_post_thumbnail() ){ 
						the_post_thumbnail('',[ 'alt' => esc_html ( get_the_title() ) ]);
				} ?>
			
			</a>
			
		</figure>
		<div class="post-content-wrap">
			<header class="entry-header">
			<?php

				if ( 'post' === get_post_type() ) :
					if(!has_post_format( 'link' )){ // for format link ?>
						<div class="entry-meta">
							<span class="posted-on" itemprop="datePublished">
							<?php superultra_posted_on(); ?>
							</span>
							<span class="category">
							<?php the_category(', '); ?>
							<?php $taglist = get_the_tag_list( '', __( ', ', 'superultra' ) );
							if(!empty($taglist)):
							echo $taglist;
							endif;
							?>
							</span>
						</div>
					<?php }
				endif;
			?>
			<?php
				the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" >', '</a></h2><!-- .entry-title -->' );
			
			?>
				</header>
			
				<div class="entry-content">
					<?php 
						echo wp_trim_words( get_the_content(), 29, '...' );
					?>
				</div>
			
				<footer class="entry-footer">
					<a href="<?php the_permalink(); ?>" class="btn-readmore"><?php esc_html_e('Continue Reading','superultra');?>
					</a>
				</footer>
				
			
		</div>
	</article>

<?php endif; ?>