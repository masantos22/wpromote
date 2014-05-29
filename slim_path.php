<?php
	// home computer
	if("Linux" == exec("uname")){
		require '/usr/local/Slim/Slim/Slim.php';
		\Slim\Slim::registerAutoloader();
	}
	// wpromote
	else{
//		require '/home/marceloazevedo/Project/vendor/autoload.php';
//		use Slim\Slim;
	}
	
?>
