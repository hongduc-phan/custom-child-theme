<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package nilelogistics
 */


/*-----------------------------------------------------------------------------------*/
# Adds custom classes to the array of body classes.
/*-----------------------------------------------------------------------------------*/
function niletheme_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'niletheme_body_classes' );

function niletheme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'niletheme_pingback_header' );



/*-----------------------------------------------------------------------------------*/
# SVG Upload
/*-----------------------------------------------------------------------------------*/

function niletheme_add_svg_to_upload_mimes( $upload_mimes ) { 
	$upload_mimes['svg'] = 'image/svg+xml'; 
	$upload_mimes['svgz'] = 'image/svg+xml'; 
	return $upload_mimes; 
} 
add_filter( 'upload_mimes', 'niletheme_add_svg_to_upload_mimes', 10, 1 );



/*-----------------------------------------------------------------------------------*/
# google fonts url
/*-----------------------------------------------------------------------------------*/
function niletheme_fonts_url() {
	$fonts_url = '';
	$raleway = _x( 'on', 'Raleway font: on or off', 'nilelogistics' );
    $poppins = _x( 'on', 'lora font: on or off', 'nilelogistics' );
    $playfair = _x( 'on', 'Playfair Semi Condensed font: on or off', 'nilelogistics' );
    $fira = _x( 'on', 'Fira Sans Condensed font: on or off', 'nilelogistics' );

	if ( 'off' !== $raleway || 'off' !== $poppins || 'off' !== $playfair ) {
		$font_families = array();

        if ( 'off' !== $raleway ) {
            $font_families[] = 'Raleway:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
        }

		if ( 'off' !== $poppins ) {
			$font_families[] = 'Poppins:100,200,100i,300,300i,400,400i,500,500i,600,600i,700,700i,900,900i';
		}
		
		if ( 'off' !== $playfair ) {
			$font_families[] = 'Playfair Display:400,700,900';
		}
		if ( 'off' !== $fira ) {
			$font_families[] = 'Fira Sans:400,500,600,700';
		}

		$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}


/*-----------------------------------------------------------------------------------*/
# Sub Menu  Class
/*-----------------------------------------------------------------------------------*/
add_filter( 'wp_nav_menu_objects', 'niletheme_add_menu_parent_class' );
function niletheme_add_menu_parent_class( $items ) {
	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'has-dropdown';
		}
	}
	return $items;
}


/*-----------------------------------------------------------------------------------*/
# Nav Menu Active Class
/*-----------------------------------------------------------------------------------*/
function niletheme_special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
add_filter('nav_menu_css_class' , 'niletheme_special_nav_class' , 10 , 2);


/*-----------------------------------------------------------------------------------*/
# Footer
/*-----------------------------------------------------------------------------------*/
function niletheme_footer() {
	global $niletheme_option, $niletheme_meta;
	/* header for page */
	if(is_page() && !empty($niletheme_meta['custom_footer'])){
		get_template_part('inc/footer/footer', $niletheme_meta['footer_layout']);
	}
	else{
		get_template_part('inc/footer/footer', $niletheme_option['footer_layout']);
	}
}

/*-----------------------------------------------------------------------------------*/
# Links  Category of Posts
/*-----------------------------------------------------------------------------------*/
 function niletheme_post_category($separator) {

 		$first_time = 1;
 		foreach((get_the_category()) as $category) {
 			if ($first_time == 1) {
 				echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . sprintf( esc_attr__( "View all posts in %s", "nilelogistics" ), $category->name ) . '" ' . '>'  . $category->name.'</a>';
 				$first_time = 0;
 			} else {
 				echo esc_html($separator). '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . sprintf( esc_attr__( "View all posts in %s", "nilelogistics" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
 			}
 		}

 }

