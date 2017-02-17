jQuery(document).ready(function ($) {
    "use strict";

    /* PrettyPhoto Script
    ======================================================*/
    $('a[data-rel]').each(function () {
        $(this).attr('rel', $(this).data('rel'));
        $(".pretty-gallery a[rel^='prettyPhoto']").prettyPhoto();
    });

    /* Owl Slider For Banner 1
    ======================================================*/
    if ($('#homev1-slider').length) {
        $('#homev1-slider').owlCarousel({
            loop: true,
            dots: true,
            nav: false,
            navText: '',
            items: 1,
            autoplay: true,
            smartSpeed: 1000,
        });
    }

    /* Owl Slider For Banner 2
    ======================================================*/
    if ($('#homev2-slider').length) {
        $('#homev2-slider').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: '',
            items: 1,
            autoplay: true,
            smartSpeed: 2000,
        });
    }

    /* Owl Slider For Banner 3
    ======================================================*/
    if ($('#homev3-slider').length) {
        $('#homev3-slider').owlCarousel({
            loop: true,
            dots: false,
            nav: false,
            navText: '',
            items: 1,
            autoplay: true,
            smartSpeed: 2000,
        });
    }

    /* Owl Slider For Banner 3
    ======================================================*/
    if ($('#homev4-slider').length) {
        $('#homev4-slider').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: '',
            items: 1,
            autoplay: true,
            smartSpeed: 2000,
        });
    }

    /* Owl Slider For Our Expetise
    ======================================================*/
    if ($('.experties-slider').length) {
        $('.experties-slider').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: '',
            items: 3,
            smartSpeed: 500,
            margin: 30,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1199: {
                    items: 3,
                }
            }
        });
    }

    /* Owl Slider For Our Upcoming Event
    ======================================================*/
    if ($('.upevents-slider').length) {
        $('.upevents-slider').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: '',
            items: 2,
            smartSpeed: 500,
            margin: 30,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1199: {
                    items: 2,
                }
            }
        });
    }

    /* Owl Slider For Our Upcoming Event
    ======================================================*/
    if ($('#cp-team-slider').length) {
        $('#cp-team-slider').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: '',
            items: 2,
            smartSpeed: 500,
            margin: 30,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1199: {
                    items: 2,
                }
            }
        });
    }


    /* Owl Slider For Our Upcoming Event
    ======================================================*/
    if ($('#cp-partners').length) {
        $('#cp-partners').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: '',
            items: 2,
            smartSpeed: 500,
            margin: 30,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                1199: {
                    items: 2,
                }
            }
        });
    }

    /* Owl Slider For Testimonial
    ======================================================*/
    if ($('#cp-testimonial-slider').length) {
        $('#cp-testimonial-slider').owlCarousel({
            loop: true,
            dots: true,
            nav: false,
            navText: '',
            items: 1,
            autoplay: false,
            smartSpeed: 1500,
        });
    }


    /* Owl Slider For Testimonial Variation 2
    ======================================================*/
    if ($('#cp-testimonial-slider2').length) {
        $('#cp-testimonial-slider2').owlCarousel({
            loop: true,
            dots: true,
            nav: false,
            navText: '',
            items: 2,
            smartSpeed: 500,
            padding: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                992: {
                    items: 2,
                },
                1199: {
                    items: 2,
                }
            }
        });
    }


    /* Owl Slider For Blog
    ======================================================*/
    if ($('#cp-blog-slider').length) {
        $('#cp-blog-slider').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: '',
            items: 1,
            autoplay: false,
            smartSpeed: 1500,
        });
    }

    /* Owl Slider For Blog Post
    ======================================================*/
    if ($('#cp-blog-slider_v2').length) {
        $('#cp-blog-slider_v2').owlCarousel({
            loop: true,
            dots: false,
            nav: true,
            navText: '',
            items: 1,
            autoplay: false,
            smartSpeed: 1500,
        });
    }


    /* Event Countdown Scipts Start
    ======================================================*/
    if ($('.eventcountdown').length) {
        $(function () {
            var austDay = new Date();
            austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
            $('.eventcountdown').countdown({ until: austDay });
            $('#year').text(austDay.getFullYear());
        });
    }

    /* CounterUp For Facts Start
    ======================================================*/
    if ($('.counter').length) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    }

    /* Countdown For Banner
    ======================================================*/
    if ($('.cp-countdown').length) {
        $('.cp-countdown').final_countdown({
            'start': 1362139200,
            'end': 1388461320,
            'now': 1387461319
        });
    }

    /* Isotope For Portfolio
    ======================================================*/

    if ($(".cp-gallery-metro-1 .isotope").length) {
        var $container = $('.cp-gallery-metro-1 .isotope');
        $container.imagesLoaded(function () {
            $container.isotope({
                itemSelector: '.item',
                transitionDuration: '0.6s',
                masonry: {
                    columnWidth: $container.width() / 12
                },
                layoutMode: 'masonry'
            });
        });

        $(window).resize(function () {
            $container.isotope({
                masonry: {
                    columnWidth: $container.width() / 12
                }
            });
        });

        // $('.cp-gallery-metro-1 .cp-gallery-item img').load(function() {
        //     attWorkGrid_2();
        // });
    }


    /* Isotope For Portfolio
    ======================================================*/
    if ($(".cp-gallery-metro-2 .isotope").length) {
        var $container = $('.cp-gallery-metro-2 .isotope');
        $container.imagesLoaded(function () {
            $container.isotope({
                itemSelector: '.item',
                transitionDuration: '0.6s',
                masonry: {
                    columnWidth: $container.width() / 12
                },
                layoutMode: 'masonry'
            });
        });

        // $('.cp-gallery-metro-2 .cp-gallery-item img').load(function() {
        //     attWorkGrid_2();
        // });

        $(window).resize(function () {
            $container.isotope({
                masonry: {
                    columnWidth: $container.width() / 12
                }
            });
        });
    }


    /* Filterable For Gallery
    ======================================================*/
    if ($('.portfolioContainer').length) {
        var $container = $('.portfolioContainer');

        $container.imagesLoaded(function () {

            $container.isotope({
                filter: '*',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }

            });

        });
    }

    if ($('.portfolioFilter a').length) {
        $('.portfolioFilter a').click(function () {
            $('.portfolioFilter .current').removeClass('current');
            $(this).addClass('current');

            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });
    }

    /* Map For Contact Us
    ======================================================*/
    if ($('#cp-map_contact').length) {
        var map;
        var myLatLng = new google.maps.LatLng(48.85661, 2.35222);
        //Initialize MAP
        var myOptions = {
            zoom: 12,
            center: myLatLng,
            //disableDefaultUI: true,
            zoomControl: true,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
            styles: [{
                saturation: -50,
                lightness: 10

            }],
        };
        map = new google.maps.Map(document.getElementById('cp-map_contact'), myOptions);
        //End Initialize MAP
        //Set Marker
        var marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map,
            icon: 'images/map-icon.png'
        });
        marker.getPosition();
        //End marker

        //Set info window
        //var infowindow = new google.maps.InfoWindow({
        //content: '',
        //position: myLatLng
        //});
        //infowindow.open(map);
    }

    /* Quantity For Product Detail Pagew
    ======================================================*/
    if ($('.spinnerExample').length) {
        $('.spinnerExample').spinner();
    }


    $(function () {
        $("#datetimepicker0").datetimepicker();
        $('#datetimepicker1').datetimepicker();
        $('#datetimepicker2').datetimepicker();
        $('#datetimepicker3').datetimepicker();
        $('#datetimepicker4').datetimepicker();
        $('#datetimepicker5').datetimepicker();
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker();
        $('#datetimepicker8').datetimepicker();
        $('#datetimepicker9').datetimepicker();
        $('#datetimepicker10').datetimepicker();
        $('#datetimepicker11').datetimepicker();
        $('#datetimepicker12').datetimepicker();
        $('#datetimepicker13').datetimepicker();
        $('#datetimepicker14').datetimepicker();
    });

});
