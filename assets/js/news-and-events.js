$(document).ready(function () {
var screen_width = jQuery(document).width();
    if(screen_width < 767){
    jQuery('.news-ucam-wrap').bxSlider({
        mode: 'horizontal',
        moveSlides: 1,
        slideMargin: 20,
        infiniteLoop: true,
        slideWidth: 250,
        minSlides: 1,
        maxSlides: 1,
        speed: 800,
    });
    }
    else {
      jQuery('.news-ucam-wrap').bxSlider({
        mode: 'horizontal',
        moveSlides: 1,
        slideMargin: 20,
        infiniteLoop: true,
        slideWidth: 660,
        minSlides: 4,
        maxSlides: 4,
        speed: 800,
    });  
    } 
});