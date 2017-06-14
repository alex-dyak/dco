/* go top */

(function($){
    $(function(){
        var $teamBlock = $('.team-block')

        function adjustPosition($el) {
            var pos = $el.offset().top - 120;
            $('html, body').animate({scrollTop:pos}, 300);
        }

        function insertCloned($el) {
            var $set = $teamBlock.children(),
                pos = $set.index($el),
                rowPos = ($(window).width() > 769)? 3 : 2,
                newPos = pos - pos%rowPos,
                $clone = $el.clone().addClass('cloned');
            $($set[newPos]).before($clone);
            $el.addClass('active');
            adjustPosition($clone);
        }

        function removeCloned() {
            $teamBlock.find('.cloned').remove();
            $teamBlock.find('.active').removeClass('active');
        }

        $('.team-member').on('click', function() {
            insertCloned($(this));
        });

        $(document).on('click','.team-member .close, .overlay', function() {
            removeCloned();
        });
    });
})(jQuery);
