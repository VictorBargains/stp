(function($) {
    function playPauseAudioPlayer(e){
        var $el = $(e.target)
        ,   $player = $el.closest('.podcast_player')
        ,   $btn = $player.find('.mejs-playpause-button')
        ,   $title = $btn.attr('title')
        ;
        if( $btn.length ){
            $btn.click();
            // Copy title
            $el.attr('title', $title);
            // Copy play/pause icon
            if( $title = 'Pause' ){
                $el.find('.playpause-button').removeClass('glyphicon-play').addClass('glyphicon-pause');
            } else {
                $el.find('.playpause-button').removeClass('glyphicon-pause').addClass('glyphicon-play');
            }

        }

        // return false to prevent click from activating link
        return false;
    }
    $(document).ready(function(){
        $('.playpause a').click(playPauseAudioPlayer);        
    });
})(jQuery);