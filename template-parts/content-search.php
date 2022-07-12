<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package superultra
 */

?>
	
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
							</span>
						</div>
					<?php }
				endif;
			?>
			
			<?php
				the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" >', '</a></h2>' );
			
			?>
			
		</header>
		<div class="entry-content">
			<?php 	echo wp_trim_words( get_the_content(), 29, '...' ); ?>
		</div>
		<footer class="entry-footer">
			<a href="<?php the_permalink(); ?>" class="btn-readmore"><?php esc_html_e('Continue Reading','superultra');?>
			</a>
		</footer>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
