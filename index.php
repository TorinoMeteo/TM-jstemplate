<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TorinoMEteoLive Javascript template</title>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="./js/Tm-Ajax.js"></script>

<script type="text/javascript">
var Dati = new DatiRealtime('MeteoData');
Dati.RawFile = './GetRaw.php';
Dati.Path = 'meteodata.dat';


$( document ).ready(function() {

	Dati.UpdateDiv('Curr_DT'); 

});

</script>
</head>
<body>
<span id="Curr_DT"></span>

</body>

</html>
