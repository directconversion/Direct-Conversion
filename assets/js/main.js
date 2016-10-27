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

    $(window).on('resize', function (){
        var hw = $('.people-grid-image').width();
        $('.people-grid-image').css({'height':hw+'px'});
    });

    //Set height and width of people images
    var cw = $('.about-grid-content').width();
    $('.about-grid-content').css({'min-height':cw+'px'});

    var hw = $('.people-grid-image').width();
    $('.people-grid-image').css({'height':hw+'px'});

    //Hide non-active people on pageload
    $('.people-grid-content').each(function () {
        var activeItem = $('.active-hero-item').data('value');
        if ( $(this).hasClass(activeItem) ) {
            $(this).fadeIn('slow');
        }else{
            $(this).hide();
        }
    });

    // Our People change people on menuitem click
    $('body').on('click', '.hero-item', function () {
        var activeItem = $(this).data('value');
        $('.hero-item').removeClass('active-hero-item');
        $(this).addClass('active-hero-item');
        $('.people-grid-content').each(function () {
            if ( $(this).hasClass(activeItem) ) {
                $(this).fadeIn('slow');
            }else{
                $(this).hide();
            }
        });
    });

    // Open biography-modal
    $('body').on('click', '.people-grid-content', function () {
        event.stopPropagation();
        var name = $(this).find('.people-grid-text h4').text();
        var text = $(this).find('.hidden-biography').val();
        $('body').prepend( modalHTML(name,text) );
    });

    //Close modal
    $('body').on('click', '.modal i', function () {
        $('.modal-section').remove();
    });

    //Close modal on click outside
    $('body').on('click', '.modal-section', function () {
        if (event.target.className != 'modal') $('.modal-section').remove();
    });

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

function modalHTML(name,text){
    var html =
        '<div class="modal-section">' +
            '<div class="modal">' +
                '<i class="material-icons">close</i>' +
                '<h2>'+ name + '</h2>'+
                '<p>'+ text +'</p>' +
            '</div>' +
        '</div>';

    return html;

}


