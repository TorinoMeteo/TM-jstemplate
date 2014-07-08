<?PHP 
include_once './include/header.php';
?>

<body>

<script type="text/javascript">
var Dati = new DatiRealtime('MeteoData');
Dati.RawFile = './GetRaw.php';
Dati.Path = 'MeteoData.dat';

(function($) {
    $.fn.tclouds = function() {    
        var tcEl = this;    
        $('body').append('<div id="Temp_Graph"/>');
        $(document).mousemove(function(mTC){
            $("#Temp_Graph").css({top:(mTC.pageY+15)+"px",left:(mTC.pageX+15)+"px"});
        });
        tcEl.each(function(){
           var el = $(this);
           var ti = el.attr('title');   
           el.hover(function(){
                $('#Temp_Graph').fadeTo(300, 1).html( ti );        
                el.attr('title', '');
            },function(){
                $('#Temp_Graph').hide().html('');
                el.attr('title', ti);
            });
        });
    };
})(jQuery);

$( document ).ready(function() {

	Dati.UpdateDiv('Curr_DT'); 
	Dati.UpdateDiv('StationName'); 
	$('#WindDir').rotate({ animateTo:150,duration:8000 ,easing: $.easing.easeInOut });
	$('#WindGustDir').rotate({ animateTo:190,duration:8000 ,easing: $.easing.easeInOut });

	$('#Temp_Thermometer').tclouds();
	
	setInterval(function(){
	$('#WindDir').rotate({ animateTo:Math.floor((Math.random() * 360)),duration:8000 ,easing: $.easing.easeInOut });
	$('#WindGustDir').rotate({ animateTo:Math.floor((Math.random() * 360)),duration:8000 ,easing: $.easing.easeInOut });
	
	}, 10000);

});

</script>

<span id="Curr_DT"></span>
<div id="container">

<div id="wind_dir_gauge">

<img id="WindDir" class="arrow" src="./images/ArrowWind.png">
<img id="WindGustDir" src="./images/ArrowGust.png">
<div id="WindDir_num">123°</div>
<div id="GustDir_num">211°</div>

</div>
<div id="wind_speed_gauge"></div>



<div id="wind_speed_gauge"></div>

<div id="Temp_MinMax" class="Square_MinMAx"></div>
<div id="Temp_Thermometer" class="Thermometer"></div>

<div id="header">
<div id="Current_Condition"></div>
<div id="StationName"></div>
</div>
<div id="Webcam"></div>

<div id="App_Temp_MinMax" class="Square_MinMAx"></div>
<div id="App_Temp_Thermometer" class="Thermometer"></div>


<div id="Pressure_gauge"></div>
<div id="Humidity_Gauge"></div>

<div id="DP" class="Side_Box"></div>

<div id="Almanac"></div>

<div id="Rain" class="Side_Box"></div>
</div>
<div id="Temp_Graph"></div>
<div id="Wind_Graph"></div>
<div id="Rain_Graph"></div>
<?PHP 
include_once './include/footer.php';
?>
