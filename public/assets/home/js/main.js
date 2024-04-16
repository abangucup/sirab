$(function ($) {
  "use strict";

  jQuery(document).ready(function () {

    // preloader
    $("#preloader").delay(300).animate({
      "opacity": "0"
    }, 500, function () {
      $("#preloader").css("display", "none");
    });

    // Scroll Top
    var ScrollTop = $(".scrollToTop");
    $(window).on('scroll', function () {
      if ($(this).scrollTop() < 500) {
        ScrollTop.removeClass("active");
      } else {
        ScrollTop.addClass("active");
      }
    });
    $('.scrollToTop').on('click', function () {
      $('html, body').animate({
        scrollTop: 0
      }, 500);
      return false;
    });

    // Navbar Dropdown
    var dropdown_menu = $(".header-section .dropdown-menu");
    $(window).resize(function () {
      if ($(window).width() < 992) {
        dropdown_menu.removeClass('show');
      }
      else {
        dropdown_menu.addClass('show');
      }
    });
    if ($(window).width() < 992) {
      dropdown_menu.removeClass('show');
    }
    else {
      dropdown_menu.addClass('show');
    }

    // Coaching Active
    var bagetoggle = $(".bage-head");
    $(bagetoggle).on('click', function () {
      $(this).next().toggleClass('active');
    });
    var closebtn = $(".carousel-area .title i");
    $(closebtn).on('click', function () {
      $('.carousel-area').removeClass('active');
    });

    // Autocomplete off
    $('input').attr('autocomplete','off');

    // Range Value
    $( ".irs-handle" ).mouseenter(function() {
      var min_val = $( '.irs-from' ).text();
      var max_val = $( '.irs-to' ).text();
      $( ".min-val" ).html( min_val );
      $( ".max-val" ).html( max_val );
    });

    // grid and list style
    $(".grid-btn").on("click", function () {
      $(".grid-btn").addClass("active");
      $(".list-btn").removeClass("active");

      $(".single-item").removeClass("list");
      $("#grid").addClass("active");
      $("#list").removeClass("active");
    });
    $(".list-btn").on("click", function () {
      $(".list-btn").addClass("active");
      $(".grid-btn").removeClass("active");

      $(".single-item").addClass("list");
      $("#list").addClass("active");
      $("#grid").removeClass("active");
    });
    
    // Password Show Hide
    $('.showPass').on('click', function(){
      var passInput=$("#passInput");
      if(passInput.attr('type')==='password'){
        passInput.attr('type','text');
      }else{
        passInput.attr('type','password');
      }
    })

    // Filter Active
    $('.single-item .service-area').on('click', function () {
      $('.service-content').toggleClass('active');
      $('.seller-content').removeClass('active');
      $('.budget-content').removeClass('active');
    });
    $('.single-item .seller-area').on('click', function () {
      $('.seller-content').toggleClass('active');
      $('.service-content').removeClass('active');
      $('.budget-content').removeClass('active');
    });
    $('.single-item .budget-area').on('click', function () {
      $('.budget-content').toggleClass('active');
      $('.service-content').removeClass('active');
      $('.seller-content').removeClass('active');
    });

    // Dropdown Active Remove
    $("aaa").click(function () {
      $('.service-content').removeClass('active');
      $('.seller-content').removeClass('active');
      $('.budget-content').removeClass('active');
    });

    // Sticky Header
    var fixed_top = $(".header-section");
    $(window).on("scroll", function () {
      if ($(window).scrollTop() > 50) {
        fixed_top.addClass("animated fadeInDown header-fixed");
      }
      else {
        fixed_top.removeClass("animated fadeInDown header-fixed");
      }
    });

    // Blog Reply btn
    var replybtn = $(".reply-btn");
    $(replybtn).on('click', function () {
      $(this).next().slideToggle('slow');
    });
    
  });
});