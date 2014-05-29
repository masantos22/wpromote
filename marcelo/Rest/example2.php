<?php
	require_once('db.php');

//	require '../vendor/autoload.php';

	include '../../slim_path.php';
	use Slim\Slim;
	$app = new \Slim\Slim();

//	$app->response->header('Content-Type','application/json');


	$middle = function ($role) {
    		return function () use ($role) {
			echo "Middleware\n";
		};
	};


	$conditions = array('body' => '');
	
	$app->get('/clients',$middle('foobar'),'get_clients');
	$app->get('/clients/:id','get_client'); 
	$app->post('/clients','add_client');
	$app->put('/clients/:id','update_client'); 
	$app->delete('/clients/:id','delete_client');
//	$content = $app->request->getMediaType(); //get the Content-Type from the request)
	$app->run();


	function object_to_array($c){
		$myarray = array();
		foreach($c as $k=>$v)
			$myarray[$k] = $v;
		return $myarray;
	}

	function valid_input($c_array,$size = true){
		$keys = array("Name","Age");
		foreach($c_array as $k=>$v ){
			if(!in_array($k,$keys)){
				echo "Invalid key $k.";
				return false;
			}
			if(!$v){
				echo "Missing ($k:value)";
				return false;
			}
		}
		// if any key is missing
		if($size && (count($c_array) < count($keys))){
			$erro = "Missing key(s): ";
			foreach($keys as $v){
				if(empty($c_array[$v]))
					$erro = $erro . "$v,";	
			}
			echo substr($erro,0,-1);
			return false;
		}
		return true;
	}
	function delete_client($id){
		try{
			$r = db::delete("`marcelo`.`clients`",array("ID"=>$id));
                        $r_json = json_encode($r);
                        echo "DELETED!"; 
		}catch(PDOException $e){
			echo json_encode(array('array'=>
				array(
					'message'=>$e->getMessage()
					)
			));
		}
	}
	function add_client(){
		$request = Slim::getInstance()->request();
		// check if it is a JSON object
		if($c = json_decode($request->getBody())){
			//convert object to array
			$c_array = object_to_array($c);
			if(valid_input($c_array)){
				try{
					$r = db::insert("`marcelo`.`clients`",array('Name'=>$c_array['Name'],'Age'=>$c_array['Age']));
					echo "Inserted!";
				}catch(PDOException $e){
					echo json_encode(array('error'=>
						array(
							'message'=>$e->getMessage()
							)	
					));
				}
			}
		}
		else
			echo "The content must be a JSON object";
	}
	function update_client($id){
		$request = Slim::getInstance()->request();
		// check if it is a JSON object
		if($c = json_decode($request->getBody())){
			//convert object to array
			$c_array = object_to_array($c);
			if(valid_input($c_array,false)){
				try{
					$r = db::update("`marcelo`.`clients`",$c_array,array('id'=>$id));
					echo "UPDATED!";
				}catch(PDOException $e){
					echo json_encode(array('error'=>
						array(
							'message'=>$e->getMessage()
							)
					));
				}	
			}
		}
	}
	
	function get_clients(){
                try {
			$r = db::select_all("`marcelo`.`clients`",array('Name','Age','ID'));
			$r_json = json_encode($r);
			echo str_replace('},','}' . "'\n'",$r_json);
		} catch(PDOException $e) {
			echo json_encode(array('error'=>
				array(
					'message'=>$e->getMessage()
					)
				));
		}
	}	
	
	function get_client($id){
		try{
			$r = db::select_all("`marcelo`.`clients`",array('Name','Age'),array('where'=>array('ID'=> "$id"),'limit'=>array(1,0)));
			$r_json = json_encode($r);
			echo $r_json . "\n";
		}catch(PDOException $e){
			echo json_encode(array('error'=>
				array(
					'message'=>$e->getMessage()
					)
			));
		}
	}	

?>
	
