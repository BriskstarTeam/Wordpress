/*$(function() {
  $('a[href*=#]').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top - 100 }, 500, 'linear');
  });
});
*/
if ($('.slider-contact').length != 0) {
    setTimeout(function(){ 

        $('.slider-contact').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        autoplay: false,
        arrows: true,
        responsive: [{
                breakpoint: 1300,
                settings: {
                    slidesToShow: 3,
                    arrows: false
                },
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    adaptiveHeight: true,
                    arrows: false
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true
                },
            },
        ],
    });
    $(".contact").removeClass("loading"); 
    $(".contact").removeAttr("style"); 
    }, 1000);
}


if ($('.details_strap_slider').length != 0) {
    $('.details_strap_slider').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 2,
        autoplay: false,
        arrows: true
    });
$(".slide-item").removeClass("loading"); 
$(".slide-item").removeAttr("style"); 
}

if ($('.slider-for').length != 0) {
    $(".slider-for").lightGallery({
        share: false,
        download: false,
        actualSize: false 
    });

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        autoplay: true
    });
    $(".feature-slider").removeClass("loading"); 
    $(".feature-slider").removeAttr("style"); 
}


$( document ).ready(function() {

    if($('body').hasClass("inner-page"))
    {
       $('#my-nav1').addClass("fixed-menu");
    }  

    if ($('.photogallery-slider').length) {    
        $('.photogallery-slider').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            autoplay: false,
            arrows: true,
            responsive: [{
                    breakpoint: 1300,
                    settings: {
                        slidesToShow: 3,
                        arrows: true
                    },
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        adaptiveHeight: true,
                        arrows: true
                    },
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true
                    },
                },
            ],
        });
        $(".photogallery").removeClass("loading"); 
        $(".photogallery").removeAttr("style"); 
    }

    if ($('#photogallery-slider').length) {
        $("#photogallery-slider").lightGallery({        
            selector: '.slick-slide:not(.slick-cloned) .photogallery-slider-image',
            share: false,
            download: false,
            actualSize: false,
        });
    }

    jQuery("#myModal").on('shown.bs.modal', function(){
            jQuery(this).find('input[name=first_name]').focus();
        });
});
// slick light gallery

(function ($, window, document, undefined) {
    'use strict';

    // init cubeportfolio
    $('#js-grid-masonry-projects').cubeportfolio({
        filters: '#js-filters-masonry-projects',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 10,
        gapVertical: 10,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1500,
            cols: 4,
        }, {
            width: 1100,
            cols: 3,
        }, {
            width: 767,
            cols: 3
        }, {
            width: 480,
            cols: 1,
            options: {
                caption: '',
                gapHorizontal: 35,
                gapVertical: 10,
            }
        }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

        // singlePage popup
        singlePageDelegate: '.cbp-singlePage',
        singlePageDeeplinking: true,
        singlePageStickyNavigation: true,
        singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
        singlePageCallback: function (url, element) {
            // to update singlePage content use the following method: this.updateSinglePage(yourContent)
            var t = this;

            $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'html',
                    timeout: 30000
                })
                .done(function (result) {
                    t.updateSinglePage(result);
                })
                .fail(function () {
                    t.updateSinglePage('AJAX Error! Please refresh the page!');
                });
        },

        plugins: {
            loadMore: {
                element: '#js-loadMore-masonry-projects',
                action: 'click',
                loadItems: 3,
            }
        },
    });
})(jQuery, window, document);


