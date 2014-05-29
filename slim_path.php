<?php
	// home computer
	if("Linux" == exec("uname")){
		require '/usr/local/Slim/Slim/Slim.php';
		\Slim\Slim::registerAutoloader();
	}
	// wpromote
	else{
		require '/Users/marceloazevedo/Project/vendor/autoload.php';
	}
	
?>
