<?PHP
//$Request = $_POST['Req'];
//$Path = $_POST['Path'];

$Path="NOAA/RAW-2014-07.txt"

$RawDataObj = array(
		Day => null,
		TMean => null,
		TMax => null,
		TMaxTime => null,
		TMin => null,
		TMinTime => null,
		HeatDeg => null,
		CoolDeg => null,
		Rain => null,
		WMean => null,
		WMax => null,
		WTime => null,
		DOMDIR => null
		);

$output=""; 
$file = fopen($Path, "r"); 

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
