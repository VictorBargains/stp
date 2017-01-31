(function($) {
    $(document).ready(function(){
        var $p_container = $('.podcast_player');
        $p_container.each(function(i, el){
            var callback;
            callback = function(){
                if( typeof mejs == 'undefined' ){
                    setTimeout(callback, 10);
                } else {
                    var $el = $(el),
                        $clone = $el.find('.mejs-playpause-button button')
                        .clone(true)
                        .addClass('playpause-cloned')
                        .appendTo($el.closest('article')
                            .find('header')
                        );
                }
            }
            callback();
        });     
    });
})(jQuery);