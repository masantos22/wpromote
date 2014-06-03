<?php
include_once('db.php');

$users = array(
	array('lastname'=>'CHimdi','address'=>'31'),
	array('lastname'=>'Yafu','address'=>'87'),
	array('lastname'=>'Marcel','address'=>'12'),
	array('lastname'=>'Ryan','address'=>'54'),
);


$r = db::insert("`wpromote`.`users`",$users);
list($res,$id,$error) = $r;


/*
$s = "INSERT INTO users (name,age)
	VALUES(:name,:age)
";
*/



?>
