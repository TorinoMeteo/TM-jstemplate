<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TorinoMEteoLive Javascript template</title>
<link href="./style/layout.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="./js/Tm-Ajax.js"></script>

<script type="text/javascript">
var Dati = new DatiRealtime('MeteoData');
Dati.RawFile = './GetRaw.php';
Dati.Path = 'MeteoData.dat';


$( document ).ready(function() {

	Dati.UpdateDiv('Curr_DT'); 

});

</script>
</head>
<body>
<span id="Curr_DT"></span>
<div id="container">

<div id="wind_dir_gauge"></div>
<div id="wind_speed_gauge"></div>

<div id="Temp_MinMax" class="Square_MinMAx"></div>
<div id="Temp_Thermometer" class="Thermometer"></div>

<div id="Webcam"></div>

<div id="App_Temp_MinMax" class="Square_MinMAx"></div>
<div id="App_Temp_Thermometer" class="Thermometer"></div>


<div id="Pressure_gauge"></div>
<div id="Humidity_Gauge"></div>


</div>
</body>

</html>
