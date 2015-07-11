jQuery(document).ready(function($) {

  //Canvas, Offcanvas and Navicon Behavior
  $('.nav-icon').click(function() {
    $('#canvas').toggleClass('open');
    $('#offcanvas').toggleClass('open');
    $('#logobar').toggleClass('open');
  });

  $('.nav-description').click(function() {
    $('#canvas').toggleClass('open');
    $('#offcanvas').toggleClass('open');
    $('#logobar').toggleClass('open');
  });

  $('#offcanvas').find('.sub-menu').hide();
  $('.menu-item-has-children').click(function(event) {
    event.stopPropagation();
    $(this).children('.sub-menu').slideToggle();
    $(this).toggleClass('accordian');
  });

  //Scroll to top button and fixed menu switch
  $(window).scroll(function(event) {
    var y = $(this).scrollTop();
    if (y >= 500) {
      $("#scrolltotop").addClass("show");
    } else {
      $("#scrolltotop").removeClass("show");
    }
    if (y >= 100) {
      $("#logobar").addClass("fixed");
    } else {
      $("#logobar").removeClass("fixed");
    }
  });

  $('#scrolltotop').click(function() {
    $("html, body").animate({
      scrollTop: 0
    }, "slow");
    return false;
  });
});
