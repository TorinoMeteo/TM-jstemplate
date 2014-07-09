<?PHP 
include_once './include/header.php';
include_once './include/config.php';
?>

<body>

<script type="text/javascript">
var Dati = new DatiRealtime('MeteoData');
Dati.RawFile = './GetRaw.php';
Dati.Path = 'MeteoData.dat';



$( document ).ready(function() {

	Dati.UpdateDiv('Curr_DT'); 
	Dati.UpdateDiv('StationName'); 
	RotateTo('WindDir',150);
	RotateTo('WindGustDir',190);
	
	$('#Temp_Thermometer').TrackingEl('Temp_Graph',15,-50);
	$('#Rain').TrackingEl('Rain_Graph',-355,-285);
	$('#wind_dir_gauge').TrackingEl('Wind_Graph',15,15);
	
	
	
	
	
	setInterval(function(){
	RotateTo('WindDir',Math.floor((Math.random() * 360)));
	RotateTo('WindGustDir',Math.floor((Math.random() * 360)));

	
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
<div id="Webcam"><img alt="<?= $webcam-desc ?>" src="<?= $webcam-url ?>"/></div>

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
