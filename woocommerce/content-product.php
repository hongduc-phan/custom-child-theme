<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
	<div class="col-md-4 margin-bottom-45px product_theme">
		<div <?php post_class(); ?>>
			<div class="row no-gutters border-1 border-grey-1 product-item">
				<div class="col-md-12">
					<div class="cshero-woo-image">
						<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
						<a href="<?php the_permalink(); ?>">
							<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
						</a>
					</div>
				</div>
				<div class="col-md-12">
					<h3 class="padding-lr-20px padding-top-20px">
						<a class="product_title text-medium font-weight-600" href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>
					<hr>
					<div class="padding-lr-20px">
						<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?> </div>
					<div class="clearfix"></div>
					<div class="padding-lr-0px">
						<?php  do_action( 'woocommerce_after_shop_loop_item' );  ?> </div>
				</div>
			</div>
		</div>
	</div>
