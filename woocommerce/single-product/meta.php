<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
    <div class="product_meta">

        <?php do_action( 'woocommerce_product_meta_start' ); ?>

        <?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

        <span class="sku_wrapper"><?php esc_html__( 'SKU: ', 'nilelogistics' ); ?> <span class="sku"><?php echo esc_html( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'nilelogistics' ); ?></span></span>

        <?php endif; ?>

        <?php // echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'nilelogistics' ) . ' ', '</span>' ); ?>

        <?php 
        $path = get_stylesheet_directory_uri(); 
        $product_name = get_the_title();
        ?>
        
                            <?php
                            if ( current_user_can( 'read' ) ): // check for a capability that only admins have ?>

                                <?php
                                if ( is_product() && has_term( 'solar-tuotteet', 'product_cat' ) ) {
                                }
                                else {
                                    // Tarkista lisäkentät, jotka näkyvät vain kirjautuneille JÄLLEENMYYJILLE
                                    $title = $product->get_meta( 'tilausnumero_title' );
                                    if(isset($title)) {
                                        if ($title != "") {
                                            // echo ("Tilausnumero: ") . $title;
                                        }
                                    }
                                }
                                ?>
        
                            <?php endif; // end of user capability check ?>    

        <?php
        if ( is_product() && has_term( 'solar-tuotteet', 'product_cat' ) ) { ?>
        
            <div style="margin-bottom: 36px; margin-top: 24px;">
                <a href="/gde-kupit/" class="descButton">Где купить?</a>
            </div>

        <?php
        }
        else {
        ?>

            <div style="margin-bottom: 36px; margin-top: 24px;">
                <a href="/otpravit-zapros?tuote=<?php echo $product_name ?>" class="descButton">Хотите получить дополнительную информацию?</a>
            </div>

            <a href="/gde-kupit/" class="descButton">Где купить?</a>

        <?php } ?>    
        
        <?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'nilelogistics' ) . ' ', '</span>' ); ?>

        <?php do_action( 'woocommerce_product_meta_end' ); ?>

    </div>
