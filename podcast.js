(function($) {
    $(document).ready(function(){
        var $p_container = $('.podcast_player mejs-playpause-button');
        $p_container.each(function(i, el){
            var $el = $(el),
                $clone = $el.find('button').clone(true).addClass('playpause-cloned');
        $clone.appendTo($el.closest('article').find('header'));
        });     
    });
})(jQuery);