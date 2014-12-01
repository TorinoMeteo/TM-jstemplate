<?PHP
$Request = $_POST['Req'];
$Path = $_POST['Path'];

$RawDataObj = array(
		StationName => null,
		Curr_DT => null,
		Temp => null,
		TMax => null,
		TMaxTime => null,
		TMin => null,
		TMinTime => null,
		AppTemp => null,
		AppTMax => null,
		AppTMaxTime => null,
		AppTMin => null,
		AppTMinTime => null,
		Press => null,
		PMax => null,
		PMaxTime => null,
		PMin => null,
		PMinTime => null,
		DewPoint => null,
		DPMax => null,
		DPMaxTime => null,
		DPMin => null,
		DPMinTime => null,
		Hum => null,
		HMax => null,
		HMaxTime => null,
		HMin => null,
		HMinTime => null,
		Wind => null,
		WindDir => null,
		Gust => null,
		GustDir => null,
		WMax => null,
		WMaxTime => null,
		RainRate => null,
		RRMax => null,
		RRMaxTime => null,
		DayRain => null,
		WeekRain => null,
		MonthRain => null,
		YearRain => null,
		EOF => null
		);

$output=""; 
$file = fopen($Path, "r") or die("Unable to open File");  

while(!feof($file)) { 
  $output = $output . fgets($file, 4096); 
} 

fclose ($file); 


$data = explode("\n", str_replace(",",".",$output));
$i=0;

foreach ($RawDataObj as $key => $value) {
	$RawDataObj[$key] = $data[$i];
	$i++;
}

echo $RawDataObj[$Request];

?>
