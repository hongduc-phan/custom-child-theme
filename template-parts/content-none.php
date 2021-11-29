<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nilelogistics
 */

?>

    <section class="no-results not-found padding-30px">
        <h2 class="page-title">
            <?php esc_html_e( 'Ничего не найдено', 'nilelogistics' ); ?>
        </h2>
        <!-- .page-header -->

        <div class="page-content">
            <?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'nilelogistics' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

                <p>
                    <?php esc_html_e( 'Извините, но по вашему запросу ничего не найдено. Пожалуйста, попробуйте использовать другие ключевые слова.', 'nilelogistics' ); ?>
                </p>
                <?php
			get_search_form();

		else :
			?>

                    <p>
                        <?php esc_html_e( '' ); ?>
                    </p>
                    <div class="search-none-page">
                        <?php get_search_form();?>
                    </div>
                    <?php

		endif;
		?>
        </div>
        <!-- .page-content -->
    </section>
    <!-- .no-results -->
