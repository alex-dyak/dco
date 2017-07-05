/* login page js */

(function($){
    $(function(){
        var $loginForm = $('#loginform-custom'),
            $errorName = $('.error-name'),
            $errorPass = $('.error-pass'),
            $blockName = $('.login-username'),
            $blockPass = $('.login-password');

        function insertPlaceholder(el) {
            var $block = $loginForm.find('.'+ el),
                text = $block.find('label').html();

            $block.find('input').attr('placeholder', text);
        }

        function replaceErrors() {
            $errorName.appendTo($blockName);
            $errorPass.appendTo($blockPass);
        }
        
        insertPlaceholder('login-username');
        insertPlaceholder('login-password');
        replaceErrors();
    });
})(jQuery);
