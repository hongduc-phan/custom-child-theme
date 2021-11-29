<?php /* Template Name: Solar */ ?>


<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nilelogistics
 */

get_header(); ?>


    <?php while ( have_posts() ) : the_post(); ?>

    <?php
        $kuva = get_post_meta( $post->ID, 'paakuva', true );
    ?>


    <!-- Page title -->
    <section id="page-title" class="padding-tb-120px text-center background-second-color" style="background-image: url(<?php echo $kuva; ?>); padding-top: 64px !important; padding-bottom: 32px !important;">
        <div class="container z-index-9 relative">
            <div class="text-capitalize text-white">
                
                <div class="row">
                    <div class="col-md-10">
                
                        <h1 class="otsikko" id="tuoteOtsikko">
                            <?php
                            $paaotsikko = get_post_meta( $post->ID, 'paaotsikko', true );

                            if(isset($paaotsikko) && $paaotsikko != "") {
                                echo $paaotsikko;
                            }
                            else {
                                echo the_title();
                            }
                            ?>
                        </h1>

                        <hr />
                        
                        <p class="otsikko" id="tuoteAlaotsikko">
                            <?php
                            $alaotsikko = get_post_meta( $post->ID, 'alaotsikko', true );

                            if(isset($alaotsikko)) {
                                echo $alaotsikko;
                            }
                            ?>      
                        </p>
                    </div>
                
                    <div class="col-md-2">
                        <img src="/wp-content/uploads/2019/12/Orima-Nordic-solar-partner-white.png" class="vc_single_image-img attachment-medium" style="float: right;" />
                    </div>
                
                </div>
                    
            </div>

            <div class="clearfix"></div>
        </div>
        <div class="effect_ba z-index-5"></div>
    </section>
    <!-- // Page title -->


    <!-- page output -->
    <div class="blog-background">
    <!--<div style="background-color: #fff;">-->
    
        <div class="container padding-bottom-60px padding-top-20px">
            
            <div class="niletheme-breadcrumb">
                <?php if(function_exists('bcn_display')) { bcn_display(); }?>
            </div>
            
            <div class="row">
                <!--  content -->
                <div class="col-lg-12 col-md-12 margin-bottom-30px">
                    
                    
                    <h1 style="background: #fff; margin-bottom: 0px; padding: 24px 44px 0px;"><?php the_title(); ?></h1>
                    
                    <?php   get_template_part( 'template-parts/content', 'page' ); ?>
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
