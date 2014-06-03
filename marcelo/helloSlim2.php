<?php
	require '../slim_path.php';
	
	$app = new \Slim\Slim();

	$app->get('/:name', function ($name) {
		echo "Hello $name!";
	});

	$app->run();


?>
