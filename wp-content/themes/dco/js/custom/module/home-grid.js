'use strict';

(function($){
    $(function(){
        $('.js-grid').packery({
            itemSelector: '.gridItem',
            gutter: 0
        });

        $('.js-projectsSlider').slick({
            infinite: true,
            dots: true,
            arrows: false,
            pauseOnHover: false,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 800,
            fade: true
        });

        if($(window).width() < 960) {

        }

    });
    $(window).resize(function () {
        setTimeout(function () {
            $('.js-grid').packery();
        }, 400)
    })
})(jQuery);
