<?php
	$start = microtime(true);

	function factorial($n)
	{
		$j = 1;
		for($i = $n; $i > 0; $i--)
			$j *= $i;	
		return $j;
	}
	$total_num = range(0,9);
	$order = array();
	$begin = 0;
	$position = 2;

	while(!empty($total_num)){
		$aux = 0;
		$fact_all = factorial(count($total_num))/count($total_num);
		foreach($total_num as $k => $v){
			$aux += $fact_all;
			if( $aux >= ($position - $begin)){
				$order[] = $v;
				unset($total_num[$k]);
				$begin += $aux - $fact_all;
				break;
			}
		}
	}
	//print_r($order);
	$result = implode($order,"");
	print "$result\n";
	$end = 1000*(microtime(true) - $start);
	print "$end\n";
?>

