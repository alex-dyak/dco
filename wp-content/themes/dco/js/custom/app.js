(function ($) {
  $(function() {
    var profileSlider = $('.js-profile-slider'),
        profileSliderSpeed = profileSlider.data('speed');
    profileSliderSpeed = profileSliderSpeed % 1 == 0 ? profileSliderSpeed : 3000;
    $('.js-profile-slider').slick({
      autoplay: true,
      autoplaySpeed: profileSliderSpeed,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true
    });

      $('.parallax-window').parallax();
  });
})(jQuery);
