<?PHP 
include_once './include/header.php';
?>

<body>
<script type="text/javascript">

<?PHP 
$year = date('Y'); 
$month = date('m');  
$lmonth = date('m') - 1; 
?>
var Dati = new DatiRealtime('MeteoData');
Dati.RawFile = './GetRaw.php';
Dati.Path = 'MeteoData.dat';

var HistMonthData = new DatiStorico('MonthData');
HistMonthData.RawFile = './Get2MonthRaw.php';
HistMonthData.Path1 = './NOAA/RAW-<?= $year.'-'.$lmonth ?>.txt'; // month -1
HistMonthData.Path2 = './NOAA/RAW-<?= $year.'-'.$month ?>.txt'; // this month


$( document ).ready(function() {

	Dati.UpdateDiv('Temp'); 
	SetThermometerValue('#Temp_Fill',Dati.RawData('Temp'));
	Dati.UpdateDiv('TMax'); 
	Dati.UpdateDiv('TMin'); 

	Dati.UpdateDiv('DewPoint'); 
	SetThermometerValue('#Dew_Point_Fill',Dati.RawData('DewPoint'));
	Dati.UpdateDiv('DPMax'); 
	Dati.UpdateDiv('DPMin'); 
	
	Dati.UpdateDiv('StationName'); 

	Dati.UpdateDiv('WindDir'); 
	Dati.UpdateDiv('GustDir'); 
	RotateTo('#WindDirG',Dati.RawData('WindDir'));
	RotateTo('#WindGustDirG',Dati.RawData('GustDir'));
	InitWindSpeedGauge(80);//Dati.RawData('Wind')

	InitDivTempGraph(HistMonthData.RawData('HistMeanTemp'),HistMonthData.RawData('HistMaxTemp'),HistMonthData.RawData('HistMinTemp'));
	InitDivWindGraph(HistMonthData.RawData('HistAvgWSpeed'),HistMonthData.RawData('HistMaxWSpeed'));
	InitDivRainGraph(HistMonthData.RawData('HistRain'));
	$('#Temp_Thermometer').TrackingEl('#Temp_Graph',15,-50);
	$('#Rain').TrackingEl('#Rain_Graph',-605,-310);
	$('#wind_dir_gauge').TrackingEl('#Wind_Graph',15,15);
	

	
	
	setInterval(function(){
	//RotateTo('#WindDir',Math.floor((Math.random() * 360)));
	//RotateTo('#WindGustDir',Math.floor((Math.random() * 360)));
	}, 10000);

});

</script>

<span id="Curr_DT"></span>
<div id="container">
<div id="pippo"></DIV>
<div id="wind_dir_gauge">

<img id="WindDirG" class="arrow" src="./images/ArrowWind.png">
<img id="WindGustDirG" src="./images/ArrowGust.png">
<div id="WindDir_num">WND:<span id="WindDir">23</span>°</div>
<div id="GustDir_num">GST:<span id="GustDir">23</span>°</div>

</div>
<div id="wind_speed_gauge"></div>
<div id="wind_gust_gauge"></div>

<div id="Temp_MinMax" class="Square_MinMAx">
<div class="ValueHeader">Temp.</div>
<div class="TriangleUp"></div>
<div class="TValue"><span id="TMax">55</span>°C</div>
<div class="TriangleDown"></div>
<div class="TValue"><span id="TMin">-55</span>°C</div>
</div>
<div id="Temp_Thermometer" class="Thermometer">
<div id="Temp_Fill"></div> 
<img class="Thermoimages" src="./images/ThermoMeter.png">
<div class="Tempvalue"><span id="Temp">45</span>°C</div>

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

<div id="Dew_Point_MinMax" class="Square_MinMAx">
<div class="ValueHeader">Dew P.</div>
<div class="TriangleUp"></div>
<div class="TValue"><span id="DPMax">55</span>°C</div>
<div class="TriangleDown"></div>
<div class="TValue"><span id="DPMin">-55</span>°C</div>
</div>
<div id="Dew_Point_Thermometer" class="Thermometer">
<div id="Dew_Point_Fill"></div> 
<img class="Thermoimages" src="./images/ThermoMeter.png">
<div class="Tempvalue"><span id="DewPoint">45</span>°C</div>

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

<div id="Almanac"></div>

<div id="Rain" class="Side_Box"></div>
</div>
<div id="Temp_Graph"></div>
<div id="Wind_Graph"></div>
<div id="Rain_Graph"></div>
<?PHP 
include_once './include/footer.php';
?>
