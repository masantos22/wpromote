<?php

	require '../vendor/autoload.php';
	use Slim\Slim;
	$app = new \Slim\Slim();
	
	$app->get('/clients','get_clients');
	$app->get('/clients/:id','get_client');
	$app->post('/clients','add_client');
	$app->put('/clients/:id','update_client');
	$app->delete('/clients/:id','delete_client');
	
	$app->run();


	class get_connection{
		public static $con;
		
		public function __construct(){

		}
		
		public static function get(){
			if(!self::$con)
				self::$con = new mysqli('127.0.0.1','root','esqueci22','marcelo');

			return self::$con;		
		
		}
	}


	function delete_client($id){
		$request = Slim::getInstance()->request();
		$sql = "DELETE FROM clients WHERE id = $id";
		try{
			$db = get_connection::get();
			$r = $db->query($sql);
		}catch(PDOException $e){
			echo json_enconde(array('error'=>
				array(
					'message'=>$e->getMessage()
				)
			));
		}
	}	

	function update_make_query($args){
		error_log(json_encode($args));
		$s = array();
		foreach($args as $k => $v){
			$s[] = "$k='$v'";
		}
		return implode(',',$s);
	}

	function update_client($id){
		$request = Slim::getInstance()->request();
		$c = json_decode($request->getBody());

			
		$resp = Slim::getInstance()->response();
		$resp->setBody(json_encode(array('chimdi',$resp)));
		return true;
		$set = update_make_query($c);
		if(isset($c)){
			$sql = sprintf("UPDATE clients SET %s WHERE id = %s",
				$set,
				$id
			);	
			error_log($sql);	
		}else{
			return json_encode(array('status'=>false));
		}
		
		try{
			$db = get_connection::get();
			$r = $db->query($sql);
			print_r($c);
		}catch(PDOException $e){
			echo json_enconde(array('error'=>
				array(
					'message'=>$e->getMessage()
				)
			));
		}
	}

	function add_client(){
		$request = Slim::getInstance()->request();
		$c = json_decode($request->getBody());
		$sql = "INSERT INTO clients (Name,Age) VALUES ('$c->Name',$c->Age)";
		try{
			$db = get_connection::get();
			$r = $db->query($sql);
			print_r($c);
		}catch(PDOException $e){
			echo json_enconde(array('error'=>
				array(
					'message'=>$e->getMessage()
				)
			));
		}
	}

	function get_clients() {
    		$sql = "select * FROM clients ORDER BY name";
    		try {
        		$db = get_connection::get();
        		$r = $db->query($sql);
			while($row = $r->fetch_object())
				echo json_encode(array('client'=>$row)). "\n";
    		} catch(PDOException $e) {
			echo json_encode(array('error'=>
				array(
					'message'=>$e->getMessage()
				)
			));
   	 	}	
	}
	
	function get_client($id){
		$sql = "select * from clients where id=$id";
		try{
			$db = get_connection::get();
			$r = $db->query($sql);
			$row = $r->fetch_object();
			echo json_encode(array('client'=>$row));
		}catch(PDOException $e){
			echo json_encode(array('error'=>
				array(
					'message'=>$e->getMessage()
				)
			));
		}
	}


?>

