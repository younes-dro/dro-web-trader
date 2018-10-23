

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

    /* Top Search Form */
    $(".search-toggle").click(function () {
        var toggle = $('#site-navigation').hasClass('toggled');
        if (toggle === true) {
            $('#site-navigation').removeClass('toggled');
        }
        $("#search-container").slideToggle('fast', function () {
            $('.search-toggle').toggleClass('active');
        });
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
    $('.gallery-item').each(function(){
        $(this).has('figcaption').append('<span class="fa-stack fa-1x"><i class="fa fa-circle fa-stack-1x"></i><i class="fa fa-plus"></i></span>');
    });

})(jQuery);


