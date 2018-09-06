jQuery(document).ready(function () {
// var  k = (function () { 
jQuery('.count.active').each(function () {
            jQuery(this).prop('Counter', 0).animate({
                Counter: jQuery(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    jQuery(this).text(Math.ceil(now));
                }
            });
        });

  // });


var waypoint1 = new Waypoint({
    element: document.getElementById("hm3"),
    handler: function(direction) {
        console.log("ffffff");
        jQuery('.count').addClass("active");
    },
  offset: 300 
});



});