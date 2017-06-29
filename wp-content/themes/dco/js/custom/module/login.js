/* login page js */

(function($){
    $(function(){
        var $loginForm = $('#loginform-custom');

        function insertPlaceholder(el) {
            var $block = $loginForm.find('.'+ el),
                text = $block.find('label').html();

            $block.find('input').attr('placeholder', text);
        }
        insertPlaceholder('login-username');
        insertPlaceholder('login-password');
    });
})(jQuery);
