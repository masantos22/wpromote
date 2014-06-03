<?php

	$path = "/Users/marceloazevedo/FILE";
	$tmp_name = $_FILES['userfile']['tmp_name'];
	$name = $_FILES['userfile']['name'];


	if(move_uploaded_file($tmp_name,"$path/$name"))
		print "Received!";
	var_dump($_FILES);	
?>
