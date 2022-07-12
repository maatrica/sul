<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package superultra
 */

?>


		</div> <!-- .site-content -->

		<section class="newsletter-section">
			<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/newsletter-section.jpg" alt="">
		</section> <!-- .newsletter-section -->

		<footer class="site-footer">
			<div class="top-footer">
				<div class="container">
					<div class="col">
						<section class="widget widget_text">
							<div class="textwidget">
								<?php
		                        if( is_active_sidebar( ' superultra_footer_column1' ) ) : ?>
		                                <?php dynamic_sidebar( ' superultra_footer_column1' ); ?>
		                            <?php 
		                        endif;
	                        ?>
							
							</div>
						</section>
					</div>
					<div class="col">
						<section class="widget widget_recent_entries">
							<?php
		                        if( is_active_sidebar( ' superultra_footer_column2' ) ) : ?>
		                                <?php dynamic_sidebar( ' superultra_footer_column2' ); ?>
		                            <?php 
		                        endif;
	                        ?>		
						</section>
					</div>
					<div class="col">
						<section class="widget widget_categories">
							<?php
		                        if( is_active_sidebar( ' superultra_footer_column3' ) ) : ?>
		                                <?php dynamic_sidebar( ' superultra_footer_column3' ); ?>
		                            <?php 
		                        endif;
	                        ?>
						</section>
					</div>
				</div>
			</div> <!-- .top-footer -->
			<div class="bottom-footer">
				<div class="container">
					<div class="copyright">
						<span>&copy; 2018
							<a href="<?php echo esc_url( __( '#', 'superultra' ) ); ?>">
								<?php
								/* translators: %s: CMS name, i.e. WordPress. */
								printf( esc_html__( ' Super Ultra Light %s', 'superultra' ), '</a> - All Rights Reserved.' );
								?>
							
						</span>
							<a href="<?php echo esc_url( __( '#', 'superultra' ) ); ?>"  target="_blank">
							<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( esc_html__( '%1$s by %2$s.', 'superultra' ), ' Super Ultra Light </a>', 'Rara Themes. Powered by<a href="#" target="_blank"> WordPress.</a><a class="privacy-policy-link" href="#">Privacy Policy</a>' );
							?>
								        
					</div>
					<div class="footer-social">
						<?php  
							wp_nav_menu( array(
							'theme_location' => 'social',
							 'items_wrap'     => '<ul class="social-list" uk-nav>%3$s</ul>',
						) );
						
						?>
					</div>
				</div>
			</div>
		</footer> <!-- .site-footer -->
	</div> <!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
