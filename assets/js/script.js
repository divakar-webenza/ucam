jQuery(document).ready(function () {
//     $('.count').each(function() {
//     $(this).prop('Counter', 0).animate({
//         Counter: $(this).text()
//     }, {
//         duration: 4000,
//         easing: 'swing',
//         step: function(now) {
//             $(this).text(Math.ceil(now));
//         }
//     });
// });
    // var maxmegaHeight, maxnewsHeight = -1;
    // $(".events-wrapper > .row > div").each(function(){
    //   maxmegaHeight = maxmegaHeight > $(this).height() ? maxmegaHeight : $(this).height();
    // });
    // $(".events-wrapper > .row > div").each(function(){
    //     $(this).height(maxmegaHeight);
    // });
    // $(".events-wrapper").height(maxmegaHeight);
    // $(".news-8 > .row > div").each(function(){
    //   maxnewsHeight = maxnewsHeight > $(this).height() ? maxnewsHeight : $(this).height();
    // });
    // $(".news-8 > .row > div").each(function(){
    //     $(this).height(maxnewsHeight);
    // });
    // console.log(((maxnewsHeight-25)/2)-50);
    // $(".news-wrap").height(((maxnewsHeight-25)/2)-50);
    /* height adjustment */
    jQuery('#menu-icon').on('click', function () {
        jQuery('.menu-main_manu-container').toggleClass('expand');
        return false;
    });
    var screen_width = jQuery(document).width();
    if (screen_width >= 992) {
        jQuery("#menu-main_manu > li").hover(function () {
            jQuery(this).find(".sub-menu").show();
        }, function () {
            jQuery(".sub-menu").hide();
        });
    } else {
        jQuery(".menu-main_manu-container li a").click(function () {
            var link = jQuery(this);
            var closest_ul = link.closest("ul");
            var parallel_active_links = closest_ul.find(".active");
            var closest_li = link.closest("li");
            var link_status = closest_li.hasClass("active");
            var count = 0;
            closest_ul.find("ul").slideUp(function () {
                if (++count == closest_ul.find("ul").length) {
                    parallel_active_links.removeClass("active");
                }
            });
            if (!link_status) {
                closest_li.children("ul").slideDown();
                closest_li.addClass("active");
            }
        });
    }
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 600) {
            jQuery(".getintouch-wrap").fadeIn();
        } else {
            jQuery(".getintouch-wrap").fadeOut();
        }
    });
    jQuery(".ucam-events-details .event-details:first-child").show();
    jQuery(".events-list li").click(function () {
        jQuery(".event-details").hide();
        var lst = "." + jQuery(this).attr("class") + "-details";
        jQuery(lst).fadeIn();
    });
    jQuery('.accordion .acc-head').click(function (e) {
        var dropDown = jQuery(this).closest('li').find('.acc-body');
        jQuery(this).closest('.accordion').find('.acc-body').not(dropDown).slideUp();
        if (jQuery(this).hasClass('active')) {
            jQuery(this).removeClass('active');
        } else {
            jQuery(this).closest('.accordion').find('.acc-body.active').removeClass('active');
            jQuery(this).addClass('active');
        }
        dropDown.stop(false, true).slideToggle();
        e.preventDefault();
    });
    jQuery(".prod-ucam").hover(function () {
        jQuery(this).parent().find('.line2').show();
    }, function () {
        jQuery(this).parent().find('.line2').hide();
    });
    jQuery(".acc-apply button").click(function () {
        var rowId = jQuery(this).data('rowid');
        //alert(rowId);
        jQuery(".careers-pop").fadeIn();
        jQuery('#wpcf7-f505-o1 form #designation').val(rowId);
    });
    jQuery(".model-brochure a").click(function () {
        var rowId = jQuery(this).data('rowid');
        //alert(rowId);
        jQuery(".careers-pop").fadeIn();
        jQuery('#wpcf7-f1365-o1 form #url').val(rowId);
    });
    jQuery(".close1").click(function () {
        jQuery(".careers-pop").hide();
    });
    jQuery(".getintouch_box").click(function () {
        jQuery(".getintouch-wrap").toggleClass("active");
    });
    jQuery("#comp-1, #comp-2, #comp-3, #comp-4").hover(function () {
        jQuery(".detail-comp-1, .detail-comp-2, .detail-comp-3, .detail-comp-4").hide();
        var c = "." + "detail" + "-" + jQuery(this).attr('id');
        jQuery(c).show();
    });
    jQuery(".company-wrap").mouseleave(function () {
        jQuery(".detail-comp-1, .detail-comp-2, .detail-comp-3, .detail-comp-4").hide();
    });
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery(".head").addClass("sticky");
        } else {
            jQuery(".head").removeClass("sticky");
        }
    });
    var $item = jQuery('.carousel-item');
    var $wHeight = jQuery(window).height();
    $item.eq(0).addClass('active');
    $item.height($wHeight);
    $item.addClass('full-screen');
    jQuery('.carousel img').each(function () {
        var $src = jQuery(this).attr('src');
        var $color = jQuery(this).attr('data-color');
        jQuery(this).parent().css({
            'background-image': 'url(' + $src + ')',
            'background-color': $color
        });
        jQuery(this).remove();
    });
    jQuery(window).on('resize', function () {
        $wHeight = jQuery(window).height();
        $item.height($wHeight);
    });
    jQuery('.carousel').carousel({
        interval: 6000,
        pause: "false"
    });
    jQuery(".supply-wrap button").click(function () {
        jQuery(".contact-pop").fadeIn();
    });
    jQuery(".close1").click(function () {
        jQuery(".contact-pop").hide();
    });
    jQuery(".close2").click(function () {
        jQuery(".getintouch-wrap").removeClass("active");
    });
});