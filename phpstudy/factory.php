<?php
	include_once 'dog.php';
	
	$dg1 = new Dog('ReX');
	echo $dg1->get_name();
	unset($dg1);
	echo "Killed the dog";
?>
