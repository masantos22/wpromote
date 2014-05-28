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

	// NOTES: Double Names need to be checked!

	// transform the body_content into JSON
	function body_to_json($body_content){
		if($body_content){
			if ( json_decode($body_content) == null ){
				$json = "{";
				$args = explode('&',$body_content);
				foreach($args as $arg){
					$arg = explode('=',$arg);
					$json .= "\"$arg[0]\":" ."\"$arg[1]\"," ;
				}
				$json = substr($json,0,-1).'}';
				return $json;
			}	
		}
		return $body_content;
	}

	class get_connection{
		public static $con;
		
		public function __construct(){

		}
		
		public static function get(){
			if(!self::$con)
				self::$con = new mysqli('');

			return self::$con;		
		
		}
	}


	function delete_client($id){
		$request = Slim::getInstance()->request();
		$sql = "DELETE FROM clients WHERE id = $id";
		try{
			$db = get_connection::get();
			$r = $db->query($sql);
		}catch(Exception $e){
			echo json_enconde(array('error'=>
				array(
					'message'=>$e->getMessage()
				)
			));
		}
		echo "Deleted!";
	}	


	function update_client($id){
		$request = Slim::getInstance()->request();
		$c = json_decode(body_to_json($request->getBody()),true);
		$set = '';
		foreach($c as $k => $v ){
			$set .= "`{$k}` = '{$v}',";
		}
		if($set){
			$set = "SET " . substr($set,0,-1);	
		}
	
		$sql = sprintf("UPDATE clients %s WHERE id = {$id}",$set);
		try{
			$db = get_connection::get();
			$check_id = "SELECT EXISTS(SELECT 1 FROM clients WHERE id = {$id})";	
			$result = $db->query($check_id);
			$result = $result->fetch_object();
			foreach($result as $k => $v )
				$count = $v; 
			if($count){
				$r = $db->query($sql);
				echo 'Updated!';
			}
			else{
				echo 'Inexistent resource.';
			}
		}catch(Exception $e){
			echo json_enconde(array('error'=>
				array(
					'message'=>$e->getMessage()
				)
			));
		}
	}

	function add_client(){
		$request = Slim::getInstance()->request();
		$c = json_decode(body_to_json($request->getBody()));
		$values = '';
		$keys = '';
		if($c){
			foreach($c as $k => $v){
			$values .= "\"$v\",";
			$keys .= "$k,"; 
			}
		}
		if($values){
			$values = substr($values,0,-1);
			$keys = substr($keys,0,-1);
			$sql = "INSERT INTO clients ({$keys}) VALUES ({$values})";
			try{
				$db = get_connection::get();
				$r = $db->query($sql);
				echo 'Inserted!';
			}catch(Exception $e){
				echo json_enconde(array('error'=>
					array(
						'message'=>$e->getMessage()
					)
				));
			}
		}
		else
			echo 'At least one key => value is required!';
	}

	function get_clients() {
    		$sql = "select * FROM clients ORDER BY name";
    		try {
        		$db = get_connection::get();
        		$r = $db->query($sql);
			while($row = $r->fetch_object())
				echo json_encode(array('client'=>$row)). "\n";
    		} catch(Exception $e) {
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
		}catch(Exception $e){
			echo json_encode(array('error'=>
				array(
					'message'=>$e->getMessage()
				)
			));
		}
	}


?>

