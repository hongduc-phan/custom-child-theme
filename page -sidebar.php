<?php /* Template Name: Page with sidebar */ ?>

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

                <div class="col-lg-3" id="desktop">
                <?php
                    bellows( 'main' , array( 'menu' => 29 ) );
                ?>
                </div>
                
                <!--  content -->
                <div class="col-lg-9 col-md-9 margin-bottom-30px">
                    
                    <?php   get_template_part( 'template-parts/content', 'page' ); ?>
                    <?php    // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;  

                    endwhile; // End of the loop.
                    ?>
                </div>
                <!-- //  content -->


                <!--  conten
                <div class="col-lg-4 col-md-3">
                    <?php //get_sidebar(); ?>
                </div>
                 //  content -->

                <div class="col-lg-3" id="mobile">
                <?php
                    bellows( 'main' , array( 'menu' => 29 ) );
                ?>
                </div>

            </div>
        </div>
    </div>



    <?php
get_footer();
