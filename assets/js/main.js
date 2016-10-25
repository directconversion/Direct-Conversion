//= include ./src/example/file.js

jQuery(document).ready( function($) {

    var lastScrollTop = $(window).scrollTop();

    $(window).scroll(function(){
        var scrollAmt = $(this).scrollTop();
        var deltaS = scrollAmt - lastScrollTop;
        $('.hero-content').css({
            bottom: "-=" + deltaS/4.5,
            opacity: "-=" + deltaS/700
        });
        lastScrollTop = scrollAmt;
    });

    var cw = $('.about-grid-content').width();
    $('.about-grid-content').css({'height':cw+'px'});

    var hw = $('.people-grid-image').width();
    $('.people-grid-image').css({'height':hw+'px'});
});
