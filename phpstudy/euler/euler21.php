<?php
	function sum_divisors($num){
		$sum = 1;
		foreach(range(2,$num/2) as $k ){
			if ($num%$k == 0)
				$sum += $k;
		}
		return $sum;
	}

	foreach(range(0,10000)

?>
