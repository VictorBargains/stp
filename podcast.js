(function($) {
    var initialClass = 'glyphicon-play-circle'
    ,   playingClass = 'glyphicon-pause'
    ,   pausedClass = 'glyphicon-play'
    ;
    
    function playPauseAudioPlayer(e){
        var $el = $(e.target)
        ,   $a = $el.closest('a')
        ,   $player = $el.closest('article').find('.podcast_player')
        ,   $btn = $player.find('.mejs-playpause-button button')
        ;
        if( $btn.length ){
            $btn.click();
//            setTimeout(function(){
//                var $title = $btn.attr('title');
//                // Copy title
//                $a.attr('title', $title);
//                // Copy play/pause icon
//                if( $title == 'Pause' ){
//                    $a.find('.playpause-button').removeClass('glyphicon-play').addClass('glyphicon-pause');
//                } else {
//                    $a.find('.playpause-button').removeClass('glyphicon-pause').addClass('glyphicon-play');
//                }
//            }, 10);

        }

        // return false to prevent click from activating link
        return false;
    }
    function resizeSlider(e){
        $('.sp-widget-post-slider-section').css('max-width', Math.max($(window).width()-40, 0));
    }
//    resizeSlider(); // do before everything loads
    $(document).ready(function(){
        resizeSlider(); // do after everything loads
        $(window).resize(resizeSlider); // do after resize
        $('.playpause a').click(playPauseAudioPlayer);
        $('audio').each(function(i, el){
            var $media = $(el);
            $media.addEventListener('play', function(e){
                $(el).closest('article').find('.playpause-button').removeClass(initialClass).removeClass(pausedClass).addClass(playingClass).closest('a').attr('title', 'Pause');
            });
            $media.addEventListener('pause', function(e){
                $(el).closest('article').find('.playpause-button').removeClass(initialClass).removeClass(playingClass).addClass(pausedClass).closest('a').attr('title', 'Play');
            });
            $media.addEventListener('ended', function(e){
                $(el).closest('article').find('.playpause-button').removeClass(playingClass).removeClass(pausedClass).addClass(initialClass).closest('a').attr('title', 'Play');
            });
        });
    });

})(jQuery);