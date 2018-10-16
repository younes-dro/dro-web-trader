

(function ($) {

    'use strict';


    // Add Toggle Dropdaown Icon
    $(".nav-menu").find('.menu-item-has-children').append('<span class="mks-dropdown-toggle fa fa-plus "></span>');
    $(".nav-menu").find('.sub-menu').slideToggle();

    // Dropdown Toggle
    $(".mks-dropdown-toggle").on("click", function () {
        var parent = $(this).parent('li').children('.sub-menu');
        $(this).parent('li').children('.sub-menu').slideToggle();
        $(this).toggleClass('fa-minus');
        if ($(parent).find('.sub-menu').length) {
            $(parent).find('.sub-menu').slideUp();
            $(parent).find('.mks-dropdown-toggle').removeClass('fa-minus');
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
})(jQuery);