//************************* SCROLL FUNCTIONS***********************//
jQuery(function ($) {

    // Navbar Scroll Function
    var $window = $(window);
    $window.scroll(function () {
        var $scroll = $window.scrollTop();
        var $navbar = $(".navbar");
        if (!$navbar.hasClass("sticky-bottom")) {
            if ($scroll > 200) {
                $navbar.addClass("fixed-menu");
            } else {
                $navbar.removeClass("fixed-menu");
            }
        }
    });

    jQuery(function ($) {
        if (screen.width < 991) {
            $("header").addClass("fixed-top");
        }
    });


    /*bottom menu fix*/
    if ($("nav.navbar").hasClass("sticky-bottom")) {
        var navHeight = $(".sticky-bottom").offset().top;
        $(window).scroll(function () {
            if ($(window).scrollTop() > navHeight) {
                $('.sticky-bottom').addClass('fixed-menu');
            } else {
                $('.sticky-bottom').removeClass('fixed-menu');
            }
        });
    }

    //scroll to appear
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 500)
            $('.scroll-top-arrow').fadeIn('slow');
        else
            $('.scroll-top-arrow').fadeOut('slow');
    });

    // fixing bottom nav to top on scrolliing
    var $fixednav = $(".bottom-nav");
    $(window).on("scroll", function () {
        var $heightcalc = $(window).height() - $fixednav.height();
        if ($(this).scrollTop() > $heightcalc) {
            $fixednav.addClass("navbar-bottom-top");
        } else {
            $fixednav.removeClass("navbar-bottom-top");
        }
    });

    // scroll section
    $(document).ready(function () {
        var id = sessionStorage.getItem("id");
        if(id)
        {
            setTimeout(function(){
                    $('html, body').animate({
                        scrollTop: $(id).offset().top - 63 
                    }, 800, function () {});
                    sessionStorage.removeItem("id");
            }, 2000);
        }

        jQuery(document).on("keydown keyup change", 'input[name=first_name]', function(e) {
            //e.preventDefault()
            if ((event.keyCode == 8) && (jQuery(this).parent().find('span').hasClass('wpcf7-not-valid-tip'))) {
                return false;
            }
            var val = jQuery(this).val();
            if (!val) {

                jQuery(this).parent().find('span.wpcf7-not-valid-tip').remove();
                jQuery(this).addClass('wpcf7-not-valid');
                jQuery(this).after('<span class="wpcf7-not-valid-tip" aria-hidden="true">First Name is required.</span>');

            } else {
                jQuery(this).parent().find('span.wpcf7-not-valid-tip').remove();
            }

        })
        jQuery(document).on("keyup change", 'input[name=last_name]', function(e) {
            e.preventDefault()
            if ((event.keyCode == 8) && (jQuery(this).parent().find('span').hasClass('wpcf7-not-valid-tip'))) {
                return false;
            }
            var val = jQuery(this).val();
            if (!val) {

                jQuery(this).parent().find('span.wpcf7-not-valid-tip').remove();
                jQuery(this).addClass('wpcf7-not-valid');
                jQuery(this).after('<span class="wpcf7-not-valid-tip" aria-hidden="true">Last Name is required.</span>');

            } else 
            {
                jQuery(this).parent().find('span.wpcf7-not-valid-tip').remove();
            }

        })
        function validateEmail($email) {
      var emailReg = /^([a-zA-Z0-9_\-\.]+)\+?([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      return emailReg.test( $email );
    }
        jQuery(document).on("keyup change", 'input[name=email]', function(e) {
            e.preventDefault()
            if ((event.keyCode == 8) && (jQuery(this).parent().find('span').hasClass('wpcf7-not-valid-tip'))) {
                return false;
            }
            var val = jQuery(this).val();
            if (!val) {

                jQuery(this).parent().find('span.wpcf7-not-valid-tip').remove();
                jQuery(this).addClass('wpcf7-not-valid');
                jQuery(this).after('<span class="wpcf7-not-valid-tip" aria-hidden="true">Email is required.</span>');

            } 
            else if(!validateEmail(val))
        {
            jQuery(this).parent().find('span.wpcf7-not-valid-tip').remove();
                jQuery(this).addClass('wpcf7-not-valid');
                jQuery(this).after('<span class="wpcf7-not-valid-tip" aria-hidden="true">Please enter valid email.</span>');
        }
        else {
                jQuery(this).parent().find('span.wpcf7-not-valid-tip').remove();
            }

        })
        jQuery(document).on("keyup change", 'input[name=phone_no]', function(e) {
            e.preventDefault()
            if ((event.keyCode == 8) && (jQuery(this).parent().find('span').hasClass('wpcf7-not-valid-tip'))) {
                return false;
            }
            var val = jQuery(this).val();
            if (!val) {
                jQuery(this).parent().find('span.wpcf7-not-valid-tip').remove();
                jQuery(this).addClass('wpcf7-not-valid');
                jQuery(this).after('<span class="wpcf7-not-valid-tip" aria-hidden="true">Phone is required.</span>');

            } else {
                jQuery(this).parent().find('span.wpcf7-not-valid-tip').remove();
            }

        })
        jQuery(document).on("keyup change", 'textarea[name=Message]', function(e) {
            e.preventDefault()
            if ((event.keyCode == 8) && (jQuery(this).parent().find('span').hasClass('wpcf7-not-valid-tip'))) {
                return false;
            }
            var val = jQuery(this).val();
            if (!val) {

                jQuery(this).parent().find('span.wpcf7-not-valid-tip').remove();
                jQuery(this).addClass('wpcf7-not-valid');
                jQuery(this).after('<span class="wpcf7-not-valid-tip" aria-hidden="true">Message is required.</span>');

            } else {
                jQuery(this).parent().find('span.wpcf7-not-valid-tip').remove();
            }

        })
    if($('.single-suites figure').hasClass('wp-block-image'))
    {
        $(".view-btn-box").hide();
    }
    if($('.single-suites figure').hasClass('wp-block-algori-360-image-block-algori-360-image'))
    {
        $(".view-btn-box").show();
    }
        $("a.nav-link, li.footer_list a").on('click', function (event) {
            $('.navbar-nav li a').removeClass('active');
            $(this).addClass('active');
            var hash = this.hash;
            if ($('body').hasClass('home page-template')) {

                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top - 63 
                    }, 800, function () {});
                    //window.location.hash = hash;
                }
            } else {
                if ($(this).attr('rel') == 'photo_gallery' && $('body').hasClass('page-template-photogallery')) {
                    event.preventDefault();
                } else if ($(this).attr('rel') == 'photo_gallery') {

                } else {
                    event.preventDefault();
                    //console.log(hash); 
                    sessionStorage.setItem("id", hash);
                    window.location.href = home_url;
                   // alert($('div.main_content').addClass('fixed-menu'));
                }
            }

        });

        var rightAmenities = $('#right-amenities li').length;
        var middleAmenities = $('#middle-amenities li').length; 
        var leftAmenities = $('#left-amenities li').length; 

        if(rightAmenities == 1)
        {
            $("#right-amenities li").addClass("w-100");
        }
        else
        {
            $("#right-amenities li").removeClass("w-100");
        }

        if(middleAmenities == 1)
        {
            $("#middle-amenities li").addClass("w-100");
        }
        else
        {
            $("#middle-amenities li").removeClass("w-100");
        }

        if(leftAmenities == 1)
        {
            $("#left-amenities li").addClass("w-100");
        }
        else
        {
            $("#left-amenities li").removeClass("w-100");
        }
    });

    //Click event to scroll to top
    $(document).on('click', '.scroll-top-arrow', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    /*  // scroll section
      $(".scroll").on("click", function (event) {
              event.preventDefault();
              $("html,body").animate({
                  scrollTop: $(this.hash).offset().top - 70
              }, 1200);

          });*/


    $("#my-nav1.about_yoga").on("click", function (event) {
        event.preventDefault();
        off_set = 40;

        $("html,body").animate({
            scrollTop: $(this.hash).offset().top - off_set
        }, 100);
    });

    $(".wp-block-algori-360-image-block-algori-360-image").mouseenter(function () {
        $(".view-btn-box").hide();
    });

    $(".wp-block-algori-360-image-block-algori-360-image").mouseleave(function () {
        $(".view-btn-box").show();
    });



    /* formatting of number (put comma after 3 digits) */
    $.fn.digits = function () {
        return this.each(function () {
            $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        })
    }

    $('.rentable_area').digits();


    /* formatting of phone number */
    $(".phone").text(function (i, text) {
        text = text.replace(/(\d\d\d)(\d\d\d)(\d\d\d\d)/, "$1-$2-$3");
        return text;
    });

    $(".popup_phone").inputmask('999-999-9999');

    $(".close").click(function()
    {
        $("form").trigger("reset");
    });
});


//***************** MENU AND CLOSE BUTTON OF NAVBAR WINDOW*********************//
$('.my-tog-btn').on("click", function () {
    $('.outer-window').addClass('inner-window');
});
$('.close-outerwindow').on("click", function () {
    $('.outer-window').removeClass('inner-window');
});
$('.outer-window ul li a').click(function () {
    $('.outer-window').removeClass('inner-window');
});

//*********************SMOOTH SCROLL*****************************//
/*$("a.pagescroll").on("click", function (event) {
    event.preventDefault();
    $("html,body").animate({
        scrollTop: $(this.hash).offset().top
    }, 1200);
});*/


if ($('.lightgallery').length) {
    $(".lightgallery").lightGallery({
        pager: true,
        selector: '.cbp-item',
        share: false,
        download: false,
        actualSize: false,
    });
}



