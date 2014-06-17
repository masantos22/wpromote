<?php
	function fib($n){
		if($n == 1 || $n == 2 ) return 1;
		$prev2 = 1;
		$prev1 = 1;
		for($i = 3;$i <= $n; $i++){
			$aux = $prev1;
			$prev1 = $prev1 + $prev2;
			$prev2 = $aux;
		}
		return $prev1;
	}


	$end = 3;
	while(true){
		$result = fib($end);
		if($result >= 1000)
			break;
		$end *= 2;
	}
	print "BREAK";
	$begin = $end/2;
	$mid = ($begin + $end ) / 2;

	while($end - $begin > 1){
		printf("%d\n",$end-$begin);
		if(fib($mid) > 1000){
			$end = $mid;
		}
		else
			$begin = $mid;
		$mid = floor(($begin + $end) / 2);
	}
	if(fib($begin) > 1000) print "$begin\n";
	else print "$end\n";
?>
