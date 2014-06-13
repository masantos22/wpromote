<?php	
	$i = 0;
	$db = new mysqli("127.0.0.1","root","esqueci22","marcelo") OR die("Could not connect!");
	do{
		$query = "SELECT * FROM clients LIMIT $i,3";
		$r = $db->query($query);
		$obj = $r->fetch_object();
		$pid = pcntl_fork();
		if(!$pid){
			fetch($i);
			exit;
		}	
		$i += 3;	
	}
	while($obj);

	//for($db->query){
		
		//$pid = pcntl_fork();
		//if(!$pid){
		//	fetch($db,$i);
		//	exit;			
		//} 
	//}


	function fetch($n = 0){
		$db = new mysqli("127.0.0.1","root","esqueci22","marcelo") OR die("Could not connect!");
		$query = "SELECT * FROM clients LIMIT $n,3";
		$r = $db->query($query);
		while($obj = $r->fetch_object()){
			foreach($obj as $k => $v){
				print "$k : $v\t";
			}
			print "\n";
		}
		//$db->close();
	}
?>
