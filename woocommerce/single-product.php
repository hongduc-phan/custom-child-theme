<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
	<!-- Page title -->
	<section id="page-title" class="padding-tb-120px text-center background-second-color" style="background-image: url(<?php echo esc_url($niletheme_option['page_title_ba']['url']); ?>)">
		<div class="container z-index-9 relative">
			<div class="text-capitalize text-white">
				<h1 class="text-white">
					<?php the_title(); ?>
				</h1>
			</div>
			<div class="niletheme-breadcrumb text-white">
				<?php if(function_exists('bcn_display')) { bcn_display(); }?>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="effect_ba z-index-5"></div>
	</section>
	<!-- // Page title -->
	<div class="container margin-tb-45px">
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
     
                            if ( has_term( 'solar-tuotteet', 'product_cat' ) ) {
                                //bellows( 'main' , array( 'menu' => 31 ) );
                            }

                            else {
                                // bellows( 'main' , array( 'menu' => 29 ) );
                            }
                 ?>
        </div>-->
            
			<div class="col-lg-12 margin-bottom-30px">
				<div class="widget">
					<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

						<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'single-product' ); ?>

						<?php endwhile; // end of the loop. ?>
                
                    <?php 
                        $path = get_stylesheet_directory_uri(); 
                        $product_name = get_the_title();
                    ?>
                    
                   <!-- <a href="http://orima.fi.185-179-116-102.testisivu.fi/tarjouspyynto?tuote=<?php //echo $product_name ?>"><img src="<?php //echo $path ?>/img/buttons/btnTarjous.png" /></a>&nbsp;	
                    <a href="/hae-jalleenmyyjaa/"><img src="<?php //echo $path ?>/img/buttons/btnJalleenmyyja.png" /></a> -->
                    
                    
                    
						<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

                    
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
                            if ( has_term( 'solar-tuotteet', 'product_cat' ) ) {
                               // bellows( 'main' , array( 'menu' => 31 ) );
                            }

                            else {
                               // bellows( 'main' , array( 'menu' => 29 ) );
                            }
                ?>
        </div>-->
            
		</div>
	</div>
	<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
