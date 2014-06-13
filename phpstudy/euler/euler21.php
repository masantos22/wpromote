<?php
	function sum_divisors($num){
		$sum = 1;
		if($num != 1){
			foreach(range(2,floor($num/2)) as $k ){
				if ($num%$k == 0)
					$sum += $k;
			}
		}
		return $sum;
	}
	$values = array();
	foreach(range(5,10000) as $k ){
		if(empty($values[$k]) && !in_array($k,$values)){ 
			$s1 = sum_divisors($k);
			if($k != $s1){
				$s2 = sum_divisors($s1);
				if($k == $s2)
					$values[$k] = $s1;
			}
		}
	}
	print_r($values);	
	$total = 0;
	$total = array_sum($values) + array_sum(array_keys($values));
	echo "$total\n";

?>
