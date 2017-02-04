(function($) {
    function playPauseAudioPlayer(e){
        var $el = $(e.target)
        ,   $a = $el.closest('a')
        ,   $player = $el.closest('article').find('.podcast_player')
        ,   $btn = $player.find('.mejs-playpause-button button')
        ;
        if( $btn.length ){
            $btn.click();
            setTimeout(function(){
                var $title = $btn.attr('title');
                // Copy title
                $a.attr('title', $title);
                // Copy play/pause icon
                if( $title == 'Pause' ){
                    $a.find('.playpause-button').removeClass('glyphicon-play').addClass('glyphicon-pause');
                } else {
                    $a.find('.playpause-button').removeClass('glyphicon-pause').addClass('glyphicon-play');
                }
            }, 10);

        }

        // return false to prevent click from activating link
        return false;
    }
    function resizeSlider(e){
        var screenX = $(window).width()
        ,   maxWidth = Math.max(screenX-40, 0)
        ;
        $('.sp-widget-post-slider-section').css('max-width', maxWidth);
//        $('.slick-track').css('max-width', maxWidth);
    }
    resizeSlider(); // do before everything loads
    $(document).ready(function(){
        resizeSlider(); // do after everything loads
        $('.playpause a').click(playPauseAudioPlayer);
    });
    $(window).resize(resizeSlider); // do after resize
})(jQuery);