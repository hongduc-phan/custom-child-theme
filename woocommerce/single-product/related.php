<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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

    if ( is_product() && has_term( 'solar-tuotteet', 'product_cat' ) ) { ?>
        <section class="related products">
                   
            <h2>
                <?php esc_html_e( 'Related products', 'nilelogistics' ); ?>
            </h2>

    
                                                                        <?php /*
                        $columns_num = 4; // The number of columns we want to display our posts
                        $i = 0; //Counter for .row divs
          
                        $mypages = get_pages( array( 'child_of' => 1597, 'sort_column' => 'menu_order', 'sort_order' => 'asc') );  	
                                                
                        $total = count($mypages);   
                        echo $total;      //DEBUG
                        
        
                        foreach( $mypages as $page ) {		 		
                            $content = $page->post_content; 		
                                if ( ! $content ) // Check for empty page 			
                                    continue;  		
                            $content = apply_filters( 'the_content', $content ); 	
                        ?>
                        <?php
                        if ( $i == 0 ) echo '<div class="row">';   ?>
                        
                        <div class="col-sm-4">
                        
                        <a href="<?php echo get_page_link( $page->ID ); ?>">
                        <?php
                            echo get_the_post_thumbnail( $page->ID, 'thumbnail', array('class' => 'categoryImage') ); ?></a> 		
                            <h4 class="page-list-ext-title" style="margin-top: 13px;">
                                <a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a>
                            </h4>
                        </div>    
                        <?php
                            $i++;
                            
                           
                                if ( $i % 3 == 0 ) {
                                    echo '</div><div class="row">';
                                }
                            
                            } */
            ?>  
            
            
            <div class="term-description" style="margin-bottom: 64px;">
                <ul>
                    <?php
                         wp_list_pages( array( 'child_of' => 1597, 'title_li' => '', 'sort_column' => 'menu_order', 'sort_order' => 'asc') );
                    ?>
                </ul>
            </div>

        </section>
        <?php
    
    }

  //  else if ( is_product() && has_term( 'lumiesteet', 'product_cat' ) ) {
   else if ( is_product() ) { ?>
     <section class="related products">
                   
            <h2>
                <?php esc_html_e( 'Related products', 'nilelogistics' ); ?>
            </h2>
            <div class="term-description" style="margin-bottom: 64px;">
                <ul>
                    <?php
                      /*  $array = array(
                            $array = array(2525, 2546, 2548, 2550, );
                        ); 
                        */     
                        wp_list_pages( array( 'child_of' => 2525, 'title_li' => '', 'sort_column' => 'menu_order', 'sort_order' => 'asc', 'post_parent' => 0) );
                        wp_list_pages( array( 'child_of' => 2546, 'title_li' => '', 'sort_column' => 'menu_order', 'sort_order' => 'asc', 'post_parent' => 0) );
                        wp_list_pages( array( 'child_of' => 2548, 'title_li' => '', 'sort_column' => 'menu_order', 'sort_order' => 'asc', 'post_parent' => 0) );
                        wp_list_pages( array( 'child_of' => 2550, 'title_li' => '', 'sort_column' => 'menu_order', 'sort_order' => 'asc', 'post_parent' => 0) );
                        wp_list_pages( array( 'child_of' => 2552, 'title_li' => '', 'sort_column' => 'menu_order', 'sort_order' => 'asc', 'post_parent' => 0) );

                    ?>
                </ul>
            </div>

        </section>
        <?php
    
    }

    else if ( $related_products ) : ?>

        <section class="related products">
            <h2>
                <?php esc_html_e( 'Related products', 'nilelogistics' ); ?>
            </h2>

            <?php woocommerce_product_loop_start(); ?>
            <div class="row">
                <?php foreach ( $related_products as $related_product ) : ?>

                <?php
                        $post_object = get_post( $related_product->get_id() );

                        setup_postdata( $GLOBALS['post'] =& $post_object );

                        wc_get_template_part( 'content', 'product' ); ?>

                    <?php endforeach; ?>
            </div>
            <?php woocommerce_product_loop_end(); ?>

        </section>

        <?php endif;


wp_reset_postdata();
