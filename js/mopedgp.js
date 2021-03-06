jQuery(document).ready(function ($) {

  //Canvas, Offcanvas and Navicon Behavior
  $('.nav-icon').click(function () {
    $('.canvas').toggleClass('open');
    $('.offcanvas').toggleClass('open');
    $('.top-navicon').toggleClass('open');
  });

  $('.nav-description').click(function () {
    $('.inner-canvas').toggleClass('open');
    $('.offcanvas').toggleClass('open');
    $('.top-navicon').toggleClass('open');
  });

  $('.offcanvas').find('.sub-menu').hide();
  $('.menu-item-has-children').click(function (event) {
    event.stopPropagation();
    $(this).children('.sub-menu').slideToggle();
    $(this).toggleClass('accordian');
  });

  //Scroll to top button and fixed menu switch
  $(window).scroll(function (event) {
    var y = $(this).scrollTop();
    console.log(y);
    if(y >= 500) {
      $('.scrolltotop').addClass('show');
    } else {
      $('.scrolltotop').removeClass('show');
    }

    if (y >= 100) {
      $('.site-header').addClass('fixed');
    } else {
      $('.site-header').removeClass('fixed');
    }
  });

  $('.scrolltotop').click(function() {
    $('html, body').animate({
      scrollTop: 0,
    }, 'slow');
    return false;
  });

  //Owl Carousel
  $('.owl-carousel').owlCarousel({
    autoPlay: 2000,
    stopOnHover: true,
    loop: true,
    items: 3,
    itemsDesktop: [1080,4],
    itemsDesktopSmall: [970,3],
    itemsTablet: [784,2],
    itemsMobile: [468,1],
  });
});
