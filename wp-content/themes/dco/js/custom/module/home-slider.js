(function($){
    $(function(){
       $('.js-homepage-slider').slick({
           infinite: true,
           arrows: false,
           dots: true,
           vertical: true,
           adaptiveHeight: true,
           slidesToShow: 1
       }).on('afterChange', function(event, slick, currentSlide, nextSlide){
           heroVideo();
       });

       function heroVideo() {
        var $heroVideo = $('.js-heroVideo');
        if($heroVideo.length) {
            var $videoSlide = $heroVideo.closest('.slick-slide');
            if($videoSlide.hasClass('slick-active')) {
                $heroVideo.get(0).play();
            }
            else {
                $heroVideo.get(0).pause();
            }
        }
       }

        heroVideo();
    });


})(jQuery);