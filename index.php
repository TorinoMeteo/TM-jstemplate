<?PHP 
include_once './include/header.php';
?>

<body>

<script type="text/javascript">
var Dati = new DatiRealtime('MeteoData');
Dati.RawFile = './GetRaw.php';
Dati.Path = 'MeteoData.dat';

var HistData = new DatiStorico('MonthData');
HistData.RawFile = './GetHistRaw.php';
HistData.Path = './NOAA/RAW-2014-07.txt';

$( document ).ready(function() {

	Dati.UpdateDiv('Curr_DT'); 
	Dati.UpdateDiv('StationName'); 
	RotateTo('#WindDir',150);
	RotateTo('#WindGustDir',190);
	
	$('#Temp_Thermometer').TrackingEl('#Temp_Graph',15,-50,InitDivTempGraph);
	$('#Rain').TrackingEl('#Rain_Graph',-355,-285,InitDivWindGraph);
	$('#wind_dir_gauge').TrackingEl('#Wind_Graph',15,15,InitDivWindGraph);
    SetThermometerValue('#Temp_Fill',22.5);
	SetThermometerValue('#App_Temp_Fill',28.5);
	
	setInterval(function(){
	RotateTo('#WindDir',Math.floor((Math.random() * 360)));
	RotateTo('#WindGustDir',Math.floor((Math.random() * 360)));
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

<div id="Temp_MinMax" class="Square_MinMAx">
<div class="TriangleUp"></div>
<div id="TMax" class="TValue">55°C</div>
<div class="TriangleDown"></div>
<div id="TMin" class="TValue">-55°C</div>
</div>
<div id="Temp_Thermometer" class="Thermometer">
<div id="Temp_Fill"></div> 
<img class="Thermoimages" src="./images/ThermoMeter.png">
<div id="Temp" class="Tempvalue">45°C</div>

<div class="Thick">
<div class="T10 T">50</div>
<div class="T9 T">40</div>
<div class="T8 T">30</div>
<div class="T7 T">20</div>
<div class="T6 T">10</div>
<div class="T5 T">0</div>
<div class="T4 T">-10</div>
<div class="T3 T">-20</div>
<div class="T2 T">-30</div>
<div class="T1 T">-40</div>
</div>
</div>

<div id="header">
<div id="Current_Condition"><img src="<?= getFeed($WeatherPath) ?>"/></div>
<div id="StationName"></div>
</div>
<div id="Webcam"><img height="240" width="320" alt="<?= $webcam_desc;?>" src="<?=$webcam_url ?>"/> </div>

<div id="App_Temp_MinMax" class="Square_MinMAx">
<div class="TriangleUp"></div>
<div id="AppTMax" class="TValue">55°C</div>
<div class="TriangleDown"></div>
<div id="AppTMin" class="TValue">-55°C</div>
</div>
<div id="App_Temp_Thermometer" class="Thermometer">
<div id="App_Temp_Fill"></div> 
<img class="Thermoimages" src="./images/ThermoMeter.png">
<div id="AppTemp" class="Tempvalue">45°C</div>

<div class="Thick">
<div class="T10 T">50</div>
<div class="T9 T">40</div>
<div class="T8 T">30</div>
<div class="T7 T">20</div>
<div class="T6 T">10</div>
<div class="T5 T">0</div>
<div class="T4 T">-10</div>
<div class="T3 T">-20</div>
<div class="T2 T">-30</div>
<div class="T1 T">-40</div>
</div>
</div>


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
