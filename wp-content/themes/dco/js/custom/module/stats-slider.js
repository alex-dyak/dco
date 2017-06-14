(function($){
    $(function(){

        var matchMedia = {
            mobilesmall: window.matchMedia("only screen and (max-width: 30em)"),
            mobile: window.matchMedia("only screen and (min-width: 30.062em) and (max-width: 48em)"),
            tablet: window.matchMedia("only screen and (min-width: 48.063em) and (max-width: 62em)"),
            desktop: window.matchMedia("only screen and (min-width: 62.063em) and (max-width: 75em)"),
            desktoplarge: window.matchMedia("only screen and (min-width: 75.063em)")
        };

        function statSlider() {
            var $slider = $('.js-statSlider');
            $slider.each(function(){
                var $this = $(this);
                if((matchMedia.mobile.matches || matchMedia.mobilesmall.matches) && !$this.hasClass('slick-initialized')) {
                    $('.js-statSlider').slick({
                        arrows: false,
                        autoplay: true,
                        autoplaySpeed: 4000,
                        pauseOnFocus: false,
                        pauseOnHover: false
                    });
                }
                else if(!matchMedia.mobile.matches && !matchMedia.mobilesmall.matches && $this.hasClass('slick-initialized')) {
                    $('.js-statSlider').slick('unslick');
                }

            });
        }

        statSlider();

        $(window).on('resize', function(){
            statSlider();
        });

    });
})(jQuery);
