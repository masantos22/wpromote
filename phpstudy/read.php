<?php
//	$testfile = @readfile("read.txt");
//	if(!$testfile)
//		print "Could not open the file!";
//	else
//		print $testfile;

	// open file to read
	$filename = fopen("read.txt","r") OR die("Cant open file!");
	while(!feof($filename)){
		$line = fgets($filename);
		print $line;
	}
	fclose($filename);
	
?>
