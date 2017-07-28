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
          itemHeight = $(window).height() - (headerHeight * 2);
          sliderHeightV = itemHeight.toFixed();
      } else {
          sliderHeightV = 365;
      }
      //profileSlider.height(sliderHeightV);
      $slides.height(sliderHeightV);
    }

    sliderHeight();

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


      $('.js-videoBox').videoPlayer({
          'poster': $('.js-videoPoster'),
          'video': $('.js-video video'),
          'positionStart': 0.9
      });

      $(window).on('resize', function(){
          sliderHeight();
      });
  });

  $(window).on('load', function(){
      $('.js-preloader').fadeOut();
  });
})(jQuery);
