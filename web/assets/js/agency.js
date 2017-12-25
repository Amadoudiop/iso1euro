(function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 54)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 54
  });

  // Collapse Navbar
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);

  // Hide navbar when modals trigger
  $('.portfolio-modal').on('show.bs.modal', function(e) {
    $(".navbar").addClass("d-none");
  })
  $('.portfolio-modal').on('hidden.bs.modal', function(e) {
    $(".navbar").removeClass("d-none");
  })

  // onScreen jQuery plugin v0.2.1
  // http://benpickles.github.io/onScreen
  $.expr[":"].onScreen = function(elem) {
      var $window = $(window)
      var viewport_top = $window.scrollTop()
      var viewport_height = $window.height()
      var viewport_bottom = viewport_top + viewport_height
      var $elem = $(elem)
      var top = $elem.offset().top
      var height = $elem.height()
      var bottom = top + height

      return (top >= viewport_top && top < viewport_bottom) ||
          (bottom > viewport_top && bottom <= viewport_bottom) ||
          (height > viewport_height && top <= viewport_top && bottom >= viewport_bottom)
  }

    setInterval(function() {
        $("h2")                             // get all <h2>s
            .filter(":onScreen")            // get only <h2>s on screen
            .addClass('animated fadeInUp');

        $('.timeline-panel')
            .filter(':onScreen')
            .addClass('animated fadeInLeft');

        $('.timeline-inverted .timeline-panel')
            .filter(':onScreen')
            .addClass('animated fadeInRight');

        $('.timeline-image')
            .filter(':onScreen')
            .addClass('animated fadeInDown');

        $('.text-justify')
            .filter(':onScreen')
            .addClass('animated fadeInDown');

        $('.btn')
            .filter(':onScreen')
            .addClass('animated bounceIn');

        $('.clients img')
            .filter(':onScreen')
            .addClass('animated bounceIn');

        $('.intro-lead-in')
            .filter(':onScreen')
            .addClass('animated fadeInUp');

        $('.intro-heading')
            .filter(':onScreen')
            .addClass('animated fadeInDown');

        $('#contactForm')
            .filter(':onScreen')
            .addClass('animated fadeInLeft');

        $('.contact-info')
            .filter(':onScreen')
            .addClass('animated fadeInRight');

        $('#expertise img.img-left')
            .filter(':onScreen')
            .addClass('animated fadeInLeft');

        $('#expertise img.img-right')
            .filter(':onScreen')
            .addClass('animated fadeInRight');



    }, 500) // repeat every second



})(jQuery); // End of use strict
