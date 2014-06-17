<?php
	$abundant_nums = array();
	
	$interval = 28123;
	
	// find all abundant numbers
	for($i = 11;$i < 28124; $i++)
	{	
		if(check_div($abundant_nums,$i))
			$abundant_nums[] = $i;
		else if(divisor($i))
			$abundant_nums[] = $i;
	}
	$range_abd = array();
	$all = range(0,28123);

	for($i = 0; $i < count($abundant_nums); $i++){
		for($j = 0;$j < count($abundant_nums); $j++){
			$n = $abundant_nums[$i] + $abundant_nums[$j];
			if($n >= 28124)
				break;
			else
				$all[$n] = 0;	
		}
	}
	$total = array_sum($all);
	echo "$total\n";
	
	function check_div($num_arrays,$i)
	{
		if(!empty($num_arrays))
			foreach($num_arrays as $v){
				if($i % $v == 0 )
					return true;
			}
		return false;
	}


	function divisor($num)
	{
		$sum_div = 1;
		for($k = 2;$k < $num/2 + 1 ; $k++){
			if ($num%$k == 0 )
				$sum_div += $k;
		}
		if($sum_div > $num)
			return $sum_div;
		else
			return false;
	}
?>
