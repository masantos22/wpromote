<?php
	$i=0;
	foreach(range(0,999) as $k){
		if ($k%5 == 0 || $k%3 == 0){
			print "$i\n";
			$i += $k;
		}
	}
	print "\n$i";
?>
