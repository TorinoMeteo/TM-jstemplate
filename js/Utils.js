(function($) {
    $.fn.TrackingEl = function(Elem) {    
        var tcEl = this;    
        $('body').append('<div id="'+Elem+'"/>');
        $(document).mousemove(function(mTC){
            $("#"+Elem).css({top:(mTC.pageY+15)+"px",left:(mTC.pageX+15)+"px"});
        });
        tcEl.each(function(){
           var el = $(this);
           var ti = el.attr('title');   
           el.hover(function(){
                $("#"+Elem).fadeTo(300, 1).html( ti );        
                el.attr('title', '');
            },function(){
                $("#"+Elem).hide().html('');
                el.attr('title', ti);
            });
        });
    };
})(jQuery);