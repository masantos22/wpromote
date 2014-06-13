<?php
class db{
	public static $r;
	public static function conn(){
		if(!self::$r)
			self::$r = new mysqli("127.0.0.1","root","esqueci22","g_objects") OR die("Could not connect!");
		return self::$r;
	}
}
	
	$i = 0;
	$step = 100000;
	
	while($i < 3400000){
		echo $i;	
		$query = "select " .
			"campaign_id,".
			"device,".
			"data_date,".
			"imps,".
			"clicks,".
			"convs ".
			"from all_data_A430104416 ".
			"LIMIT $i,$step";
	
		// fork process	
		$pid = pcntl_fork();
		if(!$pid){
			fetch($i,$query);
			print "$i: EXIT\n";
			exit;
		}
		print "$i\n";	
		$i += $step;
	}
	print "Tchau\n";
	exit;

	function fetch($n = 0,$query){
		print "$query\n";
		$filename = "output/file" . $n/100000 .".txt";
		$r = db::conn()->query($query);
		$fp = fopen($filename,"w");
	
		while($obj = $r->fetch_object()){
			$write = "";
			foreach($obj as $k => $v){
				$write .= "$k : $v\t";
			}
			fwrite($fp,$write . "\n");
		}
	
		fclose($fp);
	}
?>
