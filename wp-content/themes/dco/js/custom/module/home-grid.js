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
            autoplay: true,
            autoplaySpeed: 2000,
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
