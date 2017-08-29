
jQuery(document).ready( function($) {

    $(window).scroll(function (event) {
        var top = $('.testis').offset().top,
            bottom = top + $('.testis').outerHeight(),
            //hero = $('.testis').outerHeight(), // 1000
            container = $(".subscribe-form-section").offset().top;  //15000
        if ( bottom >= container){
            $('.testis').css('opacity', 0);
        }else{
            $('.testis').css('opacity', 1);
        }

    });

});

