<?php
	class Dog{
		private $name;
		public function __construct($name){
			$this->name = $name;
		}
		public function get_name(){
			echo "$this->name\n";
		}
		public function __destruct(){
			echo $this->get_name() . " is dead\n";
		}
	}

//	$dg1 = new Dog("Rex");
//	$dg1->get_name();
?>
