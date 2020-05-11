<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style()
{
    wp_dequeue_style('storefront-style');
    wp_dequeue_style('storefront-woocommerce-style');
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */
/**
 * Enqueue scripts and styles.
 */

function addscripts()
{
    $rand = substr(md5(rand()), 0, 7);
    wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/dist/css/app.css', false, $rand, 'all');
    wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/dist/css/chunk-vendors.css', false, $rand, 'all');
    wp_enqueue_script('main-vue-app', get_stylesheet_directory_uri() . '/dist/js/app.js', array(), $rand, true);
    wp_enqueue_script('main-vue-vendors', get_stylesheet_directory_uri() . '/dist/js/chunk-vendors.js', array(), $rand, true);
}
add_action('wp_enqueue_scripts', 'addscripts');

/**
 * Add support for svg
 */
function cc_mime_types($mimes)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($mimes, $new_filetypes);
    return $file_types;
}
add_action('upload_mimes', 'cc_mime_types');

/**
 * Remove breadcrumbs
*/

add_action( 'init', 'storefront_remove_storefront_breadcrumbs' );
 
function storefront_remove_storefront_breadcrumbs() {
   remove_action( 'storefront_before_content', 'woocommerce_breadcrumb', 10 );
}

/**
 * Remove post-header
*/

// add_action( 'init', function() {
//     remove_action( 'storefront_loop_post', 'storefront_post_header', 10 );
// } );


/**
 * Featured image
*/


// add_action('rest_api_init', 'register_rest_images' );
// function register_rest_images(){
//     register_rest_field( array('post'),
//         'fimg_url',
//         array(
//             'get_callback'    => 'get_rest_featured_image',
//             'update_callback' => null,
//             'schema'          => null,
//         )
//     );
// }
// function get_rest_featured_image( $object, $field_name, $request ) {
//     if( $object['featured_media'] ){
//         $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
//         return $img[0];
//     }
//     return false;
// }

/**
 * Remove related product from single product page
*/

add_action( 'init', function() {
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
} );


/**
 * Remove category link from single product page
*/

add_action( 'init', function() {
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
} );

/**
 * Remove post meta from single post page
*/
// add_action( 'init', 'post_remove_meta' );
// function post_remove_meta() {
//     remove_action( 'storefront_post_header_before', 'storefront_post_meta', 10 );
// }

/**
 * Remove post nav from single post page bottom
*/
add_action( 'init', function() {
    remove_action('storefront_single_post_bottom', 'storefront_post_nav', 10 );
});

/**
 * Remove add_to_cart_message
*/
// add_filter( 'wc_add_to_cart_message_html', '__return_false' );

/**
 * Changes the redirect URL for the Return To Shop button in the cart.
*
* @return string
*/
function wc_empty_cart_redirect_url() {
	return get_site_url().'/selection/';
}
add_filter( 'woocommerce_return_to_shop_redirect', 'wc_empty_cart_redirect_url' );

/**
 * Changes the text for the Return To Shop button in the cart.
*/
add_filter( 'gettext', 'change_woocommerce_return_to_shop_text', 20, 3 );
function change_woocommerce_return_to_shop_text( $translated_text, $text, $domain ) {
       switch ( $translated_text ) {
                      case 'Return to shop' :
   $translated_text = __( 'Return to Selection', 'woocommerce' );
   break;
  }
 return $translated_text; 

}

/**
 * Remove storefront credit and widget.
*/
add_action('init', function() {
    remove_action( 'storefront_footer', 'storefront_credit', 20 );
    remove_action( 'storefront_footer', 'storefront_footer_widgets', 10 );
});

/**
 * Remove storefront_handheld_footer_bar .
*/
add_action( 'init', 'jk_remove_storefront_handheld_footer_bar' );

function jk_remove_storefront_handheld_footer_bar() {
  remove_action( 'storefront_footer', 'storefront_handheld_footer_bar', 999 );
}

//author meta

 function slug_show_author_meta( $object ) {
       $post_author = (int) $object['author'];
        $array_data = array();

        // $array_data['login'] = get_the_author_meta('login');

        // $array_data['email'] = get_the_author_meta('email');

        //$array_data['user_nicename'] = get_the_author_meta('user_nicename');

        $array_data['first_name'] = get_user_meta($post_author, 'first_name', true);

        $array_data['last_name'] = get_user_meta($post_author, 'last_name', true);

        //$array_data['nickname'] = get_user_meta($post_author, 'nickname', true);

        return array_filter($array_data);
    }

    function slug_show_register_author_meta_rest_field() {

    register_rest_field('post', 'author_meta', array(
        'get_callback'    => 'slug_show_author_meta',
        'update_callback' => null,
        'schema'          => null,
    ));

}
add_action('rest_api_init', 'slug_show_register_author_meta_rest_field');

/**
 * Remove storefront header_cart.
*/

function remove_sf_actions() {
	remove_action( 'storefront_header', 'storefront_header_cart', 60 );
}
add_action( 'init', 'remove_sf_actions' );

/**
 * Remove storefront quantity_fields.
*/

add_filter( 'woocommerce_is_sold_individually', '__return_true' );

/**
 * remove_description_tab.
*/
add_filter( 'woocommerce_product_tabs', 'yikes_remove_description_tab', 20, 1 );

function yikes_remove_description_tab( $tabs ) {

	// Remove the description tab
    if ( isset( $tabs['description'] ) ) unset( $tabs['description'] );      	    
    return $tabs;
}

/**
 *Remove Zoom, Gallery @ Single Product Page
 * 
 */
  
add_action( 'wp', 'bbloomer_remove_zoom_lightbox_theme_support', 99 );
  
function bbloomer_remove_zoom_lightbox_theme_support() { 
   remove_theme_support( 'wc-product-gallery-zoom' );
   remove_theme_support( 'wc-product-gallery-lightbox' );
   remove_theme_support( 'wc-product-gallery-slider' );
}

/**
 *woo_custom_cart_button_text
 * 
 */
add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text');
 
function woo_custom_cart_button_text() {
return __('purchase', 'woocommerce');
}

/**
 * Product Summary Box.
 *
 * @see woocommerce_template_single_title()
 * @see woocommerce_template_single_rating()
 * @see woocommerce_template_single_price()
 * @see woocommerce_template_single_excerpt()
 * @see woocommerce_template_single_meta()
 * @see woocommerce_template_single_sharing()
 */
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

add_action('init', function() {
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
   
});

/**
 * remove billing country
 */
// function custom_override_checkout_fields( $fields ) {
//     unset($fields['billing']['billing_country']);
//     return $fields;
// }

// add_filter('woocommerce_checkout_fields','custom_override_checkout_fields');

/**
 * Removing 'posted on' text from post meta
 */
require get_stylesheet_directory() . '/inc/storefront-template-functions.php';