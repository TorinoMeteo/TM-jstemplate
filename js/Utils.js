
// tracking div with fade
(function($) {
    $.fn.TrackingEl = function(Elem,X,Y) {    
        var tcEl = this;    
        $('body').append('<div id="'+Elem+'"/>');
        $(document).mousemove(function(mTC){
            $("#"+Elem).css({top:(mTC.pageY+Y)+"px",left:(mTC.pageX+X)+"px"});
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

//rotate Image Function
function RotateTo(Elem,Target)
{
$('#'+Elem).rotate({ animateTo:Target,duration:8000 ,easing: $.easing.easeInOut });
}