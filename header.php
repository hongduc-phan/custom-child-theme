<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nilelogistics
 */

?>
    <!doctype html>
    <html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179232796-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-179232796-1');
        </script>

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
           (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
           m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
           (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
         
           ym(55614757, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
           });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/55614757" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->

        <meta name="yandex-verification" content="8147e1bfc61d3c14" />
        <meta name="google-site-verification" content="IYul5Q5I-MN18_gVmMGnCb08fkwEGlFk7b0GdUAh_zo" />

        <?php wp_head(); ?>
        
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
        <script>
        window.addEventListener("load", function(){
        window.cookieconsent.initialise({
          "palette": {
            "popup": {
              "background": "#e53935"
            },
            "button": {
              "background": "#ffffff"
            }
          },
          "content": {
            "message": "Для повышения удобства сайта мы используем cookies. Оставаясь на сайте, вы соглашаетесь с",
            "dismiss": "Принять",
            "link": "политикой их применения.",
            "href": "/tietosuojaseloste/"
          }
        })});
        </script>
        
    </head>

    <body <?php body_class(); ?>>

        <script>
        document.addEventListener( 'wpcf7mailsent', function( event ) {
            location = '/kiitos/';
        }, false );
        </script>
        
        <button onclick="topFunction()" id="btnBackTop" title="Back to top"><i class="fa fa-arrow-up" style="font-size:32px;color:#fff;"></i></button>
        
        <?php
            /* header for page */
			if (function_exists('niletheme_header_layout')) {
				niletheme_header_layout();
			}
			else{
				get_template_part('inc/header/header', 'default');
			}
						
		?>
