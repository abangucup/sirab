$(function ($) {
  "use strict";

  jQuery(document).ready(function () {
    /* niceSelect */
    $("select").niceSelect();

    // counter Up
    if (document.querySelector('.counter') !== null) {
      $('.counter').counterUp({
        delay: 10,
        disableOn: 0,
        time: 2000
      });
    }

    // testimonials-carousel
    $(".testimonials-carousel").not('.slick-initialized').slick({
      infinite: true,
      autoplay: false,
      centerMode: true,
      centerPadding: "0px",
      focusOnSelect: false,
      speed: 1000,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      prevArrow: "<button type='button' class='slick-prev pull-left'><i class=\"icon-e-double-right-arrow\"  aria-hidden='true'></i></button>",
      nextArrow: "<button type='button' class='slick-next pull-right'><i class=\"icon-e-double-right-arrow\"  aria-hidden='true'></i></button>",
      dots: true,
      dotsClass: 'section-dots',
      customPaging: function (slider, i) {
        var slideNumber = (i + 1),
          totalSlides = slider.slideCount;
        return '<a class="dot" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '/' + totalSlides + '</span></a>';
      }
    });

    // achievement-carousel
    $(".achievement-carousel").not('.slick-initialized').slick({
      infinite: true,
      autoplay: true,
      centerMode: true,
      centerPadding: "0px",
      focusOnSelect: false,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 1,
      arrows: true,
      prevArrow: "<button type='button' class='slick-prev pull-left'><i class=\"icon-e-double-right-arrow\"  aria-hidden='true'></i></button>",
      nextArrow: "<button type='button' class='slick-next pull-right'><i class=\"icon-e-double-right-arrow\"  aria-hidden='true'></i></button>",
      vertical: true,
      dots: true,
      dotsClass: 'section-dots',
      customPaging: function (slider, i) {
        var slideNumber = (i + 1),
          totalSlides = slider.slideCount;
        return '<a class="dot" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '/' + totalSlides + '</span></a>';
      },
      responsive: [
        {
          breakpoint: 1199,
          settings: {
            slidesToShow: 3,
          }
        }
      ]
    });

    // winning-carousel
    $(".winning-carousel").not('.slick-initialized').slick({
      infinite: true,
      autoplay: true,
      centerMode: true,
      centerPadding: "0px",
      focusOnSelect: false,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 1,
      arrows: true,
      prevArrow: "<button type='button' class='slick-prev pull-left'><i class=\"icon-e-double-right-arrow\"  aria-hidden='true'></i></button>",
      nextArrow: "<button type='button' class='slick-next pull-right'><i class=\"icon-e-double-right-arrow\"  aria-hidden='true'></i></button>",
      vertical: false,
      dots: true,
      dotsClass: 'section-dots',
      customPaging: function (slider, i) {
        var slideNumber = (i + 1),
          totalSlides = slider.slideCount;
        return '<a class="dot" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '/' + totalSlides + '</span></a>';
      },
      responsive: [
        {
          breakpoint: 1399,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            centerMode: false,
          }
        }
      ]
    });

    // gift-carousel
    $(".gift-carousel").not('.slick-initialized').slick({
      infinite: true,
      autoplay: true,
      centerMode: true,
      centerPadding: "0px",
      focusOnSelect: false,
      speed: 500,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: true,
      prevArrow: "<button type='button' class='slick-prev pull-left'><i class=\"icon-e-double-right-arrow\"  aria-hidden='true'></i></button>",
      nextArrow: "<button type='button' class='slick-next pull-right'><i class=\"icon-e-double-right-arrow\"  aria-hidden='true'></i></button>",
      vertical: false,
      dots: false,
      dotsClass: 'section-dots',
      customPaging: function (slider, i) {
        var slideNumber = (i + 1),
          totalSlides = slider.slideCount;
        return '<a class="dot" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '/' + totalSlides + '</span></a>';
      },
      responsive: [
        {
          breakpoint: 1199,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 676,
          settings: {
            slidesToShow: 1,
            centerMode: false,
          }
        }
      ]
    });

    // games-action-carousel
    $(".games-action-carousel").not('.slick-initialized').slick({
      infinite: true,
      autoplay: true,
      centerMode: true,
      centerPadding: "0px",
      focusOnSelect: false,
      speed: 500,
      slidesToShow: 5,
      slidesToScroll: 1,
      arrows: false,
      prevArrow: "<button type='button' class='slick-prev pull-left'><i class=\"icon-e-double-right-arrow\"  aria-hidden='true'></i></button>",
      nextArrow: "<button type='button' class='slick-next pull-right'><i class=\"icon-e-double-right-arrow\"  aria-hidden='true'></i></button>",
      vertical: false,
      dots: false,
      dotsClass: 'section-dots',
      customPaging: function (slider, i) {
        var slideNumber = (i + 1),
          totalSlides = slider.slideCount;
        return '<a class="dot" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '/' + totalSlides + '</span></a>';
      },
      responsive: [
        {
          breakpoint: 1199,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 676,
          settings: {
            slidesToShow: 1,
            centerMode: false,
          }
        }
      ]
    });

    // games-carousel
    $(".games-carousel").not('.slick-initialized').slick({
      infinite: true,
      autoplay: false,
      centerMode: true,
      centerPadding: "0px",
      focusOnSelect: false,
      speed: 1000,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: true,
      prevArrow: "<button type='button' class='slick-prev pull-left'><i class=\"icon-e-double-right-arrow\"  aria-hidden='true'></i></button>",
      nextArrow: "<button type='button' class='slick-next pull-right'><i class=\"icon-e-double-right-arrow\"  aria-hidden='true'></i></button>",
      dots: true,
      dotsClass: 'section-dots',
      customPaging: function (slider, i) {
        var slideNumber = (i + 1),
          totalSlides = slider.slideCount;
        return '<a class="dot" role="button" title="' + slideNumber + ' of ' + totalSlides + '"><span class="string">' + slideNumber + '/' + totalSlides + '</span></a>';
      },
      responsive: [
        {
          breakpoint: 1199,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            centerMode: false,
          }
        }
      ]
    });

    // explore slider
    if (document.querySelector('.explore-slider') !== null) {
      var swiper = new Swiper(".explore-slider", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: true,
        },
        autoplay: {
          delay: 2000,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
    }

    /* slider js */
    if (document.querySelector('#rangeslider') !== null) {
      $("#rangeslider").ionRangeSlider({
        skin: "big",
        type: "double",
        grid: true,
        min: 0,
        max: 250,
        from: 50,
        to: 170
      });
    }

    /* Check Box */
    $(".single-radio").on("click", function () {
      $(".single-radio").removeClass("active");
      $(this).addClass("active");
    });

    // Datepicker
    $( "#datepicker" ).datepicker();
    $( "#deliveryDate" ).datepicker();

    /* Countdown js */
    if (document.querySelector('.countdown') !== null) {
      $('.countdown').downCount({
        date: '12/31/2022 11:59:59',
        offset: +10
      });
    }

    // Shop Details Slide
    if (document.querySelector('.all-slider') !== null) {
      $('.all-slider').owlCarousel({
        loop: false,
        dots: false,
        nav: false,
        margin: 10,
        navigation : false,
        autoplay: false,
        items: 4,
        autoplayTimeout: 1000,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 4
            },
            768: {
                items: 4
            }
        }
      });
    }

    /* Apexcharts js */
    if (document.querySelector('.chart') !== null) {
      var options = {
        chart: {
          height: 380,
          type: "line",
          foreColor: '#C4C4C4',
          zoom: {
            enabled: false
          }
        },
        series: [
          {
            name: "Series",
            data: [-10, 0, -2, 10, 0, -8, 22, 15, 12, 9, 10],
          }
        ],
        colors: ["#109CF1"],
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
          categories: ['1/11/2021', '2/11/2021', '3/11/2021', '4/11/2021', '5/11/2021', '6/11/2021', '7/11/2021', '8/11/2021', '9/11/2021', '10/11/2021', '11/11/2021'],
          tickAmount: 5,
          labels: {
            formatter: function (value, timestamp, opts) {
              return opts.dateFormatter(new Date(timestamp), 'dd MMM')
            }
          }
        },
        yaxis: {
          min: -20,
          max: 30,
          tickAmount: 5
        },
        responsive: [
          {
            breakpoint: 1000,
            options: {
              chart: {
                height: 200,
              },
            }
          }
        ]
      };
      var weeklyStatistics = new ApexCharts(document.querySelector(".weeklyStatistics"), options);
      weeklyStatistics.render();
      var monthlyStatistics = new ApexCharts(document.querySelector(".monthlyStatistics"), options);
      monthlyStatistics.render();
    }

    // Input Increase
    var minVal = 1, maxVal = 20;
    $(".increaseQty").on('click', function(){
      var $parentElm = $(this).parents(".qtySelector");
      $(this).addClass("clicked");
      setTimeout(function(){
          $(".clicked").removeClass("clicked");
      },100);
      var value = $parentElm.find(".qtyValue").val();
      if (value < maxVal) {
          value++;
      }
      $parentElm.find(".qtyValue").val(value);
    });
    $(".decreaseQty").on('click', function(){
      var $parentElm = $(this).parents(".qtySelector");
      $(this).addClass("clicked");
      setTimeout(function(){
          $(".clicked").removeClass("clicked");
      },100);
      var value = $parentElm.find(".qtyValue").val();
      if (value > 1) {
          value--;
      }
      $parentElm.find(".qtyValue").val(value);
    });

    /* Magnific Popup */
    if (document.querySelector('.popupvideo') !== null) {
      $('.popupvideo').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
      });
    }

    /* Wow js */
    new WOW().init();

  });
});