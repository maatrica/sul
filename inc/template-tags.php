<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package superultra
 */

if ( ! function_exists( 'superultra_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function superultra_posted_on() {
		
	$time_string = get_the_time( get_option( 'date_format' ) );
		$posted_on = sprintf(
		'<a href="' . esc_url( get_permalink() ) . '" title="'. the_title_attribute( 'echo=0' ).'">' . $time_string . '</a>'
	);
		echo $posted_on ; // WPCS: XSS OK.
	
	}
endif;

if ( ! function_exists( 'superultra_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function superultra_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'superultra' ),
			'<span class="author"><a class="url fn" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;


if ( ! function_exists( 'superultra_posted_by_single_side' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function superultra_posted_by_single_side() {
		$byline_side = sprintf(
			/* translators: %s: post author. */
			'<span class="meta-title">'.
			esc_html_x( 'Written by %s', 'post author', 'superultra' ),
			'</span><span class="author"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" class="url fn" itemprop="name">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline" itemprop="author"> ' . $byline_side . '</span>'; // WPCS: XSS OK.

	}
endif;




if ( ! function_exists( 'superultra_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function superultra_entry_footer() {
		

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'superultra' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'superultra' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'superultra_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function superultra_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;
