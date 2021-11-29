<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
global $niletheme_option, $niletheme_meta;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
	?>



		<!-- Page title -->
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<section id="page-title" class="padding-tb-120px text-center background-second-color" style="background-image: url(<?php echo esc_url($niletheme_option['page_title_ba']['url']); ?>)">
			<div class="container z-index-9 relative">
				<div class="text-capitalize text-white">
					<h1 class="text-white">
						<?php woocommerce_page_title(); ?>
					</h1>
				</div>
				<div class="niletheme-breadcrumb text-white">
					<?php if(function_exists('bcn_display')) { bcn_display(); }?>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="effect_ba z-index-5"></div>
		</section>
		<?php endif; ?>

		<!-- // Page title -->

		<div class="padding-tb-40px shop-output">

			<div class="container">
				<div class="row">
                    
                    <!--
                    <div class="col-lg-3" id="desktop">
						<?php
                            /**
                             * woocommerce_sidebar hook.
                             *
                             * @hooked woocommerce_get_sidebar - 10
                             */
                            //do_action( 'woocommerce_sidebar' );
                        
                        /*
                            Ehtolause: tarkista ID onko solar-tuotesivu (WooCommerce-tarkistus). Jos on, lataa spesifi menu, jos ei, lataa yleinen (id 29)
                        */
                        
                        global $wp_query;
                        // get the query object
                        $cat_obj = $wp_query->get_queried_object();

                        // print_r($cat_obj);

                        if($cat_obj)    {
                            $category_ID  = $cat_obj->term_id;
                            //echo $category_ID;

                            // with the `$category_ID`, proceed to your `if/else` statement.
                            if( $category_ID == "28"){
                                // bellows( 'main' , array( 'menu' => 31 ) );
                            }

                            else {
                                // bellows( 'main' , array( 'menu' => 29 ) );
                            }
                        }

                        ?>
					</div>-->
                    
					<div class="col-lg-12 margin-bottom-30px">

                        <?php global $post; ?>
                        
                            <div style="background-color: #fff; padding: 30px 30px 10px;">
                                <?php do_action( 'woocommerce_archive_description' ); ?>
                            </div>

                        <?php 
                        /*$terms = get_the_terms( 'product_cat', $post->ID);

                                echo '<div class="wooc-desc" style="margin-bottom: 32px;">';
                                echo category_description( get_category_by_slug($terms)->term_id);
                                echo '</div>';
                                echo '<hr />'
                        */

                        ?>
                        
                        <?php if ( have_posts() ) : ?>
                        
						<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>
							<?php woocommerce_product_loop_start(); ?>

							<?php woocommerce_product_subcategories(); ?>

							<div class="row" style="margin-top: 48px;">
								<?php while ( have_posts() ) : the_post(); ?>

								<?php
						/**
						 * woocommerce_shop_loop hook.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
					?>

									<?php wc_get_template_part( 'content', 'product' ); ?>

									<?php endwhile; // end of the loop. ?>
							</div>
							<?php woocommerce_product_loop_end(); ?>

							<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

								<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

								<?php
				/**
				 * woocommerce_no_products_found hook.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			?>

									<?php endif; ?>

                        <div style="padding: 15px 15px 15px 0px;">
                            <?php 
                                $path = get_stylesheet_directory_uri(); 
                            ?>

                            <!--<a href="/hae-jalleenmyyjaa/"><img src="<?php // echo $path ?>/img/buttons/btnJalleenmyyja.png" /></a>-->
                            <a href="/gde-kupit/" class="descButton">Где купить?</a>


                        </div>
					</div>
                    
                    <!--
                    <div class="col-lg-3" id="mobile">
						<?php
                            /**
                             * woocommerce_sidebar hook.
                             *
                             * @hooked woocommerce_get_sidebar - 10
                             */
                            //do_action( 'woocommerce_sidebar' );
                            global $wp_query;
                            // get the query object
                            $cat_obj = $wp_query->get_queried_object();

                            // print_r($cat_obj);

                            if($cat_obj)    {
                                $category_ID  = $cat_obj->term_id;
                                //echo $category_ID;

                                // with the `$category_ID`, proceed to your `if/else` statement.
                                if( $category_ID == "28"){
                                    //bellows( 'main' , array( 'menu' => 31 ) );
                                }

                                else {
                                    //bellows( 'main' , array( 'menu' => 29 ) );
                                }
                            }

                        ?>
					</div>-->
                    
				</div>
			</div>

		</div>
		<?php get_footer( 'shop' ); ?>
