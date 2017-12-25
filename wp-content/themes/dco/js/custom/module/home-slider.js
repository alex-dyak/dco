(function($){
    $(function(){
        var $homePageSlider = $('.js-homepage-slider'),
            homePageSliderSpeed = $homePageSlider.data('speed'),
            homePageSliderSpeed2x = $homePageSlider.data('speed') * 2,
            slides = $homePageSlider.find('.slick-slide');

        var $sliderWrapp = $('.js-homepage-sliderWrapp');

        function sliderHeight() {
            var tablet = window.matchMedia("only screen and (max-width: 48em)"),
                sliderHeightV = 0,
                itemHeight = 0;
            if( !tablet.matches ) {
                itemHeight = $(window).height() * 0.84;
                sliderHeightV = itemHeight.toFixed();
            } else {
                sliderHeightV = 441;
            }
            $sliderWrapp.height(sliderHeightV);
            $homePageSlider.height(sliderHeightV);
            $('.homepageSlider-slide-img').height(sliderHeightV);
            $('.homepageSlider-slide').height(sliderHeightV);
            $('.heroVideo').height(sliderHeightV);
        }

        sliderHeight();

        function timeout (slick) {
            //console.log('timeout fun');
            if (navigator.userAgent.match(/msie/i) || navigator.userAgent.match(/trident/i) ){
                $("html").addClass("ie");
                //console.log('play slider');
                setTimeout(function () {
                    slick.slickSetOption("autoplay", true, true);
                    //console.log('play slider');

                    var slides = $homePageSlider.find('.slick-slide');
                    slides.each(function () {
                        var $this = $(this);
                        if ($this.hasClass('slick-active')) {
                            $this.addClass('is-active');
                            // $this.find('.homepageSliderCaption-fullList ul li').each(function(i, li) {
                            //     var $list = $(this).closest('ul');
                            //     $list.delay(400).queue(function() {
                            //         $(li).addClass('is-active');
                            //         $list.dequeue();
                            //     });
                            // });
                            $this.find('.homepageSliderCaption-fullList ul li').each(function(i, li) {
                                i = i + 1;
                                setTimeout(function(){
                                    $(li).addClass('is-active');
                                },500 + ( i * 200 ));
                            });
                        } else {
                            $this.removeClass('is-active');
                            $this.find('.homepageSliderCaption-fullList ul li').each(function(i) {
                                $(this).removeClass('is-active');
                            });
                        }
                    });
                    //console.log('active slider set');
                }, 2000);
            }
            $(window).on('load', function(){
                //console.log('window load');
                setTimeout(function () {
                    slick.slickSetOption("autoplay", true, true);
                    //console.log('play slider');

                    var slides = $homePageSlider.find('.slick-slide');
                    slides.each(function () {
                        var $this = $(this);
                        if ($this.hasClass('slick-active')) {
                            $this.addClass('is-active');
                            // $this.find('.homepageSliderCaption-fullList ul li').each(function(i, li) {
                            //     var $list = $(this).closest('ul');
                            //     $list.delay(400).queue(function() {
                            //         $(li).addClass('is-active');
                            //         $list.dequeue();
                            //     });
                            // });
                            $this.find('.homepageSliderCaption-fullList ul li').each(function(i, li) {
                                i = i + 1;
                                setTimeout(function(){
                                    $(li).addClass('is-active');
                                },500 + ( i * 200 ));
                            });
                        } else {
                            $this.removeClass('is-active');
                            $this.find('.homepageSliderCaption-fullList ul li').each(function(i) {
                                $(this).removeClass('is-active');
                            });
                        }
                    });
                    //console.log('active slider set');
                }, 2000);
            });
        }

        $homePageSlider.on('init', function (event, slick) {
            //console.log('init slider');
            timeout(slick);
        })
        $homePageSlider.slick({
            autoplay: false,
            autoplaySpeed: homePageSliderSpeed,
            infinite: true,
            arrows: false,
            dots: true,
            pauseOnHover: false,
            vertical: true,
            adaptiveHeight: true,
            slidesToShow: 1,
            fade: true,
            cssEase: 'ease-in-out',
            speed: 1000
        })
        .on('init', function (event, slick) {
            //console.log('init slider');
            //console.log('this is video slide');
            //console.log('init video functionality, run double animation for description');
        })
        .on('beforeChange', function (event, slick, currentSlide, nextSlide) {
           // slick.slickSetOption("autoplay", false, false);
            $('.homepageSliderCaption-fullList ul li').each(function(i) {
                $(this).removeClass('is-active');
            });
        })
        .on('afterChange', function(event, slick, currentSlide){
            // if( currentSlide == 0 ) {
            //     console.log('this is video slide');
            //     console.log('init video functionality, run double animation for description');
            //     console.log('autoplay speed:', homePageSliderSpeed2x);
            //     slick.slickSetOption("autoplay", true, false);
            //     slick.slickSetOption("autoplaySpeed", homePageSliderSpeed2x, false);
            // }else {
            //     console.log('this is default slide');
            //     console.log('autoplay speed:', homePageSliderSpeed);
            //     slick.slickSetOption("autoplay", true, false);
            //     slick.slickSetOption("autoplaySpeed", homePageSliderSpeed, false);
            // }
            var slides = $homePageSlider.find('.slick-slide');
            slides.each(function () {
                var $this = $(this);
                if ($this.hasClass('slick-active')) {
                    $this.addClass('is-active');
                    // $this.find('.homepageSliderCaption-fullList ul li').each(function(i, li) {
                    //     var $list = $(this).closest('ul');
                    //     $list.delay(400).queue(function() {
                    //         $(li).addClass('is-active');
                    //         $list.dequeue();
                    //     });
                    // });
                    $this.find('.homepageSliderCaption-fullList ul li').each(function(i, li) {
                        i = i + 1;
                        setTimeout(function(){
                            $(li).addClass('is-active');
                        },500 + ( i * 200 ));
                    });
                } else {
                    $this.removeClass('is-active');
                    $this.find('.homepageSliderCaption-fullList ul li').each(function(i) {
                        $(this).removeClass('is-active');
                    });
                }
            });
            //console.log('active slider set');
            heroVideo();
        });

       function heroVideo() {
            var $heroVideo = $('.js-heroVideo'),
                $videoPause = $('.js-videoPause'),
                $videoPlay = $('.js-videoPlay'),
                $videoMute = $('.js-videoMute'),
                $videoSound = $('.js-videoSound');

            if($heroVideo.length) {
                $heroVideo.each(function(){
                    var $video = $(this),
                        $videoSlide = $video.closest('.slick-slide'),
                        $videoControls = $video.siblings('.js-videoControls');
                    if($videoSlide.hasClass('slick-active')) {
                        $video.get(0).play();
                    }
                    else {
                        $video.get(0).pause();
                    }

                    $video.get(0).onplaying = function() {
                        $videoControls.show();
                    };

                    if($videoControls.find($videoPause).length) {
                        $videoControls.find($videoPause).on('click', function(){
                            $video.get(0).pause();
                            $(this).hide();
                            $videoControls.find($videoPlay).show();
                        });
                    }

                    if($videoControls.find($videoPlay).length) {
                        $videoControls.find($videoPlay).on('click', function(){
                            $video.get(0).play();
                            $(this).hide();
                            $videoControls.find($videoPause).show();
                        });
                    }

                    if($videoControls.find($videoMute).length) {
                        $videoControls.find($videoMute).on('click', function(){
                            $video.get(0).muted = true;
                            $(this).hide();
                            $videoControls.find($videoSound).show();
                        });
                    }

                    if($videoControls.find($videoSound).length) {
                        $videoControls.find($videoSound).on('click', function(){
                            $video.get(0).muted = false;
                            $(this).hide();
                            $videoControls.find($videoMute).show();
                        });
                    }



                });
            }

       }

        heroVideo();

        $(window).on('resize', function(){
            sliderHeight();
        });
    });


})(jQuery);
