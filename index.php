<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TorinoMEteoLive Javascript template</title>
<link href="./style/layout.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script type="text/javascript" src="./js/jQueryRotate.js"></script>
<script type="text/javascript" src="./js/Tm-Ajax.js"></script>

<script type="text/javascript">
var Dati = new DatiRealtime('MeteoData');
Dati.RawFile = './GetRaw.php';
Dati.Path = 'MeteoData.dat';


$( document ).ready(function() {

	Dati.UpdateDiv('Curr_DT'); 
	Dati.UpdateDiv('StationName'); 
	$('#WindDir').rotate({ animateTo:150,duration:8000 ,easing: $.easing.easeInOut });
	$('#WindGustDir').rotate({ animateTo:190,duration:8000 ,easing: $.easing.easeInOut });

	setInterval(function(){
	$('#WindDir').rotate({ animateTo:Math.floor((Math.random() * 360)),duration:8000 ,easing: $.easing.easeInOut });
	$('#WindGustDir').rotate({ animateTo:Math.floor((Math.random() * 360)),duration:8000 ,easing: $.easing.easeInOut });
	
	}, 10000);

});

</script>
</head>
<body>
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

<div id="Temp_Graph"></div>
<div id="Wind_Graph"></div>
<div id="Rain_Graph"></div>

</div>
</body>

</html>
