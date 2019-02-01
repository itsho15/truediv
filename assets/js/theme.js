/* ------------------------------------

Template Name: trueDiv
Description: Responsive HTML5 / CSS3 Template
Version: 1.0
Author: Ahmed El-agamy

Table of Content :

01 Remove Placeholder
02 Navigation
03 Mobile navigation

-------------------------------------- */

(function ($) {

    "use strict";

    /* --------------------
		1- Remove PlaceHolder.
	----------------------- */
    $('input,textarea').focus(function () {
        $(this).data('placeholder', $(this).attr('placeholder'))
            .attr('placeholder', '');
    }).blur(function () {
        $(this).attr('placeholder', $(this).data('placeholder'));
    });

    /* --------------------
		2- Navigation.
	----------------------- */
    function tdNavigation() {
        var nomegaMenuItem = $('#td-nav .nomega-menu-item'),
            megaMenuItem = $('#td-nav .mega-menu-item');

        nomegaMenuItem.hover(function () {
            $(this).children('ul').stop(true, false, true).toggleClass('menu-active');
        });

        megaMenuItem.hover(function () {
            $(this).children('ul').stop(true, false, true).toggleClass('menu-active');
        });

    }
    tdNavigation();

    /* --------------------
		2- Scroll to Top.
	----------------------- */
    $(window).scroll(function () {

        if ($(window).scrollTop() > +600) {
            $('#td-back-to-top').addClass("td-back-to-top-active");
        } else {
            $('#td-back-to-top').removeClass("td-back-to-top-active");
        }
    });
    
    /* -----------------------
		5- Sticky Header
	-------------------------- */
    $(document).ready(function () {
        
        var lastScroll = 5;
        
        $(window).scroll(function (event) {
            
            var st = $(this).scrollTop();
            
            if (Math.abs(lastScroll - st) <= 0)
                return;

            if (st < lastScroll) {
                $(".sticky-opt").addClass('sticky-on');
                $(".td-logo .logo-sticky").addClass('logo-on');
                
                if ($(window).scrollTop() == 0) {
                    $(".sticky-opt").removeClass('sticky-on');
                $(".td-logo .logo-main").removeClass('logo-off');
                $(".td-logo .logo-sticky").removeClass('logo-on');
                }
    
            } else {
                $(".sticky-opt").removeClass('sticky-on');
                $(".td-logo .logo-main").addClass('logo-off');
                $(".td-logo .logo-sticky").removeClass('logo-off');
            }

            lastScroll = st;
        });
    });
    
    
    /* ----------------------------------------------------
		2- Loader.
	------------------------------------------------------- */
    $(document).ready(function () {
        setTimeout(function () {
            $('body').addClass('loaded');
        }, 3000);

    });

})(jQuery);
