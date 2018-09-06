jQuery(document).ready(function () {  
    jQuery('.accessories').bxSlider({
        mode: 'horizontal',
        moveSlides: 1,
        slideMargin: 20,
        infiniteLoop: true,
        slideWidth: 660,
        minSlides: 8,
        maxSlides: 8,
        speed: 800,
    });
    jQuery('.proddetail-slide').bxSlider({
        mode: 'fade',
        moveSlides: 1,
        slideMargin: 20,
        infiniteLoop: true,
        slideWidth: 660,
        minSlides: 1,
        maxSlides: 1,
        speed: 800,
    });
var screen_width = $(document).width();
    if(screen_width < 767){

    }
    else {
        
    }    
});