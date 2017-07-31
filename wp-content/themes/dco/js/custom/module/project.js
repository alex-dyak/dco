(function($){
    $(function(){
        var needToFix = /(MSIE 10)|(Trident.*rv:11\.0)|( Edge\/[\d\.]+$)/.test(navigator.userAgent),
            $images = $('.grayscale'),
            isProjectPage = $('.landing').length;

        function replaceImage(image) {

            var src = $(image).data('srcset').split(' ')[0],
                imageWidth = $(image).parent().width(),
                tmpImage = new Image();

            tmpImage.src = src;
            tmpImage.onload = function() {
                var imageHeight = imageWidth / tmpImage.width * tmpImage.height,
                    imgWrapper = document.createElement('span'),
                    svgTemplate =
                        '<svg xmlns="http://www.w3.org/2000/svg" id="svgroot" width="100%" height="100%">' +
                        '<defs>' +
                        '<filter id="gray">' +
                        '<feColorMatrix type="matrix" values="0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0" />' +
                        '</filter>' +
                        '</defs>' +
                        '<image filter="url(&quot;#gray&quot;)" x="0" y="0" width="'+imageWidth+'" height="'+imageHeight+'" preserveAspectRatio="none" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="'+tmpImage.src+'" />' +
                        '</svg>';
                imgWrapper.innerHTML = svgTemplate;
                imgWrapper.className = 'grayscale-fix';
                image.parentNode.insertBefore(imgWrapper, image);

                image.style.cssText += 'visibility:hidden;display:block';
                imgWrapper.querySelector('svg').style.position = 'absolute';
                imgWrapper.style.cssText = 'display:inline-block;position:relative;';
                imgWrapper.appendChild(image);
            };
        }

        function initReplace() {
            $images.each(function () {
                replaceImage(this);
            })
        }

        function sliderHeight() {
            var tablet = window.matchMedia("only screen and (max-width: 48em)"),
                sliderHeightV = 0,
                itemHeight = 0,
                headerHeight = $('.js-siteHeader').outerHeight(),
                $slides = profileSlider.find('.slick-slide');
            if( !tablet.matches ) {
                itemHeight = $(window).height() - (headerHeight * 2);
                sliderHeightV = itemHeight.toFixed();
            } else {
                sliderHeightV = 365;
            }
            //profileSlider.height(sliderHeightV);
            $slides.height(sliderHeightV);
        }

        function fullHeightModule() {
            var tablet = window.matchMedia("only screen and (max-width: 48em)"),
                $fullHeightEl = $('.js-fullHeight');
            if ( $fullHeightEl.length ) {
                $fullHeightEl.each(function () {
                    console.log(11);
                    var $this = $(this),
                        $parallaxWrap = $this.find('.parallaxImg'),
                        headerHeight = $('.js-siteHeader').outerHeight(),
                        sectionHeight = $(window).height() - (headerHeight * 2);
                    if( !tablet.matches ) {
                        if ($parallaxWrap.length) {
                            $parallaxWrap.height(sectionHeight);
                        } else {
                            $this.find('.js-fullHeightDefault').height(sectionHeight);
                        }
                    } else {
                        $this.find('.js-fullHeightDefault').height('auto');
                    }
                });
            }
        }
        fullHeightModule();

        if(needToFix && isProjectPage) {
            initReplace();
        }

        $(window).on('resize',function(){
            fullHeightModule();
            if(needToFix && isProjectPage) {
                initReplace();
            }
        });
    });
})(jQuery);
