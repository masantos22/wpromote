<?php
	require 'slim_path.php';
	$app = new \Slim\Slim();

	$app->get('/', function () {
		echo "Hello World!";
	});
	$app->run();


?>
