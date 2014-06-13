<?php
	$a = "";
	print "Starting FORK\n";
	$pid = pcntl_fork();
	print "After FORK\n";
	if($pid == -1)
		die("Could not fork");
	else if ($pid){
		print "PARENT\n";
		$a = "PA";
	}
	else{
		echo "$a\n";
		print "CHILD\n";
	}
	
?>
