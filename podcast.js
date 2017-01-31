(function($) {
    $(document).ready(function(){
        var $p_player = $('.podcast_player');
        $p_player.each(function(i, el){
            var callback;
            callback = function(){
                var $el = $(el),
                    $p_btn = $el.find('.mejs-playpause-button button'),
                    $clone
                ;
                if( $p_btn.length ) {
                    
                        $clone = $p_btn.clone(true)
                        .addClass('playpause-cloned')
                        .appendTo($el.closest('article')
                            .find('header')
                        );

                }
                else {
                    setTimeout(callback, 10);
                }
            }
            callback();
        });     
    });
})(jQuery);