// Category Style Field
add_filter('category_edit_form_fields', 'niletheme_category_fields');
add_filter('category_add_form_fields', 'niletheme_category_fields');
function niletheme_category_fields($tag) {
    $t_id = $tag->term_id;
    $cat_meta = get_option( "category_$t_id");
    ?>
	<div class="form-table">
		<div class="form-field">
			<div scope="row" valign="top"><label for="Cat_meta[layout]"><?php esc_html_e('Category Layout', 'nilelogistics'); ?></label></div>
			<div>
				<select name="Cat_meta[layout]" id="Cat_meta[layout]">
                    <option value="standard_layout" <?php echo (esc_html($cat_meta['layout']) == "standard_layout") ? 'selected="selected"': ''; ?>><?php esc_html_e('Standard Layout (Right Sidebar)', 'nilelogistics'); ?></option>
						
                    <option value="left_sidebar" <?php echo (esc_html($cat_meta['layout']) == "left_sidebar") ? 'selected="selected"': ''; ?>><?php esc_html_e('Left Sidebar', 'nilelogistics'); ?></option>
						
                    <option value="no_sidebar" <?php echo (esc_html($cat_meta['layout']) == "no_sidebar") ? 'selected="selected"': ''; ?>><?php esc_html_e('No Sidebar', 'nilelogistics'); ?></option>

				</select>
				<p class="description">
					<?php esc_html_e( 'Select Category Layout', 'nilelogistics' ); ?>
				</p>
			</div>
		</div>
	</div>
	<?php
}
add_action ( 'edited_category', 'niletheme_save_extra_category_fileds');
add_action ( 'create_category', 'niletheme_save_extra_category_fileds');
function niletheme_save_extra_category_fileds( $term_id ) {
    if ( isset( $_POST['Cat_meta'] ) ) {
        $t_id = $term_id;
        $cat_meta = get_option( "category_$t_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['Cat_meta'][$key])){
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        //save the option array
        update_option( "category_$t_id", $cat_meta );
    }
}



/*-----------------------------------------------------------------------------------*/
# Social Media Links
/*-----------------------------------------------------------------------------------*/
function niletheme_social_links() {
    global $niletheme_option;
    $header_social = $niletheme_option['niletheme_top_social']['enabled'];
    if ($header_social): foreach ($header_social as $key=>$value) {
        switch($key) {

            case 'facebook': echo '<li class="list-inline-item"><a target="_blank" href="'.esc_url($niletheme_option['social_facebook_url']).'"><i class="fa fa-facebook-f"></i></a></li>';
            break;

            case 'twitter': echo '<li class="list-inline-item"><a href="'.esc_url($niletheme_option['social_twitter_url']).'"><i class="fa fa-twitter"></i></a></li>';
            break;

            case 'google': echo '<li class="list-inline-item"><a href="'.esc_url($niletheme_option['social_google_url']).'"><i class="fa fa-google-plus"></i></a></li>';
            break;

            case 'linkedin': echo '<li class="list-inline-item"><a target="_blank" href="'.esc_url($niletheme_option['social_inkedin_url']).'"><i class="fa fa-linkedin"></i></a></li>';
            break;

            case 'rss': echo '<li class="list-inline-item"><a href="'.esc_url($niletheme_option['social_rss_url']).'"><i class="fa  fa-rss"></i></a></li>';
            break;

            case 'instagram': echo '<li class="list-inline-item"><a href="'.esc_url($niletheme_option['social_instagram_url']).'"><i class="fa fa-instagram"></i></a></li>';
            break;

            case 'skype': echo '<li class="list-inline-item"><a href="'.esc_url($niletheme_option['social_skype_url']).'"><i class="fa fa-skype"></i></a></li>';
            break;

            case 'pinterest': echo '<li class="list-inline-item"><a href="'.esc_url($niletheme_option['social_pinterest_url']).'"><i class="fa fa-pinterest"></i></a></li>';
            break;

            case 'vimeo': echo '<li class="list-inline-item"><a  href="'.esc_url($niletheme_option['social_vimeo_url']).'"><i class="fa fa-vimeo-square"></i></a></li>';
            break;

            case 'youtube': echo '<li class="list-inline-item"><a  href="'.esc_url($niletheme_option['social_youtube_url']).'"><i class="fa fa-youtube"></i></a></li>';
            break;

            case 'yelp': echo '<li class="list-inline-item"><a  href="'.esc_url($niletheme_option['social_yelp_url']).'"><i class="fa fa-yelp"></i></a></li>';
            break;

            case 'tumblr': echo '<li class="list-inline-item"><a href="'.esc_url($niletheme_option['social_tumblr_url']).'"><i class="fa fa-tumblr"></i></a></li>';
            break;

        }
    }
    endif;
}







 /**
 * Pagination
 */
function niletheme_pagination() {
	global $wp_query;

	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="niletheme-pagination"><ul class="pagination">' . "\n";

	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>...</li>';
	}

	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>...</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul><div class="clear"></div></div>' . "\n";

}



