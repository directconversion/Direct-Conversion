//= include ./src/example/file.js

jQuery(document).ready( function($) {

    $(window).load(function () {
        $('.load-overlay').fadeOut('slow');
    });


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


    (function($) {

        $.fn.visible = function(partial) {

            var $t            = $(this),
                $w            = $(window),
                viewTop       = $w.scrollTop(),
                viewBottom    = viewTop + $w.height(),
                _top          = $t.offset().top,
                _bottom       = _top + $t.height(),
                compareTop    = partial === true ? _bottom : _top,
                compareBottom = partial === true ? _top : _bottom;

            return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

        };

    })(jQuery);

    var win = $(window);

    var allMods = $(".slide-effect");

    allMods.each(function(i, el) {
        var el = $(el);
        if (el.visible(true)) {
            el.addClass("already-visible");
        }
    });

    win.scroll(function(event) {

        allMods.each(function(i, el) {
            var el = $(el);
            if (el.visible(true)) {
                el.addClass("come-in");
            }
        });

    });
});

