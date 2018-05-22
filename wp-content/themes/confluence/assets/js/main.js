(function($) {
  "use strict";

  var $body = $('html, body');

	var blogIsotope = function() {
    var imgLoad = imagesLoaded($('.blog-masonry'));

    imgLoad.on('done', function(){
      $('.blog-masonry').isotope({
        "itemSelector": ".post-masonry",
      });
     });
   
   imgLoad.on('fail', function(){
      $('.blog-masonry').isotope({
        "itemSelector": ".post-masonry",
      });
   });  
     
  };
  blogIsotope();

  /*function( newElements ) {
    // hide new items while they are loading
    var newElems = jQuery(newElements);
        \$isoContainer.imagesLoaded(function () {
      \$isoContainer.isotope('appended', newElems, true);
    });
  }*/

  /*$("#blog .owl-carousel").owlCarousel({
    items: 2,
    loop:true,
    responsiveClass:true,
    margin: 60,
    dots: false,
    nav: true,
    navText: ['<i class="fa fa-arrow-left fa-2x"></i>','<i class="fa fa-arrow-right fa-2x"></i>'],
    responsive:{
      0:{
        items:1
      },
      767:{
        items:2
      }
    }
  });*/

  $("#blog .owl-carousel").owlCarousel({
    items:3,
    loop:true,
    nav : true,
    navText: [
      '<span class="prev-icon"><i class="fa fa-arrow-left fa-2x"></i></span>',
      '<span class="next-icon"><i class="fa fa-arrow-right fa-2x"></i></span>'
    ],
    responsiveClass:true,
    responsive:{
      0:{
        items:1,
        nav:true
      },
      600:{
        items:2,
        nav:true
      },
      1000:{
        items:3,
        nav:true,
        loop:true
      }
    }
  });

  /* $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
      0:{
        items:1,
        nav:true
      },
      600:{
        items:3,
        nav:false
      },
      1000:{
        items:5,
        nav:true,
        loop:false
      }
    }
  })*/


  /*var owlSlider = function() {

    var sliders = $('.owl-slider');
    if (sliders.length) {
      sliders.each(function(){
        var slider = $(this);
        slider.owlCarousel({
          singleItem:true,
          loop: true,
          autoplay: false,
          autoHeight: true,
          pagination: false,
          navigation : true,
          navigationText: [
            '<span class="prev-icon"><i class="fa fa-angle-left"></i></span>',
            '<span class="next-icon"><i class="fa fa-angle-right"></i></span>'
          ]
        });
      });
    }
  }

  owlSlider();*/


  if ($('.back-to-top').length) {
    var scrollTrigger = 100, // px
    backToTop = function () {
      var scrollTop = $(window).scrollTop();
      if (scrollTop > scrollTrigger) {
        $('.back-to-top').addClass('show');
      } else {
        $('.back-to-top').removeClass('show');
      }
    };
    
    $(window).on('scroll', function () {
        backToTop();
    });
    $('.back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
          scrollTop: 0
        }, 700);
    });
  }

  $('.lightbox').nivoLightbox({
    keyboardNav: true,
  }); 

  //$(".video-content").fitVids();

  $('textarea').autogrow(); 

  var mobileHeader = function() {
    var navigationToggle = $('.mobile-header .mobile-menu-toggle'),
      navToggleLink = navigationToggle.find('a'),
      mobileNav = $('.mobile-header .mobile-navigation'),
      dropToggle = $(".mobile-navigation .expander, .mobile-navigation a[href*='#']"),
      animTime = 200;


    var $nav = $('.mobile-navigation'),
      $button = $('#toggle-nav');

    $button.on('click', function (e) {
      var isActivating = !$nav.hasClass('active');

      $(this).toggleClass('active', isActivating);

      $nav.toggleClass('active').fadeToggle(300, function () {
          $nav.scrollTop(0);
      });

      $body.trigger(isActivating ? 'lock' : 'unlock');
    });

    if(dropToggle.length) {
      dropToggle.each(function() {
        $(this).on('tap click', function(e) {
          var dropToggleOpen = $(this).nextAll('ul').first();

          if(dropToggleOpen.length) {
            e.preventDefault();

            var dropParent = $(this).parent('li');

            if(dropToggleOpen.is(':visible')) {
              dropToggleOpen.slideUp(animTime);
              dropParent.removeClass('dropdown-open');
            } else {
              dropToggleOpen.slideDown(animTime);
              dropParent.addClass('dropdown-open');
            }

          }

        });
      });
    }

  }

  mobileHeader();



  // Mobile Header Scroller
  var mobileNavScroller = function() {
    var mobileMenuWrapper = $('.mobile-nav-content');
    if(mobileMenuWrapper.length){    
      mobileMenuWrapper.niceScroll({ 
        scrollspeed: 60,
        mousescrollstep: 40,
        cursorwidth: 0, 
        cursorborder: 0,
        cursorborderradius: 0,
        cursorcolor: "#eee",
        autohidemode: false, 
        horizrailenabled: false 
      });
    }
  }

  mobileNavScroller();

})(jQuery);


