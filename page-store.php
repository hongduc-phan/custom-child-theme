<?php /* Template Name: Store Page */ ?>

<?php

get_header(); ?>


    <?php while ( have_posts() ) : the_post(); ?>



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


    <!-- page output -->
    <div class="blog-background">
        <div class="container padding-bottom-60px padding-top-100px">
            <div class="row">

                <!--  content -->
                <div class="col-lg-3 col-md-3">
                    <?php get_sidebar(); ?>
                </div>
                <!-- //  content -->
                
                <!--  content -->
                <div class="col-lg-9 col-md-9 margin-bottom-30px">
                    <?php   get_template_part( 'template-parts/content', 'page' ); ?>
                    
                    <div class="row" style="border-bottom: 1px solid #eee; border-top: 1px solid #eee; background-color: #fff; padding: 0px 30px; padding-bottom: 35px; padding-top: 35px; width: 100%; margin-left: 0px;">
                        
                    <?php
                        $params = array('posts_per_page' => 5, 'post_type' => 'product');
                        $wc_query = new WP_Query($params);
                        ?>
                             <?php if ($wc_query->have_posts()) : ?>
                             <?php while ($wc_query->have_posts()) :
                                        $wc_query->the_post(); ?>
                                     
                             <!--<div class="col-md-6 row no-gutters border-1 border-grey-1 product-item">-->
                             <div class="col-md-4 row border-1 border-grey-1 product-item">
                                 <div class="row">
                                     <div class="col-md-12">
                                       <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'shop_catalog' ); ?></a>
                                     </div>     
                                    
                                     <div class="col-md-12">
                                  <h4 class="padding-lr-20px padding-top-20px">
                                       <a class="product_title font-weight-600" style="font-size: 14px;" href="<?php the_permalink(); ?>">
                                       <?php the_title(); ?>
                                       </a>
                                  </h4>
                                     </div>
                                </div>     
                            </div>
                        <?php endwhile; ?>
                             <?php wp_reset_postdata(); ?>
                             <?php else:  ?>
                                  <?php _e( 'Ei tuotteita' ); ?>
                             <?php endif; ?>

                    
                    <?php    // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;  

                    endwhile; // End of the loop.
                    ?>
                </div>
                <!-- //  content -->

            </div>
        </div>
    </div>



    <?php
get_footer();