/*-----------------------------------------------------------------------------------*/
# Archive Title
/*-----------------------------------------------------------------------------------*/

add_filter( 'niletheme_get_the_archive_title', function ($title) {

    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }
    return $title;

});


/*-----------------------------------------------------------------------------------*/
# Customizer Css
/*-----------------------------------------------------------------------------------*/


	function niletheme_customizer_css() {
            global $niletheme_option, $niletheme_meta;

    ?>
		<style>
			[type=submit],
			.ba-main-color,
			.features-1 .features-item .tfassel .cat a,
			.features-2 .features-item .tfassel .cat a,
			.features-3 .features-item .tfassel .cat a,
			.features-3 .features-item .tfassel a.title,
			.section-img-text-1 .cart-img .tfassel a.more:before,
			.project-item-1 .hover-option a.more:before,
			.section-clients-1 .client-item h4:before,
			.post-list .thum .icon span,
			.post-grid.layout-2 .icon-in span,
			.post-grid .thum .icon span,
			.post-standard .thum .icon span,
			.nile-widget.widget_mc4wp_form_widget .mc4wp-form input[type="submit"],
			.nile-widget.widget_calendar #wp-calendar tbody td:hover,
			.nile-widget form.search-form input.search-submit,
			.nile-widget .about-me a.bot,
			.owl-pagination .owl-page.active span,
			.posts-output .nile-buttom.load-more,
			#comments input.submit,
			header a.nav-bottom,
			header a.model-link span,
			.cart-model a.btn-outline-primary:hover,
			footer .nile-widget.layout-1 .title:before,
			#back-to-top,
			.woocommerce .widget_shopping_cart .woocommerce-mini-cart__buttons a.button,
			.vc_post-grid .thum .icon span,
			.woocommerce span.onsale,
			.niletheme-pagination ul.pagination li.active a,
			.background-main-color,
			a.nile-bottom,
			.service.layout-2,
			.price-table.active,
			a.action-bottom:hover,
			.blog-item .date span.day {
				background-color: <?php if(is_page() && !empty($niletheme_meta['custom_style'])) {
					echo esc_attr($niletheme_meta['primary_color']);
				}
				else {
					echo esc_attr($niletheme_option['primary_color']);
				}
				?>;
			}

			.text-main-color,
			.section-projects-slider .niletheme-section-title a.title-link,
			.section-masonry-blog .niletheme-section-title a.title-link,
			.post-masonry .post-image .img_in:after,
			.post-masonry .post-video .img_in:after,
			.tabs-filter ul li.active,
			.tabs-filter ul li:hover,
			.post-list .post-info .cats a,
			.post-grid .post-info .cats a,
			.post-standard .post-info .cats a,
			.nile-widget.widget_mc4wp_form_widget .mc4wp-form label:before,
			.nile-widget .lastet-Posts-slider .post .cats a,
			.post-cats a,
			footer .nile-widget.widget_recent_entries ul li a:hover,
			footer .nile-widget.widget_recent_comments ul#recentcomments li a:hover,
			footer .nile-widget.widget_archive ul li a:hover,
			footer .nile-widget.widget_categories ul li a:hover,
			footer .nile-widget.widget_meta ul li a:hover,
			.niletheme-section-title a.title-link,
			.woocommerce div.product p.price,
			.woocommerce div.product span.price {
				color: <?php if(is_page() && !empty($niletheme_meta['custom_style'])) {
					echo esc_attr($niletheme_meta['primary_color']);
				}
				else {
					echo esc_attr($niletheme_option['primary_color']);
				}
				?>!important;
			}

			.tabs-filter ul li.active,
			.section-projects-slider .niletheme-section-title a.title-link,
			.section-masonry-blog .niletheme-section-title a.title-link,
			.tabs-filter ul li.active,
			.tabs-filter ul li:hover,
			.cart-model a.btn-outline-primary,
			.niletheme-section-title a.title-link,
			.sticky-post,
			.niletheme-section-title .sub_title {
				border-color: <?php if(is_page() && !empty($niletheme_meta['custom_style'])) {
					echo esc_attr($niletheme_meta['primary_color']);
				}
				else {
					echo esc_attr($niletheme_option['primary_color']);
				}
				?>!important;
			}

			.ba-second-color,
			.background-second-color,
			a.bottom-effect:hover,
			.cart-model a.btn-primary,
			#back-to-top:hover,
			.woocommerce .widget_shopping_cart .woocommerce-mini-cart__buttons a.button.checkout {
				background-color: <?php if(is_page() && !empty($niletheme_meta['custom_style'])) {
					echo esc_attr($niletheme_meta['second_color']);
				}
				else {
					echo esc_attr($niletheme_option['second_color']);
				}
				?>!important;
			}

			.owl-theme .owl-controls .owl-page span {
				background: <?php if(is_page() && !empty($niletheme_meta['custom_style'])) {
					echo esc_attr($niletheme_meta['second_color']);
				}
				else {
					echo esc_attr($niletheme_option['second_color']);
				}
				?>!important;
			}

			.text-second-color {
				color: <?php if(is_page() && !empty($niletheme_meta['custom_style'])) {
					echo esc_attr($niletheme_meta['second_color']);
				}
				else {
					echo esc_attr($niletheme_option['second_color']);
				}
				?>!important;
			}

			a.bottom-effect:hover,
			header.layout-5,
			.nile-widget-area .nile-widget {
				border-color: <?php if(is_page() && !empty($niletheme_meta['custom_style'])) {
					echo esc_attr($niletheme_meta['second_color']);
				}
				else {
					echo esc_attr($niletheme_option['second_color']);
				}
				?>!important;
			}

			.niletheme-section-title a.title-link:hover {
				color: #fff !important;
				border-color: <?php if(is_page() && !empty($niletheme_meta['custom_style'])) {
					echo esc_attr($niletheme_meta['second_color']);
				}
				else {
					echo esc_attr($niletheme_option['second_color']);
				}
				?>!important;
				background-color: <?php if(is_page() && !empty($niletheme_meta['custom_style'])) {
					echo esc_attr($niletheme_meta['second_color']);
				}
				else {
					echo esc_attr($niletheme_option['second_color']);
				}
				?>!important;
			}


			/*---------- Woocommerce ----------*/

			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt {
				background-color: <?php if(is_page() && !empty($niletheme_meta['custom_style'])) {
					echo esc_attr($niletheme_meta['primary_color']);
				}
				else {
					echo esc_attr($niletheme_option['primary_color']);
				}
				?>;
			}

			@media only screen and (max-width: 991px) {

				#comments ol.comment-list li .comment-body .reply a {
					color: <?php if(is_page() && !empty($niletheme_meta['custom_style'])) {
						echo esc_attr($niletheme_meta['primary_color']);
					}
					else {
						echo esc_attr($niletheme_option['primary_color']);
					}
					?>!important;
				}
			}

			.niletheme-section-title.style_light .sub_title {
				border-color: #fff !important;
			}

		</style>
		<?php
}
add_action( 'wp_head', 'niletheme_customizer_css' );
