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
        // if($('.js-postNav').length ) {
        //     var $postNavParent = $('.js-postNav'),
        //         $postNavNext = $postNavParent.find('.js-data-next'),
        //         $postNavPrev = $postNavParent.find('.js-data-prev');
        //     // $postNavNext.addClass('is-visible');
        //     $(window).scroll(function () {
        //         var startPoint = $(window).height() + 100,
        //             finishPoint = $('#footer').offset().top + 50,
        //             currentPosition = $(window).scrollTop() + $(window).height();
        //
        //         $postNavNext.attr('data-start', startPoint);
        //         $postNavNext.attr('data-end', finishPoint);
        //         $postNavPrev.attr('data-start', finishPoint - 300);
        //         $postNavPrev.attr('data-end', finishPoint);
        //
        //         if( currentPosition >= $postNavNext.attr('data-start') && currentPosition <= $postNavNext.attr('data-end') ) {
        //             $postNavNext.addClass('is-visible');
        //             $postNavNext.css({
        //                 'position': 'absolute',
        //                 'top': $(window).scrollTop() + $(window).height() - 50
        //             })
        //         } else if ( currentPosition <= $postNavNext.attr('data-start') ){
        //             $postNavNext.removeClass('is-visible');
        //         }
        //
        //         if( currentPosition >= $postNavPrev.attr('data-start') && currentPosition <= $postNavPrev.attr('data-end')) {
        //             $postNavPrev.addClass('is-visible');
        //             $postNavPrev.css({
        //                 'position': 'absolute',
        //                 'top': $(window).scrollTop() + $(window).height() - 50
        //             })
        //         } else if ( currentPosition <= $postNavPrev.attr('data-start') ){
        //             $postNavPrev.removeClass('is-visible');
        //         }
        //     })
        // }
        if (!!$('#sticky').length) { // make sure "#sticky" element exists
            var el = $('#sticky');
            var stickyTop = $(window).height() + 100; // returns number
            //var footerTop = $('#footer').offset().top + 50; // returns number
            var $postNavNext = el.find('.js-data-next');
            var $postNavPrev = el.find('.js-data-prev');
            var stickyHeight = $('#sticky').height();
            //var limit = footerTop - stickyHeight - 20;
            $(window).scroll(function(){ // scroll event
                var windowTop = $(window).scrollTop() + $(window).height(); // returns number
                var footerTop = $('#footer').offset().top;
                var limit = footerTop;

                if (stickyTop < windowTop){
                    el.css({ position: 'fixed', bottom: 50, top: 'auto' });
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
                    el.css({bottom: (diff * -1)});
                    el.addClass('is-onBottom');
                }
            });
        }
    }
    //pageArrows();

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
      $(window).on('load', function(){
          setTimeout(function () {
              pageArrows();
          }, 500)
      });
  });

  $(window).on('load', function(){
      $('.js-preloader').fadeOut();
      if (navigator.userAgent.match(/(\(iPod|\(iPhone|\(iPad)/)) {
          $('html').addClass('ios')
      }
  });
})(jQuery);
