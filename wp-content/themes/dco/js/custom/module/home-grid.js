'use strict';

(function($){
    $(function(){
        $('.js-grid').isotope({
            layoutMode: 'packery',
            itemSelector: '.gridItem',
            percentPosition: true,
            animationOptions: {
                duration: 0,
                easing: 'linear',
                queue: false
            }

        });

        $('.js-projectsSlider').slick({
            infinite: true,
            dots: true,
            arrows: false,
            fade: true
        });

    });
})(jQuery);