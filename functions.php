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


add_action('rest_api_init', 'register_rest_images' );
function register_rest_images(){
    register_rest_field( array('post'),
        'fimg_url',
        array(
            'get_callback'    => 'get_rest_featured_image',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}
function get_rest_featured_image( $object, $field_name, $request ) {
    if( $object['featured_media'] ){
        $img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        return $img[0];
    }
    return false;
}

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
add_action( 'init', 'post_remove_meta' );
function post_remove_meta() {
    remove_action( 'storefront_post_header_before', 'storefront_post_meta', 10 );
}

/**
 * Remove post nav from single post page bottom
*/
add_action( 'init', function() {
    remove_action('storefront_single_post_bottom', 'storefront_post_nav', 10 );
});
