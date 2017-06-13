/* video play */

(function($){
    $(function(){
        'use strict';

        var VideoPlayer = window.VideoPlayer || {};
        VideoPlayer = (function(){
            function VideoPlayer(element, settings) {
                var _ = this;
                var _default = {
                    'poster': $(element).find('img'),
                    'video': $(element).find('video'),
                    'positionStart': 1
                };

                _.element = element;
                _.options = $.extend(_default, settings);

                this.init();
            }
            return VideoPlayer;
        }());

        VideoPlayer.prototype.init = function() {
            var _ = this;

            _.videoStart();
            _.videoPausePlay();

            $(window).on('scroll', function(){
                _.videoStart();
            });

        };

        VideoPlayer.prototype.videoStart = function() {
          var _ = this,
              elementPositionTop = $(_.element).offset().top,
              elementPositionBottom = elementPositionTop + $(_.element).height(),
            windowPosition = $(window).scrollTop()/_.options.positionStart;

          if(!$(_.element).hasClass('videoPlayer-initialize') && !$(_.element).hasClass('videoPlayer-pause') && windowPosition > elementPositionTop && windowPosition < elementPositionBottom) {
            $(_.element).addClass('videoPlayer-initialize');
              $(_.element).removeClass('videoPlayer-unscroll');
            $(_.options.poster).fadeOut();
              _.videoPlay();

          }
          else if($(_.element).hasClass('videoPlayer-initialize') && (windowPosition <= elementPositionTop || windowPosition >= elementPositionBottom)){
               _.videoPause();
              $(_.element).removeClass('videoPlayer-initialize');
              $(_.element).addClass('videoPlayer-unscroll');
          } else {}
        };

        VideoPlayer.prototype.videoPausePlay = function() {
            var _ = this;
                $(_.element).on('click', function() {
                    if($(_.element).hasClass('videoPlayer-initialize')) {
                        _.videoPause();
                        $(_.element).removeClass('videoPlayer-initialize');
                        $(_.element).addClass('videoPlayer-pause');
                    }
                    else if($(_.element).hasClass('videoPlayer-pause')){
                        $(_.element).addClass('videoPlayer-initialize');
                        $(_.element).removeClass('videoPlayer-pause');
                        //_.videoPlay();
                        _.videoPlay();
                    }
                });

        };

        VideoPlayer.prototype.videoPlay = function() {
            var _ = this;
            _.options.video.get(0).play();
        };

        VideoPlayer.prototype.videoPause = function() {
            var _ = this;
            _.options.video.get(0).pause();
        };


        $.fn.videoPlayer = function(option){
            var _ = this;
            new VideoPlayer(_[0], option);
            return _;
        };
    });
})(jQuery);
