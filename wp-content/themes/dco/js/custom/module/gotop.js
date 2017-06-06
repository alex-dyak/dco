/* go top */

(function($){
    $(function(){
        $('.js-goTop').on('click', function(){
           $('html, body').animate({scrollTop:0}, 500);
        });
    });
})(jQuery);
