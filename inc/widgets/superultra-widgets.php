<?php
/**
 /**
 * Register widget area and Sidebar.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @package superultra
 */
/****************************************************************************************/

add_action('widgets_init', 'superultra_widgets_init');
/**
 * Function to register the widget areas(sidebar) and widgets.
 */
function superultra_widgets_init()
{


	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'superultra' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'superultra' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	// Registering main right sidebar
	register_sidebar(array(
		'name' => __('Right Sidebar', 'superultra') ,
		'id' => 'superultra_right_sidebar',
		'description' => __('Shows widgets at Left side.', 'superultra') ,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	// Registering main left sidebar
	register_sidebar(array(
		'name' => __('Left Sidebar', 'superultra') ,
		'id' => 'superultra_left_sidebar',
		'description' => __('Shows widgets at Right side.', 'superultra') ,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	// Registering Superultra Front Page Content Section
	register_sidebar(array(
		'name' => __('Superultra: Front Page Content Section', 'superultra') ,
		'id' => 'superultra_template',
		'description' => __('Shows widgets on superultra: Front Page Template .', 'superultra') ,
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	// Registering footer sidebar 1
	register_sidebar(array(
		'name' => __('Footer - Column1', 'superultra') ,
		'id' => 'superultra_footer_column1',
		'description' => __('Shows widgets at footer Column 1.', 'superultra') ,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	// Registering footer sidebar 2
	register_sidebar(array(
		'name' => __('Footer - Column2', 'superultra') ,
		'id' => 'superultra_footer_column2',
		'description' => __('Shows widgets at footer Column 2.', 'superultra') ,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	// Registering footer sidebar 3
	register_sidebar(array(
		'name' => __('Footer - Column3', 'superultra') ,
		'id' => 'superultra_footer_column3',
		'description' => __('Shows widgets at footer Column 3.', 'superultra') ,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	// Registering 404 widget
	register_sidebar( array(
		'name'          => esc_html__( '404', 'superultra' ),
		'id'            => 'superultra_404',
		'description'   => esc_html__( 'Show Recent post in 404', 'superultra' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


// Registering widgets
	register_widget("superultra_banner_widget");
	register_widget("superultra_intro_widget");
	register_widget("superultra_client_widget");
	register_widget("superultra_services_widget");
	register_widget("superultra_recent_posts_widget");
}

/****************************************************************************************/
/**
 * Widget for front page layout that shows selected page content,title and featured image.
 * Construct the widget.
 * i.e. Name, description and control options.
 */
/****************************************************************************************/
/**
 Banner Widget
 */
class superultra_banner_widget extends WP_Widget

{
	function __construct()
	{
		$widget_ops = array(
			'description' => __('Display Banner', 'superultra')
		);
		$control_ops = array(
			'width' => 200,
			'height' => 250
		);
		parent::__construct(false, $name = __('Superultra:: Banner', 'superultra') , $widget_ops, $control_ops);
	}
	function form( $instance ) {		
		$instance = wp_parse_args( (array) $instance, array( 'superultra_banner_img' => '','image_alt' => '', 'banner_caption_header' => '','banner_caption_paragraph' => '', 'caption_align' => '') );
		$captionhead = esc_textarea($instance['banner_caption_header']);
		$captionpara = esc_textarea($instance['banner_caption_paragraph']);
		$banner_img = strip_tags($instance['superultra_banner_img']);
		$image_alt = strip_tags($instance['image_alt']);
		$caption_align = ( isset( $instance['caption_align'] ) && is_numeric( $instance['caption_align'] ) ) ? (int) $instance['caption_align'] : 1;
		?>
			
			<p class="description">
				<?php _e( 'Note: Recommended size for the image is 1350px (width) and 575px (height). If you want more image adding fields then first enter the number and click on Save, this will allow you more image adding fields', 'superultra' ); ?>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('superultra_banner_img'); ?>">
					<?php _e('Banner Image:', 'superultra'); ?>
				</label>
				<br>
				<input type="text" class="upload1" id="<?php echo $this->get_field_id( 'superultra_banner_img' ); ?>" name="<?php echo $this->get_field_name('superultra_banner_img'); ?>" value="<?php echo $banner_img; ?>"/>

	         	<input type="button" class="button  custom_media_button"name="<?php echo $this->get_field_name('superultra_banner_img'); ?>" id="custom_media_button_services" value="Upload Image" onclick="mediaupload.uploader( '<?php echo $this->get_field_id( 'superultra_banner_img' ); ?>' ); return false;"/>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('image_alt'); ?>">
					<?php _e('Image Alt:', 'superultra'); ?>
				</label>
				<input class="widefat" id="<?php echo $this->get_field_id('image_alt'); ?>" name="<?php echo $this->get_field_name('image_alt'); ?>" type="text" value="<?php echo esc_attr($image_alt); ?>" />
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('banner_caption_header'); ?>">
					<?php _e('Banner Header Caption:', 'superultra'); ?>
				</label>
				<textarea class="widefat" rows="3" id="<?php echo $this->get_field_id('banner_caption_header'); ?>" name="<?php echo $this->get_field_name('banner_caption_header'); ?>"><?php echo esc_html($captionhead);?></textarea>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('banner_caption_paragraph'); ?>">
					<?php _e('Banner Paragraph Caption:', 'superultra'); ?>
				</label>
				<textarea class="widefat" rows="3" id="<?php echo $this->get_field_id('banner_caption_paragraph'); ?>" name="<?php echo $this->get_field_name('banner_caption_paragraph'); ?>"><?php echo esc_html($captionpara);?></textarea>
			</p>

			<p>
				<legend><strong><?php _e('Choose Caption Align:','superultra');?></strong></legend>
				<input type="radio" id="<?php echo ($this->get_field_id( 'caption_align' ) . '-1') ?>" name="<?php echo ($this->get_field_name( 'caption_align' )) ?>" value="1" <?php checked( $caption_align == 1, true) ?>>
				<label for="<?php echo ($this->get_field_id( 'caption_align' ) . '-1' ) ?>"><?php _e('Center', 'superultra') ?></label> &nbsp;&nbsp;
				<input type="radio" id="<?php echo ($this->get_field_id( 'caption_align' ) . '-2') ?>" name="<?php echo ($this->get_field_name( 'caption_align' )) ?>" value="2" <?php checked( $caption_align == 2, true) ?>>
				<label for="<?php echo ($this->get_field_id( 'caption_align' ) . '-2' ) ?>"><?php _e('left', 'superultra') ?></label> &nbsp;&nbsp;
			</p>
			<?php
		}
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['banner_caption_header'] = esc_attr($new_instance['banner_caption_header']);
			$instance['banner_caption_paragraph'] = esc_attr($new_instance['banner_caption_paragraph']);
			$instance['superultra_banner_img'] = esc_attr($new_instance['superultra_banner_img']);
			$instance['image_alt'] = esc_attr($new_instance['image_alt']);
			$instance['caption_align'] = ( isset( $new_instance['caption_align'] ) && $new_instance['caption_align'] > 0 && $new_instance['caption_align'] <= 2 ) ? (int) $new_instance['caption_align'] : 0;
			return $instance;
		}	
		function widget( $args, $instance ) {
			
			$caption_header = empty( $instance['banner_caption_header'] ) ? '' : $instance['banner_caption_header'];
			$caption_paragraph = empty( $instance['banner_caption_paragraph'] ) ? '' : $instance['banner_caption_paragraph'];
			$banner_img = apply_filters('superultra_banner_img', empty($instance['superultra_banner_img']) ? '' : $instance['superultra_banner_img'], $instance, $this->id_base);
			$image_alt = empty( $instance['image_alt'] ) ? '' : $instance['image_alt'];
			$caption_align = ( isset( $instance['caption_align'] ) && is_numeric( $instance['caption_align'] ) ) ? (int) $instance['caption_align'] : 1;

 		?>
 		<?php if(!empty($banner_img)): ?>
    	<div class="site-banner">
    		<div class="banner-item">
    			<img src="<?php echo esc_attr($banner_img);?>" alt="<?php echo esc_attr($image_alt);?>">
    		<?php if( (!empty($caption_header)) || (!empty($caption_paragraph)) ): ?>
				<div class="banner-caption <?php if($caption_align == 2){ echo 'left'; } else{ echo 'center';} ?>">
					<div class="container">
						<h1 class="title">
							<a href="#"><?php echo esc_html($caption_header);?></a>
						</h1>
						<div class="item-desc">
							<?php echo esc_attr($caption_paragraph);?>
							<img src="<?php echo esc_url( get_template_directory_uri() )?>/images/banner-newsletter-form.png" alt="">
						</div>
					</div>
				</div>
			<?php endif;?>
    		</div>
    	</div> <!-- .site-banner -->
    	<?php endif; ?>
		<?php
 	}
}

/*********************************************************************************************************/
/**
Intro Widgets
**/
class superultra_intro_widget extends WP_Widget {
	function __construct()
	{
		$widget_ops = array(
			'description' => __('Display Introduction', 'superultra')
		);
		$control_ops = array(
			'width' => 200,
			'height' => 250
		);
		parent::__construct(false, $name = __('Superultra:: Introduction', 'superultra') , $widget_ops, $control_ops);
	}
	function form( $instance ) {		
		$instance = wp_parse_args((array) $instance, array( 'intro_title'=>'', 'page_id'=>''));
		$intro_title = strip_tags($instance['intro_title']);
		$var = 'page_id';
		$defaults[$var] = '';
		?>
		<p>
		   <label for="<?php echo $this->get_field_id('intro_title'); ?>">
				<?php _e('Intro Title:', 'superultra'); ?>
			</label>
			<input id="<?php echo $this->get_field_id('intro_title'); ?>" name="<?php echo $this->get_field_name('intro_title'); ?>" type="text" value="<?php echo esc_attr($intro_title); ?>" />
		</p>

		<legend><strong><?php _e('Note:','superultra');?></strong><i> <?php _e('Select your page yo want to display','superultra'); ?></i></legend>
			 <br/>
		
		<?php $instance = wp_parse_args((array)$instance); ?>
		<p>
			<label for="<?php echo $this->get_field_id(key($defaults)); ?>">
				<?php _e('Page', 'superultra'); ?>
			:</label>
				<?php wp_dropdown_pages(array(
						'show_option_none' => ' ',
						'name' => $this->get_field_name(key($defaults)) ,
						'selected' => $instance[key($defaults) ]
				)); ?>
		</p>
				
		<?php next($defaults); 
	} 

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['intro_title'] = esc_attr($new_instance['intro_title']);
		$var = 'page_id';
		$instance[$var] = absint($new_instance[$var]);
		return $instance;
	}

	function widget($args, $instance)
	{
		$intro_title = empty( $instance['intro_title'] ) ? '' : $instance['intro_title'];
		$var = 'page_id';
		$page_array = array();
		
			$var = 'page_id';
			$page_id = isset($instance[$var]) ? $instance[$var] : '';
			if( !empty($page_id) ){
					array_push($page_array, $page_id);
			}
			// Push the page id in the array
		
		$get_featured_pages = new WP_Query(array(
			'posts_per_page' => - 1,
			'post_type' => array(
				'page'
			) ,
			'post__in' => $page_array,
			'orderby' => 'post__in'
		));
		?>
		
		<?php while( $get_featured_pages->have_posts() ):$get_featured_pages->the_post(); ?>
			<section class="about-section">
			<div class="container">
				<section class="widget widget_raratheme_featured_page_widget">                
					<div class="widget-featured-holder right">
						<p class="section-subtitle">                        
							<span><?php the_title();?></span>
						</p>                    
						<div class="text-holder">
							<h2 class="widget-title"><?php echo esc_html($intro_title);?></h2>
							<div class="featured_page_content">
								<?php echo wp_trim_words( get_the_content(), 169, '...' ); ?>
								<a href="<?php the_permalink();?>" target="_blank" class="btn-readmore">Know more about me</a>
							</div>
						</div>
						<div class="img-holder">
							<a target="_blank" href="#">
								<?php if(has_post_thumbnail() ){ 
									the_post_thumbnail('',[ 'alt' => esc_html ( $intro_title ) ]);
								} ?>                       
							</a>
						</div>
					</div>        
				</section>
			</div>
		</section> <!-- .about-section -->
		<?php endwhile;
						
	}
}

/*********************************************************************************************************/
/**
Clients Widgets
**/
class superultra_client_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'classname' => 'widget-clients', 'description' => __( 'Display Clients ', 'superultra') );
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct( false, $name='Superultra:: Clients', $widget_ops, $control_ops );
	}
	function form( $instance ) {		
		$instance = wp_parse_args( (array) $instance, array( 'customer_title' => '','img_alt' => '', 'number' => '5', 'path0' => '', 'path1' => '', 'path2' => '', 'path3' => '', 'path4' => '', 'path5' => '', 'redirectlink0' => '', 'redirectlink1' => '', 'redirectlink2' => '', 'redirectlink3' => '', 'redirectlink4' => '', 'redirectlink5' => '') );	
			$imgalt = strip_tags($instance['img_alt']);
			$customer_title = strip_tags($instance['customer_title']);
			$number = absint( $instance[ 'number' ] );	 
			for ( $i=0; $i<$number; $i++ ) {
			$var = 'path'.$i;
			$var1 = 'redirectlink'.$i;
			$instance[ $var ] = esc_url( $instance[ $var ] );
			$instance[ $var1 ] = esc_url( $instance[ $var1 ] );
		}		
		?>
		<p>
			<label for="<?php echo $this->get_field_id('customer_title'); ?>">
				<?php _e('Customer Title:', 'superultra'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('customer_title'); ?>" name="<?php echo $this->get_field_name('customer_title'); ?>" type="text" value="<?php echo esc_attr($customer_title); ?>" />
		</p>
		<p class="description">
			<?php _e( 'Note: Recommended size for the image is 225px (width) and 65px (height). If you want more image adding fields then first enter the number and click on Save, this will allow you more image adding fields', 'superultra' ); ?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('img_alt'); ?>">
				<?php _e('Image Alt:', 'superultra'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('img_alt'); ?>" name="<?php echo $this->get_field_name('img_alt'); ?>" type="text" value="<?php echo esc_attr($imgalt); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
				<?php _e( 'Number of Images:', 'superultra' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>
			<?php for ( $i=0; $i<$number; $i++ ) {
			$var = 'path'.$i;
			$var1 = 'redirectlink'.$i;
			?>
			<input type="text" class="upload1" id="<?php echo $this->get_field_id( $var ); ?>" name="<?php echo $this->get_field_name( $var ); ?>" value="<?php if(isset ( $instance[$var] ) ) echo esc_url( $instance[$var] ); ?>" />
			<input class="button custom_media_button" name="<?php echo $this->get_field_name( $var ); ?>" type="button" id="custom_media_button_services" value="<?php echo esc_attr( 'Add Image'); ?>"onclick="mediaupload.uploader( '<?php echo $this->get_field_id( $var ); ?>' ); return false;"/>
		</p>
		<p>
			<?php _e('Redirect Link:', 'superultra'); ?>
			<input class="widefat" name="<?php echo $this->get_field_name($var1); ?>" type="text" value="<?php if(isset ( $instance[$var1] ) ) echo esc_url( $instance[$var1] ); ?>" />
		</p>
		<?php } 
		}
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['img_alt'] = strip_tags($new_instance['img_alt']);
			$instance['customer_title'] = strip_tags($new_instance['customer_title']);
			$instance['number'] = absint( $new_instance['number'] );

			for( $i=0; $i<$instance[ 'number' ]; $i++ ) {
				$var = 'path'.$i;
				$var1 = 'redirectlink'.$i;
				$instance[ $var] = esc_url_raw( $new_instance[ $var ] );			
				$instance[ $var1] = esc_url_raw( $new_instance[ $var1 ] );
			}
			return $instance;
		}	
		function widget( $args, $instance ) {
			$imgalt = empty( $instance['img_alt'] ) ? '' : $instance['img_alt'];
			$customer_title = empty( $instance['customer_title'] ) ? '' : $instance['customer_title'];
			$number = empty( $instance['number'] ) ? 5 : $instance['number'];
			$path_array = array();
			$redirectlink_array = array();
			for( $i=0; $i<$number; $i++ ) {
				$var = 'path'.$i;
				$var1 = 'redirectlink'.$i;
				$path = isset( $instance[ $var ] ) ? $instance[ $var ] : '';
				$redirectlink = isset( $instance[ $var1 ] ) ? $instance[ $var1 ] : ''; 			
			if( !empty( $path )  || !empty( $redirectlink ))  {		
				if( !empty( $path ) ){
 				array_push( $path_array, $path ); // Push the page id in the array
		 			}else{
		 			 array_push($path_array, "");
		 			}
	 			if( !empty( $redirectlink ) ){
	 				array_push( $redirectlink_array, $redirectlink ); // Push the page id in the array
		 			}else{
		 			 array_push($redirectlink_array, "");
		 			}
		 		}
	 		}
 		
 		if ( !empty( $path_array ) ) { ?>
 		<section class="client-section">
 			<div class="container">
 				<section class="widget widget_raratheme_client_logo_widget">
 					<div class="raratheme-client-logo-holder">
						<div class="raratheme-client-logo-inner-holder">   
 							<h2 class="widget-title" itemprop="name"><?php echo esc_html($customer_title);?></h2>
 							<div class="image-holder-wrap"> <!-- yo wrap plugin ko filter bata rakhnu parxa -->
				 			<?php
				 			for( $i=0; $i<$number; $i++ ) {
				 				if((!empty( $redirectlink_array[$i] )) || (!empty( $path_array[$i] )) ) {
				 					?>
				 				<div class="image-holder black-white">
				 					<a href="<?php echo $redirectlink_array[$i];?>" title="<?php echo $imgalt;?>" target="_blank">
				 					<img src="<?php echo $path_array[$i];?>" alt="<?php echo $imgalt;?>">
				 					</a>
				 					<?php
				 				}
				 				else {
				 					if(!empty($path_array[$i])){
				 						?>
				 						<img src="<?php echo $path_array[$i];?>" alt="<?php echo $title;?>">
				 						<?php
				 					}
				 				}
				 				?>
				 				</div>
				 				<?php
				 			 }
				 			?>				
				 			</div>
				 		</div>
				 	</div>
 				</section>
 			</div>
		</section> <!-- .client-section -->
		<?php
 		}
 		
 	}
 }



 /*********************************************************************************************************/
/**

/**
Services Widgets
**/
class superultra_services_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'classname' => 'widget-services', 'description' => __( 'Display Services ', 'superultra') );
		$control_ops = array('width' => 200, 'height' => 250);
		parent::__construct( false, $name='Superultra: Services', $widget_ops, $control_ops );
	}
	function form($instance)
	{
		$instance = wp_parse_args((array) $instance, array( 'services_title' => '', 'services_content' => '', 'numbers'=>'3','page_id1'=>'','page_id2'=>'','page_id3'=>''));
		$services_title = strip_tags($instance['services_title']);
		$services_content = esc_textarea($instance['services_content']);
		$numbers = absint( $instance[ 'numbers' ] );
		for ($i = 1; $i <= $numbers; $i++) {
			$var = 'page_id' . $i;
			$defaults[$var] = '';
		}
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('services_title'); ?>">
				<?php _e('Services Title:', 'superultra'); ?>
			</label>
			<input class="widefat" id="<?php echo $this->get_field_id('services_title'); ?>" name="<?php echo $this->get_field_name('services_title'); ?>" type="text" value="<?php echo esc_attr($services_title); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('services_content'); ?>">
				<?php _e('Services Content Goes Here:', 'superultra'); ?>
			</label>
			<textarea class="widefat" rows="5" id="<?php echo $this->get_field_id('services_content'); ?>" name="<?php echo $this->get_field_name('services_content'); ?>"><?php echo esc_html($services_content);?></textarea>
		</p>

		<legend><strong><?php _e('Note:','superultra');?></strong><i> <?php _e('Select your page yo want to display','superultra'); ?></i></legend>
			 <br/>
		<p>
			<label for="<?php echo $this->get_field_id('numbers'); ?>">
				<?php _e( 'Number of Posts:', 'superultra' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id('numbers'); ?>" name="<?php echo $this->get_field_name('numbers'); ?>" type="text" value="<?php echo $numbers; ?>" size="3" />
		</p>
		<?php $instance = wp_parse_args((array)$instance);
	
			for ($i = 1; $i <= $numbers; $i++) {
			$var = 'page_id' . $i;
			$var = absint($instance[$var]);
			 ?>
		<p>
			<label for="<?php echo $this->get_field_id(key($defaults)); ?>">
				<?php _e('Page', 'superultra'); ?>
			:</label>
				<?php wp_dropdown_pages(array(
					'show_option_none' => ' ',
					'name' => $this->get_field_name(key($defaults)) ,
					'selected' => $instance[key($defaults) ]
				)); ?>
		</p>
		<hr>
		<?php next($defaults); // forwards the key of $defaults array
		

			}
		
	}
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['services_title'] = esc_attr($new_instance['services_title']);
		$instance['services_content'] = strip_tags($new_instance['services_content']);
		$instance['numbers'] = absint( $new_instance['numbers'] );
		for ($i = 1; $i <=$instance[ 'numbers' ]; $i++) {
			$var = 'page_id' . $i;
			$instance[$var] = absint($new_instance[$var]);
		}
		return $instance;
	}
	function widget($args, $instance)
	{
		$services_title = empty( $instance['services_title'] ) ? '' : $instance['services_title'];
		$services_content = empty( $instance['services_content'] ) ? '' : $instance['services_content'];
		$numbers = empty( $instance['numbers'] ) ? 4 : $instance['numbers'];
		$page_array = array();
		$font_icon_array = array();
		for ($i = 1; $i <= $numbers; $i++) {
			$var = 'page_id' . $i;
			$page_id = isset($instance[$var]) ? $instance[$var] : '';
			if( !empty( $page_id ) || !empty($font_icon) ){
				if( !empty( $page_id )){
						array_push( $page_array, $page_id ); // Push the page id in the array
					} else { 
						array_push($page_array, "");
					}
				
			}
		}
		$get_featured_pages = new WP_Query(array(
			'posts_per_page' => - 1,
			'post_type' => array(
				'page'
			) ,
			'post__in' => $page_array,
			'orderby' => 'post__in'
		));
		?>
		<section class="service-section">
			<div class="container">
				<section class="widget widget_text">
					<h2 class="widget-title"><?php echo esc_html($services_title);?></h2>
					<div class="textwidget">
						<p><?php echo esc_html($services_content);?></p>
					</div>    		
				</section>
			<?php while( $get_featured_pages->have_posts() ):$get_featured_pages->the_post(); ?>
				<section class="widget widget_rrtc_icon_text_widget">
					<div class="rtc-itw-holder">
						<div class="rtc-itw-inner-holder">
							<div class="text-holder">
								<h2 class="widget-title" itemprop="name"><?php the_title(); ?></h2>
									<div class="content">
									<?php 
									 echo substr(get_the_content(),0,76);
									?>
									</div>
									<a class="btn-readmore" href="<?php the_permalink();?>" target="_blank">Learn More</a>
							</div>
							<div class="icon-holder">
							<?php
							if(has_post_thumbnail() ){
								the_post_thumbnail('', [ 'alt' => esc_html ( get_the_title() ) ] ); 
							}
							else{ 
								
						 	?>
						 		<span class="fab fa-android"></span>
							<?php }  
							?>
							</div>		
							
						</div>
					</div>
				</section>
			<?php endwhile;
				wp_reset_postdata(); 
			?>
					
			</div>
		</section> <!-- .service-section -->
	<?php 
	}
}


/*********************************************************************************************************/
/**
Recent Posts Widgets
**/
class superultra_recent_posts_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'description' => __('Display Recent Post', 'superultra')
		);
		parent::__construct(false, $name = __('Superultra: Recent Post', 'superultra') , $widget_ops);
	}
	function form($instance) {
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'number' => '5',
				'service_title' => '',
			)
		); ?>

		<p>
			<label for="<?php echo $this->get_field_id('service_title'); ?>">
				<?php esc_html_e('Title:', 'superultra'); ?>
			</label>
			<input id="<?php echo $this->get_field_id('service_title'); ?>" name="<?php echo $this->get_field_name('service_title'); ?>" type="text" value="<?php echo esc_attr($instance['service_title']); ?>"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
			<?php esc_html_e( 'Number of Post:', 'superultra' ); ?>
			</label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo absint($instance[ 'number']); ?>" size="3"/>
		</p>
		<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['number'] = absint( $new_instance['number'] );
		$instance['service_title'] = sanitize_text_field($new_instance['service_title']);
		return $instance;
	}

	function widget($args, $instance) {

		$service_title = empty($instance['service_title']) ? '' : $instance['service_title'];
		$number = empty($instance['number']) ? 5 : $instance['number'];
		global $post;

		$get_featured_posts = new WP_Query(
			array(
				'posts_per_page' => $number,
				'post_type' => array('post'),
				'ignore_sticky_posts' => 1
			)
		);

		?>

			<div class="additional-posts">
				<div class="container">
				<?php if (!empty($service_title)){ ?>
					<h3 class="title"><?php echo esc_html($service_title);?></h3>
				<?php } ?>
					<div class="block-wrap">
				<?php if ($number > 0) {
					$i = 0;
					while ($get_featured_posts->have_posts()):$get_featured_posts->the_post(); ?>
						<div class="block clearfix">
							
							<div class="entry-meta">
								<span class="posted-on" itemprop="datePublished">
									<?php echo esc_html(get_the_date('j M Y')); ?>
								</span>
							</div>
							<header class="entry-header">
								<h3 class="entry-title">
									<a href="<?php the_permalink();?>"><?php the_title();?></a>
								</h3>                        
							</header><!-- .entry-header -->

							<figure class="post-thumbnail">
								<?php if ( has_post_thumbnail() ){ ?>
									<a href="<?php the_permalink();?>">
									<div class="recent-post-img">
										<?php the_post_thumbnail(); ?>
									</div>
									</a>
								<?php } ?>
										
							</figure><!-- .post-thumbnail -->
								
							
						</div>
						<?php $i++;
					endwhile;
					// Reset Post Data
					wp_reset_postdata();
				} ?>
					</div>
				</div>
			</div>

		<?php 
	}
}
