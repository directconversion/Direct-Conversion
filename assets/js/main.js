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

    //Set height and width of people images
    var cw = $('.about-grid-content').width();
    $('.about-grid-content').css({'height':cw+'px'});

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
        var name = $(this).find('.people-grid-text h4').text();
        var title = $(this).find('.people-grid-text p').text();
        var text = $(this).find('.hidden-biography').val();
        $('body').prepend( modalHTML(name,title,text) );
    });
});

function modalHTML(name, title,text){
    var html = '<div>' +
        '<h2>'+ name + ' - ' + title + '</h2>'+
        '<p>'+ text +'</p>' +
        '</div>';

    return html;

}