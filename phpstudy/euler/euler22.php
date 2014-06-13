<?php
	$filename = fopen("names.txt","r") OR die("Cannot open file");
	$names = "";
	while(!feof($filename)){
		$names .= fgets($filename);
	}
	$names_array = explode('","',$names);
	$names_array[0] = ltrim($names_array[0],'"');
	$names_array[5162] = substr($names_array[5162],0,-1);
	sort($names_array);
	$sum = 0;
	foreach($names_array as $k => $v){
		$sum += ($k + 1) * position($v);
	}
	echo $sum;

	function position($name){
		$sum = 0;
		for($i = 0; $i < strlen($name); $i++)
			$sum += ord($name{$i}) - 64;

		return $sum;
	}
?>
