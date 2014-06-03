<html>
<head>
<title> Test </title>
<body>
	<?php
		if(!empty($_GET['Name'])){
			$name = $_GET['Name'];
			echo "User trying to find $name <br/>";
			unset($_GET['Name']);
		}
	 ?>
	<form action="simpleget.php"  method="GET">
		Name: <input type="text" name="Name"/><br/>
		<input type="Submit"/>
	</form>
	
</body>
</head>
</html>
