<?PHP
//$Request = $_POST['Req'];
//$Path = $_POST['Path'];
$Path="./NOAA/RAW-2014-07.txt"

$Raw'Data'Obj = array(

		);

$output=""; 
$file = fopen($Path, "r"); 

while(!feof($file)) { 
  $output = $output . fgets($file, 4096); 
} 
echo $output;
fclose ($file); 


$InData = explode("\n", str_replace(",",".",$output));
print_r($InData);
foreach ($InData as $line => $value) {
	$row = explode(";", $value);
	print_r($row);
} 


?>
