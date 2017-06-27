/* go top */

(function($){
    $(function(){
        var $teamBlock = $('.team-block'),
            activeClass = 'active';

        /* Shows arrows if content goes beyond a container */
        function arrowsEnable($el) {
            var $block = $el.find('.member-modal-container');

            if (($block.outerHeight() - $block.parent().outerHeight()) > 8) {
                $el.addClass('arrows-enabled');
            }
        }

        /* Adjusts position of an open element */
        function adjustPosition($el) {
            var indent = ($(window).width() > 480) ? 120 : 60,
                pos = $el.offset().top - indent;

            $('html, body').animate({scrollTop:pos}, 300);
        }

        /* When clicking arrows moves the text up or down */
        function moveText($el) {
            var $block = $el.siblings('.member-modal-frame').find(':first-child'),
                scroll = $block.scrollTop();

            if ($el.hasClass('arrow-down')) {
                $block.animate({ scrollTop: scroll + 100 }, 400);
            } else {
                $block.animate({ scrollTop: scroll - 100 }, 400);
            }
        }

        /* Inserts the cloned element into the beginning of the row */
        function insertCloned($el) {
            var $set = $teamBlock.children(),
                pos = $set.index($el),
                rowPos = ($(window).width() > 769)? 3 : 2,
                newPos = pos - pos%rowPos,
                $clone = $el.clone().addClass('cloned'),
                $overlay = $teamBlock.find('.overlay');

            
            $($set[newPos]).before($clone);
            $el.addClass(activeClass);
            $overlay.show(5, function () {
                $overlay.addClass(activeClass);
            });
            setTimeout(function(){
                $clone.addClass('height');
            }, 5);
            arrowsEnable($clone);
            adjustPosition($clone);
        }

        /* Removes the cloned element from the row */
        function removeCloned() {
            var $block = $teamBlock.find('.cloned'),
                $activeBlock = $teamBlock.find('.'+activeClass),
                $overlay = $teamBlock.find('.overlay');

            $block.removeClass('height');
            $overlay.removeClass(activeClass);
            $activeBlock.removeClass(activeClass);
            setTimeout(function(){
                $block.remove();
                $overlay.hide(5);
            }, 600);
        }

        /* Shows the selected element on mobile devices */
        function mobileActiveEnable($el) {
            var $block = $el.find('.member-modal-container'),
                $overlay = $teamBlock.find('.overlay');

            $el.addClass(activeClass);
            $block.show(300);
            $overlay.show(5, function () {
                $overlay.addClass(activeClass);
            });
        }

        /* Removes the selected element on mobile devices */
        function mobileActiveDisable() {
            var $el = $('.team-member.active'),
                $block = $el.find('.member-modal-container'),
                $overlay = $teamBlock.find('.overlay');

            $overlay.removeClass(activeClass);
            $block.hide(300, function () {
                $el.removeClass(activeClass);
                $overlay.hide(5);
            });
        }

        /* On click moves the text */
        $(document).on('click','.arrow', function() {
            moveText($(this));
        });

        /* On click opens elements */
        $(document).on('click','.team-member:not(.active, .cloned)', function() {
            console.log('enable - ');
            console.log($(this));
            if($(window).width() > 480) {
                insertCloned($(this));
            } else {
                mobileActiveEnable($(this));
                adjustPosition($(this))
            }
        });

        /* On click closes active elements */
        $(document).on('click','.team-member .close, .overlay', function() {
            console.log('disable - ');
            console.log($(this));

            if($(window).width() > 480) {
                removeCloned();
            } else {
                mobileActiveDisable();
            }
        });

        /* Removes cloned element on resize window */
        $(window).on('resize',function(){
            removeCloned();
        });

        /* Smooth scrolling to anchors */
        $('.anchor-menu a').on('click', function(event){
            event.preventDefault();

            $('html, body').animate({
                scrollTop: ($( $.attr(this, 'href') ).offset().top - $('.siteHeader').outerHeight())
            }, 500);
        });

        $(document).on('click', '.wpcf7-response-output .close', function () {
            $(this).closest('.wpcf7-response-output').hide();
        });
    });
})(jQuery);