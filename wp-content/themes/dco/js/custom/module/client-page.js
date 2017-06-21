(function ($) {
    $(function () {
        //Filter Clients
        $('.js-filter').find('a').click(function (e) {
            e.preventDefault();
            var $this = $(this);

            $this.closest('li').addClass('is-active').siblings().removeClass('is-active');

            var filter = $(this).attr('value');
            filterList(filter);
        });

        //Accordion
        $('.js-filterList').find('strong').on('click', function () {
            var $this = $(this),
                $thisLi = $this.closest('li');


            if ($thisLi.hasClass('is-open')) {
                $thisLi.removeClass('is-open');
                $thisLi.find('ol').slideUp();
            }
            else {
                $thisLi.addClass('is-open').siblings().removeClass('is-open');
                $thisLi.siblings().find('ol').slideUp();
                $thisLi.find('ol').slideDown(function () {
                    var topPosition = $this.offset().top - $('.siteHeader').height() - 1;

                    if ($('#wpadminbar').length) {
                        topPosition = topPosition - $('#wpadminbar').height();
                    }
                    $('html, body').animate({scrollTop: topPosition}, 300);
                });
            }

        });

        //Clients filter function
        function filterList(value) {
            var $list = $(".clientItemList"),
                $listItem = $list.find('a');

            $listItem.removeClass("is-active");

            if (value == "all") {
                $listItem.each(function() {
                    $(this).addClass("is-active");
                });
            } else {
                //Notice this *=" <- This means that if the data-category contains multiple options
                $list.find("a[data-category*=" + value + "]").each(function () {
                    $(this).addClass("is-active");
                });
            }
        }

        function stickyAside() {
            var $block = $('.js-stickyFilter').find('.js-filter'),
                positionBlock = $('.js-stickyFilter').offset().top,
                heightBlock = $block.height(),
                heightWrap = $('.js-filterList').height(),
                heightHeader = $('.siteHeader').height() + 10,
                adminbarHeight = 0;

            if($('#wpadminbar').length) {
                adminbarHeight = $('#wpadminbar').height();
            }

            var topBrakpoint = positionBlock - heightHeader - adminbarHeight,
                bottomBreakpoint =  topBrakpoint + heightWrap - heightBlock;

            if($(window).scrollTop() >= topBrakpoint && $(window).scrollTop() < bottomBreakpoint) {
                $block.addClass('is-sticky').css({'top': $(window).scrollTop() - positionBlock + heightHeader + adminbarHeight, 'bottom': 'inherit'});
            }
            else if($(window).scrollTop() >= bottomBreakpoint) {
                $block.addClass('is-sticky').css({'top': 'inherit', 'bottom': 0});
            }
            else {
                $block.removeClass('is-sticky');
            }
        }

        $(window).on('scroll', function(){
            stickyAside();
        });

        $('.js-popup').magnificPopup({
            type:'inline'
        });

        $('.js-clientSlider').slick({
            autoplay: true,
            autoplaySpeed: 4000,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true
        });
    });
})(jQuery);

