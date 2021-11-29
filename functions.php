<?php
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/*
add_filter( 'wp_nav_menu_items', 'my_account_loginout_link', 10, 2 );
function my_account_loginout_link( $items, $args ) {
    if (is_user_logged_in() && $args->theme_location == 'primary') { //change your theme registered menu name to suit
        $items .= '<li><a href="'. wp_logout_url( get_permalink( wc_get_page_id( 'shop' ) ) ) .'"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>'; //change logout link, here it goes to 'shop', you may want to put it to 'myaccount'
    }
    elseif (!is_user_logged_in() && $args->theme_location == 'primary') {//change your theme registered menu name to suit
        $items .= '<li><a href="' . get_permalink( wc_get_page_id( 'myaccount' ) ) . '"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>';
    }
    return $items;
}
*/

// load external jQuery
function my_script() {
    wp_enqueue_script('skriptit', get_stylesheet_directory_uri() . '/js/force-stylesheet-override.js', array('jquery'), '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'my_script');

include get_theme_file_path( 'extras.php' );

/**
 * Allow HTML in term (category, tag) descriptions
 */
foreach ( array( 'pre_term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_filter_kses' );
}
 
foreach ( array( 'term_description' ) as $filter ) {
    remove_filter( $filter, 'wp_kses_data' );
}

/* General, sitewide functions */

function translate_text($text) {
	$text = str_replace('Location', 'Sijainti', $text);
	$text = str_replace('Call Center', 'Puhelinnumero', $text);
	$text = str_replace('Call Us :', 'Soita meille :', $text);

	return $text;
}
add_filter('the_content', 'translate_text');

/* WooCommerce*/

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

add_theme_support( 'wc-product-gallery-lightbox' );

add_theme_support( 'wc-product-gallery-slider' );

/*
function custom_shop_page_redirect() {
    if( is_shop() ){
        wp_redirect( home_url( '/tuotteet-etusivu/' ) );
        exit();
    }
}
add_action( 'template_redirect', 'custom_shop_page_redirect' );
*/

function my_text_strings( $translated_text, $text, $domain ) {
    switch ( $translated_text ) {
        case 'Related products' :
            $translated_text = __( 'Смотрите также', 'woocommerce' );
            break;
    }
    return $translated_text;
}
add_filter( 'gettext', 'my_text_strings', 20, 3 );

// WooCommerce - Exclude Products from Shop Page using IDs.
add_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
function custom_pre_get_posts_query( $q ) {
  if ( ! $q->is_main_query() ) return;
  if ( ! $q->is_post_type_archive() ) return;
  
  if ( ! is_admin() && is_shop() ) {
    $q->set( 'post__not_in', array(717, 716, 715, 714, 713) );
  
  }
  remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
}

add_filter('woocommerce_login_redirect', 'wc_login_redirect');

// Ohjataan käyttäjä jälleenmyyjille-sivulle kirjautumisen jälkeen
function wc_login_redirect( $redirect_to ) {
     $redirect_to = '/jalleenmyyjille/';
     return $redirect_to;
}

/* Tilausnumero back-endiin */
function cfwc_create_custom_field() {
 $args = array(
 'id' => 'tilausnumero_title',
 'label' => __( 'Tilausnumero', 'cfwc' ),
 'class' => 'cfwc-tilausnumero',
 'desc_tip' => true,
 'description' => __( 'Tuotteen tilausnumero', 'ctwc' ),
 );
 woocommerce_wp_text_input( $args );
}
add_action( 'woocommerce_product_options_general_product_data', 'cfwc_create_custom_field' );

function cfwc_save_custom_field( $post_id ) {
 $product = wc_get_product( $post_id );
 $title = isset( $_POST['tilausnumero_title'] ) ? $_POST['tilausnumero_title'] : '';
 $product->update_meta_data( 'tilausnumero_title', sanitize_text_field( $title ) );
 $product->save();
}
add_action( 'woocommerce_process_product_meta', 'cfwc_save_custom_field' );

/* User account */
add_filter( 'woocommerce_account_menu_items', 'remove_orders', 999 );
function remove_orders( $items ) {
    unset($items['orders']);
    return $items;
}
 
add_filter( 'woocommerce_account_menu_items', 'remove_downloads', 999 );
function remove_downloads( $items ) {
    unset($items['downloads']);
    return $items;
}

add_filter( 'woocommerce_get_price_html', function( $price ) {
	// if ( is_admin() ) return $price;

	return '';
} );

// Piilota tuoteotsikko yksittäiseltä tuotesivulta
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

    $tabs['description']['title'] = __( 'Описание' );       // Rename the description tab

    return $tabs;

}