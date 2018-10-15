

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
})(jQuery);


