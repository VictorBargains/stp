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
    $(document).ready(function(){
        $('.playpause a').click(playPauseAudioPlayer);        
    });
})(jQuery);