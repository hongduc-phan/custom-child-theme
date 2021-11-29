<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package marta
 */

get_header();
?>
    <div class="blog-background cleafix">
        <div id="primary" class="content-area clearfix">
            <div id="main" class="site-main">
                <div class="container text-center">
                    <section class="error-404 not-found">
                        <h1 class="title-404 text-main-color">
                            <?php esc_html_e( '404', 'nilelogistics' ); ?>
                        </h1>
                        <header class="page-header">
                            <h1 class="page-title text-main-color">
                                <?php esc_html_e( 'Упс! Страница не найдена', 'nilelogistics' ); ?>
                            </h1>
                        </header>
                        <!-- .page-header -->

                        <div class="page-content-out">
                            <p>
                                <?php esc_html_e( 'Воспользуйтесь поиском', 'nilelogistics' ); ?>
                            </p>
                            <?php get_search_form();?>
                        </div>

                        <!-- .page-content -->
                    </section>
                    <!-- .error-404 -->
                </div>
                <!-- #main -->
            </div>
            <!-- #primary -->
            <div class="clearfix"></div>
        </div>
    </div>
    <?php
get_footer();
