//= include ./src/example/file.js

jQuery(document).ready( function($) {
    $('body').scrollTop(0);


    $(window).load(function () {
        $('.load-overlay').fadeOut('slow');
    });

    $('.hamburger').on('click', function(){

        closeOpen($(this));

    });


    $('.closeHamburger').on('click', function(){

        closeOpen($(this));

    });


    // Hide Header on on scroll down
    var didScroll;
    var lastST = 0;
    var delta = 5;
    var navbarHeight = $('header').outerHeight();

    $(window).scroll(function(event){
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = $(this).scrollTop();
        // Make sure they scroll more than delta
        if(Math.abs(lastST - st) <= delta){
            console.log(lastST);
            console.log(st);

            return;
        }

        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastST && st > navbarHeight){
            // Scroll Down
            $('header').removeClass('nav-down').addClass('nav-up');
        } else {
            // Scroll Up
            if(st + $(window).height() < $(document).height()) {
                $('header').removeClass('nav-up').addClass('nav-down');
            }
        }

        lastST = st;
    }

    var item = $('.active-hero-item').data('value');
    var long = $('#'+item).data('long');
    var lat = $('#'+item).data('lat');
    var map, marker;

    //console.log(lat);
    window.initMap = function() {
        var mapDiv = document.getElementById('map');
        var company =  {lat: parseFloat(lat), lng: parseFloat(long)};
        map = new google.maps.Map(mapDiv, {
            center: company,
            zoom: 16,
            scrollwheel: false


        });
        marker = new google.maps.Marker({
            position: company,
            map: map,
            title: $('.active-hero-item p').text()
        });
    }

    //Change map location
    $('.contact-hero-item').on('click', function() {
        var coordinates = String( $(this).data('value') );
        var id = coordinates.replace(/[\., () ,:-]+/g, "");
        //console.log(coordinates.replace(/[\., () ,:-]+/g, ""));
        var panPoint = new google.maps.LatLng($('#'+id).data('lat'), $('#'+id).data('long'));
        map.panTo(panPoint);
        marker.setPosition(panPoint);
        marker.setTitle( $(this).find('p').text() );
    });

    function closeOpen (a) {


        if (a.hasClass('is-active')) {
            $(".mobile-menu").fadeOut('fast');
            a.removeClass('is-active');
            $("body").css({
                height: 'auto',
                overflow: 'visible'
            });
            $('.hamburger').removeClass('is-active');
        }
        else {
            a.addClass('is-active');
            $(".mobile-menu").fadeIn('fast');
            $("body").css({
                height: '100%',
                overflow: 'hidden'
            });
            $('.closeHamburger').addClass('is-active');

        }
        //(function fadeNext(collection){
        //    collection.eq(0).fadeIn(100,  function(){
        //        (collection=collection.slice(1)).length
        //        && fadeNext(collection)
        //    });
        //})($('.mobile-menu-content li'))
    }


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
        var pw = $('.people-grid-image').width();
        $('.people-grid-image').css({'height':pw+'px'});

        var hw = $('.product-grid-content').width();
        $('.product-grid-content').css({'height':hw+'px'});
    });

    //Set height and width of people images
    var cw = $('.about-grid-content').width();
    $('.about-grid-content').css({'height':cw+'px'});

    var pw = $('.people-grid-image').width();
    $('.people-grid-image').css({'height':pw+'px'});

    var hw = $('.product-grid-content').width();
    $('.product-grid-content').css({'height':hw+'px'});


    //Hide non-active people on pageload
    $('.js-cone-grid-content').each(function () {
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
        $('.js-cone-grid-content').each(function () {
            if ( $(this).hasClass(activeItem) ) {
                $(this).fadeIn('slow');
            }else{
                $(this).hide();
            }
        });
    });

    $('body').on('click', '.change-productline',function () {
        $('.active-hero-item').siblings('.hero-item').trigger('click');        
    });

    // Open biography-modal
    $('body').on('click', '.people-grid-content', function () {
        var name = $(this).find('.people-grid-text h4').text();
        var text = $(this).find('.hidden-biography').val();
        $('body').prepend( modalHTML(name,text) );
    });

    //Close modal
    $('body').on('click', '.modal i', function () {
        $('.modal-section').remove();
    });
    $('body').keyup(function(e) {
        if (e.keyCode === 27) $('.modal-section').remove();   // esc
    });

    //Close modal on click outside
    $('body').on('click', '.modal-section', function () {
        if (!$(event.target).closest(".modal").length) $('.modal-section').remove();
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

