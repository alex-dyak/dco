(function ($) {
  $(function() {

    var profileSlider = $('.js-profile-slider'),
        profileSliderSpeed = profileSlider.data('speed');
        profileSliderSpeed = profileSliderSpeed % 1 == 0 ? profileSliderSpeed : 3000;
      profileSlider.slick({
      autoplay: true,
      autoplaySpeed: profileSliderSpeed,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true
    });

    function sliderHeight() {
      var tablet = window.matchMedia("only screen and (max-width: 48em)"),
          sliderHeightV = 0,
          itemHeight = 0,
          headerHeight = $('.js-siteHeader').outerHeight(),
          $slides = profileSlider.find('.slick-slide');
      if( !tablet.matches ) {
          itemHeight = ( $(window).height() * .8 ) - (headerHeight * 2);
          sliderHeightV = itemHeight.toFixed();
      } else {
          sliderHeightV = 365;
      }
      //profileSlider.height(sliderHeightV);
      $slides.height(sliderHeightV);
    }

    sliderHeight();
    
    function pageArrows() {
        if (!!$('#sticky').length) { // make sure "#sticky" element exists
            var el = $('#sticky');
            var stickyTop = $(window).height() + 100; // returns number
            var stickySrart = $('.projectDescription-header-title').offset().top;
            //var footerTop = $('#footer').offset().top + 50; // returns number
            var $postNavNext = el.find('.js-data-next');
            var $postNavPrev = el.find('.js-data-prev');
            var stickyHeight = $('#sticky').height();
            //var limit = footerTop - stickyHeight - 20;
            $(window).scroll(function(){ // scroll event
                var windowTop = $(window).scrollTop() + $(window).height(); // returns number
                var footerTop = $('#footer').offset().top;
                var limit = footerTop;

                if (stickySrart < windowTop){
                    el.css({ position: 'absolute', bottom: 'auto', top: stickySrart });
                    //el.css({ position: 'fixed', bottom: 50, top: 'auto' });
                    el.addClass('is-visible');
                    el.removeClass('is-onBottom');
                }
                else {
                    el.css('position','static');
                    el.removeClass('is-visible');
                    el.removeClass('is-onBottom');
                }

                if (limit < windowTop - 50) {
                    var diff = limit - windowTop;
                    //el.css({top: diff, bottom: 'auto'});
                    el.css({position: 'fixed', bottom: (diff * -1), top: 'auto'});
                    el.addClass('is-onBottom');
                }
            });
        }
    }
    //pageArrows();
    function check_if_in_view() {
      var $animation_elements = $('.js-hasSticky');
      var window_height = $(window).height();
      var window_top_position = $(window).scrollTop();
      var window_bottom_position = (window_top_position + window_height);
      var tablet = window.matchMedia("only screen and (min-width: 48em)");

      $animation_elements.each(function() {
          var $element = $(this);
          var element_height = $element.outerHeight();
          var element_top_position = $element.offset().top;
          var element_bottom_position = (element_top_position + element_height);

          //console.log(element_top_position)

          //check to see if this current container is within viewport.
          if( tablet.matches ) {
              if ( (window_bottom_position >= element_top_position) && ( window_top_position <= element_bottom_position) ) {
                  $element.addClass('in_view');
                  $element.find('.js-hasSticky-item').addClass('is-sticky');
                  var offset = (window_bottom_position - element_top_position) * 0.15;
                  $element.find('.js-hasSticky-item').css({
                      'transform': 'translateY(' + offset + 'px)'
                  })
              } else {
                  $element.removeClass('in_view');
              }
          } else {

          }
      });
    }
    //check_if_in_view();

      var moduleSlider = $('.js-moduleSlider'),
          moduleSliderSpeed = profileSlider.data('speed');
      moduleSliderSpeed = moduleSliderSpeed % 1 == 0 ? moduleSliderSpeed : 3000;
      moduleSlider.slick({
          autoplay: true,
          autoplaySpeed: moduleSliderSpeed,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: true
      });


      $(window).on('resize', function(){
          sliderHeight();
      });
      $(window).on('load', function(){
          setTimeout(function () {
              pageArrows();
          }, 500);
          $('.js-videoBox').videoPlayer({
              'poster': $('.js-videoPoster'),
              'video': $('.js-video video'),
              'positionStart': 0.9
          });
          $('.js-videoBox').find('video').on("loadedmetadata", function () {
              console.log('im on')
              var $video =  $('.js-videoBox').find('video');
              $video.each(function(){
                  $(this).get(0).play();
              });
          });
      });
      $(window).scroll(function () {
          //check_if_in_view();
      });
  });

  $(window).on('load', function(){
      $('.js-preloader').fadeOut();
      if (navigator.userAgent.match(/(\(iPod|\(iPhone|\(iPad)/)) {
          $('html').addClass('ios')
      }
  });
})(jQuery);
