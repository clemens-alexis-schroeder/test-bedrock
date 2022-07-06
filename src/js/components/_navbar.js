$(document).ready(function() {
    //home change header color on scroll
    // $(window).scroll(function() {
    //     var scroll = $(window).scrollTop();
    //     if (scroll >= 100) {
    //         $(".home .site-header").addClass('bg-white').removeClass('bg-none');
    //     } else {
    //         $(".home .site-header").removeClass('bg-white').addClass('bg-none');
    //     }
    // })


    //dropdown function
    $('.menu-top .menu-item-has-children').each(function() {
        $(this).children('a').addClass('dropdown-link');
    });
    $('.dropdown-link').each(function() {
        $(this).click(function(e) {
            e.preventDefault();

            $(".dropdown-link").next().not($(this).next()).removeClass('dropdown');
            $(".dropdown-link").next().not($(this).next()).slideUp();
            if ($(this).next().hasClass('dropdown')) {
                $(this).next().removeClass('dropdown');
                $(this).next().slideUp();
            } else {
                $(this).next().addClass('dropdown');
                $(this).next().slideDown();
            }
        });
    })
    // //close dropdown if click on page
    $(document).mouseup(function(e) {
        var container = $(".sub-menu, .dropdown-link");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $(".dropdown-link").next().removeClass('dropdown');
            $(".dropdown-link").next().slideUp();
        }
    });


    $('.mobile--inner--wrapper .menu-item-has-children').each(function() {
        $(this).addClass('acc-submenu');
    });
    $('.mobile--inner--wrapper .menu-item-has-children').each(function() {
        $(this).children('a').click(function(e) {
            e.preventDefault();
            $(this).toggleClass('rotate');
            $(this).next().toggleClass('acc--menu--open');
            $(this).next().slideToggle('slow');
        });
    });




    $('.burger--menu--toggle').click(function() {
        $('.burger--menu--toggle').prop('disabled', true);

        //mobile menu animation
        if (!$('.header-mobile-content').hasClass("header--open")) {
            //burger toggle animation
            $('.burger--menu--toggle').addClass("burger--closed");
            $('body').addClass('nav--open');


            //open menu
            $('.header-mobile-content').addClass("header--open").removeClass("header--closed");
            $('html, body').css({
                overflow: 'hidden',
            });
        } else {
            //burger toggle animation
            $('.burger--menu--toggle').removeClass("burger--closed");
            $('body').removeClass('nav--open');

            //close menu
            $('.header-mobile-content').removeClass("header--open").addClass("header--closed");
            $('html, body').css({
                overflow: 'visible',
            });

            // close submenus
            // $('#menu-main .dropdown-menu').removeClass('menu--slide--in');
            // $('#menu-main .dropdown-menu').slideUp('slow');
        }

        setTimeout(function() {
            // enable click after 1 second
            $('.burger--menu--toggle').prop('disabled', false);
        }, 500); // .5 second delay

    });



    // //close menu if click on page
    $(document).mouseup(function(e) {
        var container = $(".header--open, .header--burger");

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.header-mobile-content').removeClass("header--open");
            $('.burger--menu--toggle').removeClass('burger--closed');
            $('html, body').css({
                overflow: 'visible',
            });

            // close submenus
            // $('#menu-main .dropdown-menu').removeClass('menu--slide--in');
            // $('#menu-main .dropdown-menu').slideUp('slow');
        }
    });



    //hide navbar on scroll
    $(function() {
        var lastScrollTop = 0,
            delta = 5;
        $(window).scroll(function() {
            var nowScrollTop = $(this).scrollTop();
            var scroll = $(window).scrollTop();

            if (Math.abs(lastScrollTop - nowScrollTop) >= delta) {
                if (nowScrollTop > lastScrollTop) {
                    // SCROLLING DOWN
                    if (scroll >= 600) {
                        $('.site-header').removeClass('nav-down').addClass('nav-up');
                    }
                } else {
                    // SCROLLING UP
                    $('.site-header').removeClass('nav-up').addClass('nav-down');
                }
                lastScrollTop = nowScrollTop;
            }
        });
    });
});
