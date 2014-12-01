<?PHP
$Request = $_POST['Req'];
$Path = $_POST['Path'];

$RawDataObj = array(
		'HistMeanTemp' => array('Day'=>array(),'Data'=>array()),
		'HistMaxTemp' => array('Day'=>array(),'Data'=>array(),'DTime'=>array()),
		'HistMinTemp' => array('Day'=>array(),'Data'=>array(),'DTime'=>array()),
		'HistHDD' => array('Day'=>array(),'Data'=>array()),
		'HistCDD' => array('Day'=>array(),'Data'=>array()),
		'HistRain' => array('Day'=>array(),'Data'=>array()),
		'HistAvgWSpeed' => array('Day'=>array(),'Data'=>array(),'DDir'=>array()),
		'HistMaxWSpeed' => array('Day'=>array(),'Data'=>array(),'DTime'=>array())
		);

$output=""; 
$file = fopen($Path, "r") or die("Unable to open File"); 

while(!feof($file)) { 
  $output = $output . fgets($file, 4096); 
} 
fclose ($file); 


$InData = explode("\n", str_replace(",",".",$output));

foreach ($InData as $subarray) {
	if($subarray !='!EOM!')
	{
		$RowData = explode(";", $subarray);
		if($RowData[1] != 'null')
		{
		//Day Value
		$RawDataObj['HistMeanTemp']['Day'][] = $RowData[0];
		$RawDataObj['HistMaxTemp']['Day'][] = $RowData[0];
		$RawDataObj['HistMinTemp']['Day'][] = $RowData[0];
		$RawDataObj['HistHDD']['Day'][] = $RowData[0];
		$RawDataObj['HistCDD']['Day'][] = $RowData[0];
		$RawDataObj['HistRain']['Day'][] = $RowData[0];
		$RawDataObj['HistAvgWSpeed']['Day'][] = $RowData[0];
		$RawDataObj['HistMaxWSpeed']['Day'][] = $RowData[0];
		
		//Data Value
		$RawDataObj['HistMeanTemp']['Data'][] = $RowData[1];
		$RawDataObj['HistMaxTemp']['Data'][] = $RowData[2];
		$RawDataObj['HistMinTemp']['Data'][] = $RowData[4];
		$RawDataObj['HistHDD']['Data'][] = $RowData[6];
		$RawDataObj['HistCDD']['Data'][] = $RowData[7];
		$RawDataObj['HistRain']['Data'][] = $RowData[8];
		$RawDataObj['HistAvgWSpeed']['Data'][] = $RowData[9];
		$RawDataObj['HistMaxWSpeed']['Data'][] = $RowData[10];
		
		//DTime Value
		$RawDataObj['HistMaxTemp']['DTime'][] = $RowData[3];
		$RawDataObj['HistMinTemp']['DTime'][] = $RowData[5];
		$RawDataObj['HistMaxWSpeed']['DTime'][] = $RowData[11];
		
		//DDir Value
		$RawDataObj['HistAvgWSpeed']['DDir'][] = $RowData[12];
		}
		else
		{
			break;
		}
	}
	else
	{
	 break;
	}
	
}

echo json_encode($RawDataObj[$Request]);

?>


