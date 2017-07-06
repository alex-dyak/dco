'use strict';

(function($){
    $(function(){
        $('.js-grid').isotope({
            layoutMode: 'packery',
            itemSelector: '.gridItem'

        });

        $('.js-projectsSlider').slick({
            infinite: true,
            dots: true,
            arrows: false,
            fade: true
        });

        if($(window).width() < 960) {

        }

    });
})(jQuery);