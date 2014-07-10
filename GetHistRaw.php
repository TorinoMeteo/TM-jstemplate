<?PHP
//$Request = $_POST['Req'];
//$Path = $_POST['Path'];

$Path="./NOAA/RAW-2014-07.txt"

$RawDataObj = array(
		HistMeanTemp => array(Day=>array(),Data=>array()),
		HistMaxTemp => array(Day=>array(),Data=>array(),DTime=>array()),
		HistMinTemp => array(Day=>array(),Data=>array(),DTime=>array())
		HistHDD => array(Day=>array(),Data=>array()),
		HistCDD => array(Day=>array(),Data=>array()),
		HistRain => array(Day=>array(),Data=>array()),
		HistAvgWSpeed => array(Day=>array(),Data=>array()),
		HistMaxWSpeed => array(Day=>array(),Data=>array(),DTime=>array(),DDir=>array())
		);

$output=""; 
$file = fopen($Path, "r"); 

while(!feof($file)) { 
  $output = $output . fgets($file, 4096); 
} 
echo $output;
fclose ($file); 


$data = explode("\n", str_replace(",",".",$output));
print_r($data);
/* foreach ($data as $line => $value) {
	$row = explode(";", $value);
	print_r($row);
} */


?>
