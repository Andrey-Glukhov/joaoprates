<?php
function jp_script_enqueue(){
//css
	wp_enqueue_style( 'jp-stylesheet', get_template_directory_uri() . '/css/joaoprates.css', array(), '1.0.0', 'all' );
  //js
  // unregister jQuery
  wp_deregister_script('jquery-core');
  wp_deregister_script('jquery');

  // register
  wp_register_script( 'jquery-core', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, null, true );
  wp_register_script( 'jquery', false, array('jquery-core'), null, true );

  // enqueue
  wp_enqueue_script( 'jquery' );
  // Bootstrap
  wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), null, true );
  
  wp_enqueue_script( 'jp-js', get_template_directory_uri() . '/js/joaoprates.js', array('jquery', 'bootstrap-js'), null, true );

  
}
add_action( 'wp_enqueue_scripts', 'jp_script_enqueue' );

function jp_theme_setup(){
  add_theme_support('menus');
  register_nav_menu('primary_left', 'Primary Header Left');
  register_nav_menu('primary_right', 'Primary Header Right');
  register_nav_menu('footer_links_menu', 'Footer Links Area');
  register_nav_menu('footer_support_menu', 'Footer Support Area');
  register_nav_menu('footer_social_menu', 'Footer Social Area');
}

function mytheme_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
//remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
add_action( 'woocommerce_before_single_product_summary', 'bv_show_product_image', 20 );

function bv_show_product_image()  {
	
	if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
		return;
	}
	
	global $product;
	
	$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
	$post_thumbnail_id = $product->get_image_id();
	$wrapper_classes   = apply_filters(
		'woocommerce_single_product_image_gallery_classes',
		array(
			'woocommerce-product-gallery',
			'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
			'woocommerce-product-gallery--columns-' . absint( $columns ),
			'images',
		)
	);
	?>
	<div class=" col-md-7 col-sm-10 col-11 <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
		<figure class="woocommerce-product-gallery__wrapper">
			<?php

			$attachment_ids = $product->get_gallery_image_ids();
			
			if ( $attachment_ids && $product->get_image_id() ) {
				//foreach ( $attachment_ids as $attachment_id ) {
					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_ids[0] ,true), $attachment_ids[0] ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
				//}
			} else if ( $product->get_image_id() ) {
				$html = wc_get_gallery_image_html( $post_thumbnail_id, true ); 
			} else {
				$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
				$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
				$html .= '</div>';
			}
	
			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
	
			//do_action( 'woocommerce_product_thumbnails' );
			?>
		</figure>
	</div>
<?php	
}


add_action('init', 'jp_theme_setup');
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-formats', array('aside', 'chat', 'gallery','link','image','quote','status','video'));
add_theme_support('post-thumbnails');



?>
