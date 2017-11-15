/* main menu */

(function($){
    $(function(){
        var $homePageSlider = $('.js-homepage-slider');

        $('.js-menuTrigger').on('click', function(){
            $('.js-menu').fadeIn();
            if ($homePageSlider.length){
                $homePageSlider.slick('slickPause');
            }

        });
        $('.js-closeMenu').on('click', function () {
            $('.js-menu').fadeOut();
            if ($homePageSlider.length) {
                $homePageSlider.slick('slickPlay');
            }
        });
    });
})(jQuery);
