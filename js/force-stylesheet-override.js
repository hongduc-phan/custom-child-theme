(function($){
        
    jQuery( '.bellows.bellows-skin-vanilla .bellows-nav .bellows-item-level-0.bellows-active > .bellows-target').each(function () {
        this.style.setProperty( 'background-color', '#676767', 'important' );
    });
    
    jQuery( '.bellows.bellows-skin-vanilla .bellows-nav .bellows-submenu .bellows-current-menu-item > .bellows-target ').each(function () {
        this.style.setProperty( 'background-color', '#676767', 'important' );
    });
    
    /*
    jQuery( '.background-second-color').each(function () {
        this.style.setProperty( 'background-color', '#a0a0a0', 'important' );
    });
    */
    
})(jQuery);

/* Non-css-override-code... */

// Tekstimuutokset (EN -> FI)
jQuery("a.nile-bottom.sm ").text("Подробнее");
jQuery("a.readmore.text-white").text("Подробнее");

jQuery("span.wasf").text("Lisää uutisia");

jQuery(".contact-info-map h2.title").text("");
jQuery(".contact-info-map span.title-in").text("");


jQuery("ul.pagination li a").each(function() {
    var text = jQuery(this).html();
    text = text.replace("« Previous Page", "«");
    jQuery(this).html(text);
});

jQuery("ul.pagination li a").each(function() {
    var text = jQuery(this).html();
    text = text.replace("Next Page »", "»");
    jQuery(this).html(text);
});



// Back to Top-nappula
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("btnBackTop").style.display = "block";
  } else {
    document.getElementById("btnBackTop").style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}