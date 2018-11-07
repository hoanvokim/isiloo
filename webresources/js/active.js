(function ($) {
    'use strict';

    // [ JS Active Code Index ]

    // :: 1.0 Owl Carousel Active Code
    // :: 2.0 Slick Active Code
    // :: 3.0 Footer Reveal Active Code
    // :: 4.0 ScrollUp Active Code
    // :: 5.0 CounterUp Active Code
    // :: 6.0 onePageNav Active Code
    // :: 7.0 Magnific-popup Video Active Code
    // :: 8.0 Sticky Active Code
    // :: 9.0 Preloader Active code

    // :: 1.0 Owl Carousel Active Code
    if ($.fn.owlCarousel) {
        $('.welcome_slides').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            smartSpeed: 1500
        });
        $('.app_screenshot_slides').owlCarousel({
            items: 4,
            loop: true,
            autoplay: true,
            margin: 30,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                767: {
                    items: 4
                }
            }
        });
        $('.chuongtrinhissiloo_slides').owlCarousel({
            items: 3,
            loop: true,
            autoplay: true,
            margin: 30,
            nav: true,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                767: {
                    items: 3
                }
            }
        });
        $('.hocvien_slides').owlCarousel({
            items: 4,
            loop: true,
            autoplay: true,
            margin: 30,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                767: {
                    items: 4
                }
            }
        });
        $('.self_learning_slides').owlCarousel({
            items: 4,
            loop: false,
            autoplay: false,
            margin: 30,
            responsive: {
                0: {
                    items: 1,
                    dots: true
                },
                767: {
                    items: 4
                }
            }
        });
        $('.issiloo_images_slides').owlCarousel({
            items: 4,
            loop: true,
            autoplay: true,
            margin: 30,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                767: {
                    items: 4
                }
            }
        });
    }

    // :: 2.0 Slick Active Code
    if ($.fn.slick) {
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 500,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            speed: 500,
            asNavFor: '.slider-for',
            dots: true,
            focusOnSelect: true,
            slide: 'div',
            autoplay: true,
            centerMode: true,
            centerPadding: '30px',
            mobileFirst: true,
            prevArrow: '<i class="fa fa-angle-left"></i>',
            nextArrow: '<i class="fa fa-angle-right"></i>'
        });
    }

    // :: 4.0 ScrollUp Active Code
    // if ($.fn.scrollUp) {
    //     $.scrollUp({
    //         scrollSpeed: 1500,
    //         scrollText: '<i class="fa fa-angle-up"></i>'
    //     });
    // }

    // :: 5.0 CounterUp Active Code
    if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    }

    // :: 6.0 onePageNav Active Code
    if ($.fn.onePageNav) {
        $('#nav').onePageNav({
            currentClass: 'active',
            scrollSpeed: 2000,
            easing: 'easeOutQuad'
        });
    }

    // :: 7.0 Magnific-popup Video Active Code
    if ($.fn.magnificPopup) {
        $('.video_btn').magnificPopup({
            disableOn: 0,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: true,
            fixedContentPos: false
        });
    }

    $('a[href="#"]').click(function ($) {
        $.preventDefault();
    });

    var $window = $(window);

    if ($window.width() > 767) {
        new WOW().init();
    }

    // :: 8.0 Sticky Active Code
    // $window.on('scroll', function () {
    //     if ($window.scrollTop() > 48) {
    //         $('.header_area').addClass('sticky slideInDown');
    //     }
    //     else {
    //         $('.header_area').removeClass('sticky slideInDown');
    //     }
    // });

    // :: 9.0 Preloader Active code
    $window.on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

    /* Isotope Filter
     -------------------------------------------------------*/
    $('.portfolio-filter').on('click', 'a', function (e) {
        e.preventDefault();
        var filterValue = $(this).attr('data-filter');
        $container.isotope({filter: filterValue});

        $('.portfolio-filter a').removeClass('active');
        $(this).closest('a').addClass('active');

    });

    /* Portfolio
     -------------------------------------------------------*/
    var $container = $('.works-grid');
    $container.imagesLoaded(function () {
        $container.isotope({
            itemSelector: '.work-item',
            layoutMode: 'fitRows',
            percentPosition: true,
            masonry: {columnWidth: '.work-img'}
        });

    });

    var contentWayPoint = function () {
        var i = 0;
        $('.animate-box').waypoint(function (direction) {

            if (direction === 'down' && !$(this.element).hasClass('animated')) {

                i++;

                $(this.element).addClass('item-animate');
                setTimeout(function () {

                    $('body .animate-box.item-animate').each(function (k) {
                        var el = $(this);
                        setTimeout(function () {
                            var effect = el.data('animate-effect');
                            if (effect === 'fadeIn') {
                                el.addClass('fadeIn animated');
                            }
                            else {
                                el.addClass('fadeInUp animated');
                            }

                            el.removeClass('item-animate');
                        }, k * 200, 'easeInOutExpo');
                    });

                }, 100);

            }

        }, {offset: '85%'});
    };

    var counter = function () {
        $('.js-counter').countTo({
            formatter: function (value, options) {
                return value.toFixed(options.decimals);
            },
        });
    };

    var counterWayPoint = function () {
        if ($('#colorlib-counter').length > 0) {
            $('#colorlib-counter').waypoint(function (direction) {

                if (direction === 'down' && !$(this.element).hasClass('animated')) {
                    setTimeout(counter, 400);
                    $(this.element).addClass('animated');
                }
            }, {offset: '90%'});
        }
    };

    $(function () {
        contentWayPoint();
    });

})(jQuery);