/* main menu */

(function($){
    $(function(){
        $('.js-menuTrigger').on('click', function(){
            $('.js-menu').fadeIn();

        });
        $('.js-closeMenu').on('click', function () {
            $('.js-menu').fadeOut();
        });
    });
})(jQuery);
