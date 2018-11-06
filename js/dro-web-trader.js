

(function ($) {

    'use strict';


    $(".main-navigation  .mobile-menu-container").append('<div class="mobile-menu"></div>');
    $(".main-menu").clone().appendTo(".main-navigation  .mobile-menu");

    $(".mobile-menu ul").css('display', 'block');

    // Add Toggle Dropdaown Icon
    $(".mobile-menu .main-menu").find('.menu-item-has-children').append('<span class="mks-dropdown-toggle fa fa-plus"></span>');

    $(".mobile-menu .main-menu").find('.sub-menu').slideToggle();

    $(".mobile-menu-icon").on("click", function () {
        $(".mobile-menu").slideToggle();
    });

    //dropdown toggle
    $(".mks-dropdown-toggle").on("click", function () {
        var parent = $(this).parent('li').children('.sub-menu');
        $(this).parent('li').children('.sub-menu').slideToggle();
        $(this).toggleClass('fa-minus');
        if ($(parent).find('.sub-menu').length) {
            $(parent).find('.sub-menu').slideUp();
            $(parent).find('.mks-dropdown-toggle').removeClass('fa-minus');
        }
    });

    $('.mobile-menu-container').find('.mobile-menu').append('<div class="menu-close"><i class="icon-close"></i></div>');
    $('.mobile-menu-container .main-menu').before($('.menu-close'));

    $('.mobile-menu-container .menu-close').on("click", function () {
        $(".mobile-menu").removeAttr("style");
    });

//
    if ($('.mobile-menu-icon').on('click', function () {
        $("body").addClass("mks-open");
    }))
        ;
    if ($('.menu-close').on('click', function () {
        $("body").removeClass("mks-open");
    }))
        ;
    $(window).resize(function () {
        if ($(window).width() > 992) {
            $("body").removeClass('mks-open');
            $(".mobile-menu").removeAttr("style");
        }
    });



    /* Stick navigation  */
    if ($('.main-navigation').hasClass('sticky-active')) {

        var stickyNavTop = $('.main-navigation').offset().top;
        $(window).scroll(function () {
            var scrollTop = $(window).scrollTop();

            if (scrollTop > stickyNavTop) {
                $('.main-navigation').addClass('sticky-header');
            } else {
                $('.main-navigation').removeClass('sticky-header');
            }

        });
    }

    /* Top Search Form */
    $(".search-toggle").click(function () {
        $('.search-toggle').toggleClass('active');
        $('.search-box').slideToggle('fast');
        // Optional return false to avoid the page "jumping" when clicked
        return false;
    });

    /* Scroll to the top*/
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    $('.scrollup').click(function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });

    /* Gallery caption text */
    $('.gallery-item').each(function () {
        $(this).has('figcaption').append('<span class="fa-stack fa-1x"><i class="fa fa-circle fa-stack-1x"></i><i class="fa fa-plus"></i></span>');
    });

})(jQuery);


