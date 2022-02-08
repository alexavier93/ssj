(function($) {
    'use strict'

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    /* ===================================
        Side Menu
    ====================================== */
    if ($("#sidemenu_toggle").length) {

        $("#sidemenu_toggle").on("click", function() {
            $(".pushwrap").toggleClass("active");
            $(".side-menu").addClass("side-menu-active"), $("#close_side_menu").fadeIn(700)
        }), $("#close_side_menu").on("click", function() {
            $(".side-menu").removeClass("side-menu-active"), $(this).fadeOut(200), $(".pushwrap").removeClass("active")
        }), $(".side-nav .navbar-nav").on("click", function() {
            $(".side-menu").removeClass("side-menu-active"), $("#close_side_menu").fadeOut(200), $(".pushwrap").removeClass("active")
        }), $("#btn_sideNavClose").on("click", function() {
            $(".side-menu").removeClass("side-menu-active"), $("#close_side_menu").fadeOut(200), $(".pushwrap").removeClass("active")
        });
    }

    // Navbar Scroll Function
    var $window = $(window);
    $window.scroll(function() {
        var $scroll = $window.scrollTop();
        var $navbar = $(".header-nav");
        if ($scroll > 80) {
            $navbar.addClass("fixed-menu");
        } else {
            $navbar.removeClass("fixed-menu");
        }

    });

    var fixTop = $('.fixed-content');

    if (fixTop.length) {
        var fixmeTop = fixTop.offset().top;


        $(window).scroll(function() { // assign scroll event listener

            var currentScroll = $(window).scrollTop(); // get current position

            if (currentScroll >= fixmeTop) { // apply position: fixed if you
                $('.fixed-content').css({ // scroll to that element or below it
                    top: '80px',
                    position: 'sticky',
                });
            } else { // apply position: static
                $('.fixed-content').css({ // if you scroll above it
                    position: 'static'
                });
            }

        });

    }


})(jQuery, window, document)