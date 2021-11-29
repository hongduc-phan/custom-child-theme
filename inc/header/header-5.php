<?php 
    global $niletheme_option , $niletheme_meta ; 
    if($niletheme_option['niletheme-header-quoteLink'] == '1'){
        $menu_class="col-lg-7 col-md-12";
    }else{
        $menu_class="col-lg-9 col-md-12";
    }

?>



<header>
    <div class="header-output">
        <div class="header-output">

            <!-- Up Head -->
            <?php if($niletheme_option['niletheme-toolbar'] == '1'){ ?>
            <div class="up-head d-none d-lg-block background-grey-4">
                <div class="container">

                    <div class="row">
                        <div class="col-xl-8 col-lg-12">
                            <div class="row">
                                 <div class="col-md-3"><i class="fa fa-phone margin-right-10px"></i>
                                    <?php echo esc_html($niletheme_option['telphone']); ?>
                                </div>
                                <div class="col-md-3"><i class="fa fa-envelope-o margin-right-10px"></i>
                                    <?php echo esc_html($niletheme_option['email']); ?>
                                </div>
                                <div class="col-md-3"><i class="fa fa-map-marker margin-right-10px"></i>
                                    <?php echo esc_html($niletheme_option['location']); ?>
                                </div>
                                <div class="col-md-3"><i class="fa fa-search margin-right-10px"></i>
                                    <a href="#search"><i class="fa fa-search margin-right-10px"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 d-none d-xl-block">
                            <div class="row">
                                <div class="col-lg-6">

                                </div>

                                <div class="col-lg-6">
                                    <!--  Social -->
                                    <ul class="social-media list-inline text-right margin-0px text-white">
                                        <?php niletheme_social_links(); ?>
                                    </ul>
                                    <!-- // Social -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php } ?>
            <!-- // Up Head -->


            <div class="position-relative background-main-color">
                <div class="container">
                    <div class="header-in">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">
                                <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="d-inline-block margin-tb-15px"><img src="<?php
							  if(is_page() && !empty($niletheme_meta['custom_header'])){
								  echo esc_url($niletheme_meta['main_logo']['url']);
							  }
							  else{
								  echo esc_url($niletheme_option['main_logo']['url']);
							  }
							  ?>" alt="<?php echo esc_attr(get_bloginfo ('name')); ?>"></a>
                                <a class="mobile-toggle padding-15px background-second-color border-radius-3" href="#"><i class="fa fa-bars"></i></a>
                            </div>
                            <div class="<?php echo esc_html($menu_class) ?>  position-inherit">

                                <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu_id'  => 'menu-main',
                                'menu_class' => 'nav-menu float-xl-left text-lg-center link-padding-tb-25px white-link dropdown-dark' ,
                                'container' => false,
                                'depth' => 3, 
                                'fallback_cb'=> false								
                            ) );
                        ?>


                                    <!-- cart button -->
                                    <?php if($niletheme_option['niletheme-cart-button'] == '1'){ ?>
                                    <?php if(class_exists('Woocommerce')){ ?>
                                    <div class="d-none d-xl-block pull-right model-link margin-top-15px">
                                        <a id="cart-link" class="model-link margin-right-25px text-white opacity-hover-8" href="#">
                                        <span><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'nilelogistics' ), WC()->cart->cart_contents_count ); ?></span><i class="fa fa-shopping-cart"></i>
                                    </a>
                                        <div class="cart-model">
                                            <div class="woocommerce">
                                                <div class="widget_shopping_cart">
                                                    <div class="widget_shopping_cart_content">
                                                        <?php woocommerce_mini_cart(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }  } ?>
                                    <!-- ُ End cart button -->

                                    <?php if($niletheme_option['niletheme-search-button'] == '1'){ ?>
                                    <div class="d-none d-xl-block search-link pull-right model-link margin-top-15px">
                                        <a id="search-header" class="model-link margin-right-0px text-white opacity-hover-8" href="#search">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                    <?php } ?>
                                    <!-- ُ End search -->
                            </div>

                            <!-- Get A Quote -->
                            <?php if($niletheme_option['niletheme-header-quoteLink'] == '1'){ ?>
                            <div class="col-lg-2 col-md-12  d-none d-lg-block">
                                <a href="#" class="btn btn-sm border-radius-30 margin-tb-20px text-white  background-grey-4  box-shadow float-right padding-lr-20px margin-left-30px d-block">
                          <?php esc_html_e('Jälleenmyyjille', 'nilelogistics'); ?>
                        </a>
                            </div>
                            <?php } ?>
                            <!-- End Get A Quote -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- // Header  -->



<!-- Search  -->
<div id="search">
    <button type="button" class="close">×</button>
    <form id="searchform" role="search" method="get" class="search-form clearfix d-block" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="search" class="search-field" placeholder="<?php esc_attr_e ( 'Search...', 'nilelogistics' ) ?>" value="" name="s" title="<?php esc_attr_e( 'Search for:', 'nilelogistics' ) ?>" required>
        <input type="submit" class="search-submit btn btn-primary" value="<?php esc_attr_e( 'Search', 'nilelogistics' ) ?>" />
    </form>
</div>
<!-- // Search  -->
