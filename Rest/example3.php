<?php
	require_once('db.php');
	require_once ('../slim_path.php');
	require_once('resources.php');
	use Slim\Slim;
	$app = new \Slim\Slim();

	
	$app->get('/clients/:id','\resource:display');
//	$app->get('/clients/:id','get_client'); 
//	$app->post('/clients','add_client');
//	$app->put('/clients/:id','update_client'); 
//	$app->delete('/clients/:id','delete_client');
	$app->run();


?>
