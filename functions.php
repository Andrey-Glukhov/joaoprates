<?php
function jp_script_enqueue(){
//css
	wp_enqueue_style( 'jp-stylesheet', get_template_directory_uri() . '/css/joaoprates.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'slick-stylesheet', get_template_directory_uri() . '/css/slick.css', array(), '1.0.0', 'all' );
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
  wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick.min.js', array(), null, true );
  
  wp_enqueue_script( 'jp-js', get_template_directory_uri() . '/js/joaoprates.js', array('jquery', 'bootstrap-js'), null, true );
  wp_enqueue_script( 'showhide-js', get_template_directory_uri() . '/js/showhide.js', array('jquery', 'bootstrap-js'), null, true );


  
}
add_action( 'wp_enqueue_scripts', 'jp_script_enqueue' );

function jp_theme_setup(){
  add_theme_support('menus');
  add_theme_support('widgets');
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
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
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
<div class=" col-md-7 col-sm-10 col-11 <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>"
    data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
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


add_shortcode( 'showhide', 'showhide_shortcode' );
function showhide_shortcode( $atts, $content = null ) {
	// Variables
	$post_id = get_the_id();
	$word_count = number_format_i18n( sizeof( explode( ' ', strip_tags( $content ) ) ) );

	// Extract ShortCode Attributes
	$attributes = shortcode_atts( array(
		'type' => 'pressrelease',
		'more_text' => __( 'Show Press Release (%s More Words)', 'wp-showhide' ),
		'less_text' => __( 'Hide Press Release (%s Less Words)', 'wp-showhide' ),
		'hidden' => 'yes'
	), $atts );

	// More/Less Text
	$more_text = sprintf( $attributes['more_text'], $word_count );
	$less_text = sprintf( $attributes['less_text'], $word_count );
  //$more_text = '>>>';
  //$less_text = '<<<';
	// Determine Whether To Show Or Hide Press Release
	$hidden_class = 'sh-hide';
	$hidden_css = 'display: none;';
	$hidden_aria_expanded = 'false';
	if( $attributes['hidden'] === 'no' ) {
		$hidden_class = 'sh-show';
		$hidden_css = 'display: block;';
		$hidden_aria_expanded = 'true';
		$tmp_text = $more_text;
		$more_text = $less_text;
		$less_text = $tmp_text;
	}

	// Format HTML Output
	$output  = '<div id="' . $attributes['type'] . '-link-show' . $post_id . '" class="sh-link ' . $attributes['type'] . '-link ' . $hidden_class .'"><a href="#" onclick="showhide_show(\'' . esc_js( $attributes['type'] ) . '\', ' . $post_id . '); return false;" aria-expanded="' . $hidden_aria_expanded .'"><span id="' . $attributes['type'] . '-toggle-show' . $post_id . '">' . $more_text . '</span></a></div>';
	$output .= '<div id="' . $attributes['type'] . '-content-' . $post_id . '" class="sh-content ' . $attributes['type'] . '-content ' . $hidden_class . '" style="' . $hidden_css . '">' . do_shortcode( $content ) ;
	$output .= '<div id="' . $attributes['type'] . '-link-hide' . $post_id . '" class="sh-link ' . $attributes['type'] . '-link ' . $hidden_class .'"><a href="#" onclick="showhide_hide(\'' . esc_js( $attributes['type'] ) . '\', ' . $post_id . '); return false;" aria-expanded="' . $hidden_aria_expanded .'"><span id="' . $attributes['type'] . '-toggle-hide' . $post_id . '">' . $less_text . '</span></a></div></div>';
	return $output;
}




add_action('init', 'jp_theme_setup');
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-formats', array('aside', 'chat', 'gallery','link','image','quote','status','video'));
add_theme_support('post-thumbnails');

if ( ! function_exists( 'jp_cart_link' ) ) {
	/**
	 * Get  cart link including number of items and sum
	 *
	 */
	function jp_cart_link() {
		if ( ! jp_cart_available() ) {
			return;
		}
		?>

<li id="menu-item-28" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28">
    <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
	<span class="menu-image-title">CART</span>
	<?php if (WC()->cart->get_cart_contents_count() > 0) { ?>
                <span class="count"> <?php echo wp_kses_data( sprintf( '%d', WC()->cart->get_cart_contents_count())  ); ?></span>
    <?php } ?>
	</a>
</li>

<?php
	}
}
if ( ! function_exists( 'jp_cart_available' ) ) {
	/**
	 * Check if  Woo Cart instance is available
	 */
	function jp_cart_available() {
		$woo = WC();
		return $woo instanceof \WooCommerce && $woo->cart instanceof \WC_Cart;
	}
}
// add menu cart fragment
add_filter('woocommerce_add_to_cart_fragments', 'jp_add_refreshed_fragments');

function jp_add_refreshed_fragments($fragments) {
  /**
	 * Get Html fragments to update cart icon
	 */
  ob_start(); ?>

  <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
  <span class="menu-image-title">CART</span>
  <?php if (WC()->cart->get_cart_contents_count() > 0) { ?>
			  <span class="count"> <?php echo wp_kses_data( sprintf( '%d', WC()->cart->get_cart_contents_count())  ); ?></span>
  <?php } ?>
  </a>

  <?php $cart_part = ob_get_clean();
  $new_fragments = [];
  $new_fragments['a.cart-contents'] = $cart_part;
  return $new_fragments;
}


add_filter( 'wp_nav_menu_items', 'child_theme_menu_items', 10, 2);

function child_theme_menu_items($items, $args) {
  /**
	 * Insert  items to menu fragment 
	 */
    // get array of '<li> ... </li>' strings
    preg_match_all('/<\s*?li\b[^>]*>(.*?)<\/li\b[^>]*>/s', $items, $items_array );
    ob_start();
    jp_cart_link();
    $cart_part = ob_get_clean();
    foreach( $items_array[0] as &$menu_item ) {
		if (strpos($menu_item, 'menu-item-28')) {
			$menu_item = $cart_part;
		}
	}
	$items = implode('', $items_array[0]);
    return $items;
}

//Sidebar

function register_my_widgets(){
	register_sidebar( array(
		'name' => "Shop sidebar",
		'id' => 'shop-sidebar',
		'description' => 'Shop sidebar',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
}
add_action( 'widgets_init', 'register_my_widgets' );

// Slider shortcode
add_shortcode( 'jp_slider', 'slider_code_func' );

function slider_code_func( $atts ){
	$atts = shortcode_atts( array(
		'post_id' => ''		
	), $atts );
	
	ob_start(); 
	wp_reset_postdata();
	 $post_query = new WP_Query( array( 'p' => $atts['post_id'] , 'post_type' => 'any'));
	if ($post_query -> have_posts() ) : while ( $post_query -> have_posts() ) : $post_query -> the_post(); ?>
		<div class="row">
			<div id="carouselExampleSlidesOnly" class="col-12">
				<?php   if( have_rows('images_group') ): while( have_rows('images_group') ) : the_row(); ?>
					<img src="<?php echo esc_url(get_sub_field('image')); ?>"/>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
        </div>	
		<?php endwhile; ?>
        <?php endif; 
		wp_reset_postdata(); ?>
       
	<?php $result = ob_get_clean();
	return $result;
}
// Widget
include get_theme_file_path( '/include/layered-nav-select.php' );

register_widget( 'JP_Widget_Layered_Select' );

// Add product thumbnail to checkout order review
add_filter( 'woocommerce_cart_item_name', 'bv_image_on_checkout', 10, 3 );

function bv_image_on_checkout( $name, $cart_item, $cart_item_key ) {  

    /* Return if not checkout page */
    if ( ! is_checkout() ) {
        return $name;
    }

    /* Get product object */
    $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

    /* Get product thumbnail */
    $thumbnail = $_product->get_image();

    /* Add wrapper to image and add some css */
    $image = '<div class="ts-product-image" style="width: 90px; height: auto; display: inline-block; padding-right: 7px; vertical-align: middle;">'
                . $thumbnail .
            '</div>';

    /* Prepend image to name and return it */
    return $image . $name;

}

// Add buttons to variable product attribute selection
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'add_buttons_attr_dropdown', 10,2);

function add_buttons_attr_dropdown($html, $args)  {

	$args = wp_parse_args(
		apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ),
		array(
			'options'          => false,
			'attribute'        => false,
			'product'          => false,
			'selected'         => false,
			'name'             => '',
			'id'               => '',
			'class'            => '',
			'show_option_none' => __( 'Choose an option', 'woocommerce' ),
		)
	);

	// Get selected value.
	if ( false === $args['selected'] && $args['attribute'] && $args['product'] instanceof WC_Product ) {
		$selected_key = 'attribute_' . sanitize_title( $args['attribute'] );
		// phpcs:disable WordPress.Security.NonceVerification.Recommended
		$args['selected'] = isset( $_REQUEST[ $selected_key ] ) ? wc_clean( wp_unslash( $_REQUEST[ $selected_key ] ) ) : $args['product']->get_variation_default_attribute( $args['attribute'] );
		// phpcs:enable WordPress.Security.NonceVerification.Recommended
	}

	$options               = $args['options'];
	$product               = $args['product'];
	$attribute             = $args['attribute'];
	$name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
	$id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
	$class                 = $args['class'];
	$show_option_none      = (bool) $args['show_option_none'];
	$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

	if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
		$attributes = $product->get_variation_attributes();
		$options    = $attributes[ $attribute ];
	}

	$buttons_html  = '';	
	
	if ( ! empty( $options ) ) {
		if ( $product && taxonomy_exists( $attribute ) ) {
			// Get terms if this is a taxonomy - ordered. We need the names too.
			$terms = wc_get_product_terms(
				$product->get_id(),
				$attribute,
				array(
					'fields' => 'all',
				)
			);

			foreach ( $terms as $term ) {
				if ( in_array( $term->slug, $options, true ) ) {
					$buttons_html .= '<div class="attrib_selection" data-value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $args['selected'] ), $term->slug, false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name, $term, $attribute, $product ) ) . '</div>';
				}
			}
		} else {
			foreach ( $options as $option ) {
				// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
				$selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
				$buttons_html    .= '<div class="attrib_selection" data-value="' . esc_attr( $option ) . '" ' . $selected . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option, null, $attribute, $product ) ) . '</div>';
			}
		}
	}

	$html .= $buttons_html;
	return $html;

}
// 
add_action('woocommerce_shoppage_result_count', 'woocommerce_shop_result_count',10);
function woocommerce_shop_result_count() {

	$total_pages   = isset( $total_pages ) ? $total_pages : wc_get_loop_prop( 'total_pages' );
	$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
$base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
$format  = isset( $format ) ? $format : '';
global $woocommerce_loop;
$per_page = isset( $per_page ) ? $per_page : wc_get_loop_prop( 'per_page' );
	// phpcs:disable WordPress.Security
if ( 1 === intval( $total ) ) {
		_e( 'Showing the single result', 'woocommerce' );
	} elseif ( $total <= $per_page || -1 === $per_page ) {
		/* translators: %d: total results */
		printf( _n( 'Showing all %d result', 'Showing all %d results', $total, 'woocommerce' ), $total );
	} else {
		$first = ( $per_page * $current ) - $per_page + 1;
		$last  = min( $total, $per_page * $current );
		/* translators: 1: first result 2: last result 3: total results */
		printf( _nx( 'Showing %1$d&ndash;%2$d of %3$d result', 'Showing %1$d&ndash;%2$d of %3$d ', $total, 'with first and last result', 'woocommerce' ), $first, $last, $total );
	}
}
 
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
add_action('woocommerce_after_shop_inside_loop', 'woocommerce_pagination', 10);

?>