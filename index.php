<?php
	/**
	 * The main template file
	 *
	 * This is the most generic template file in a WordPress theme
	 * and one of the two required files for a theme (the other being style.css).
	 * It is used to display a page when nothing more specific matches a query.
	 * E.g., it puts together the home page when no home.php file exists.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package zool
	 */
	global $smof_data  ;
	get_header(); ?>

<!-- Page title -->
    <section id="page-title" class="padding-tb-120px text-center background-second-color" style="background-image: url(<?php echo esc_url($niletheme_option['page_title_ba']['url']); ?>)">
        <div class="container z-index-9 relative">
            <div class="text-capitalize text-white">
                <h1 class="text-white">
                    Новости                
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


    <div class="blog-background">
        <div class="container padding-bottom-60px padding-top-100px">
            <div class="row">
                <div class="col-lg-8">
                    <div id="posts-output" class="tab content-all posts-output clearfix">
                        <?php 
						if ( have_posts() ) {
 							category_layout_3();
						} else { 
							get_template_part( 'template-parts/content', 'none' );
						}
					?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>

    <?php get_footer();
