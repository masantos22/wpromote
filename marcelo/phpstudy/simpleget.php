<html>
<head>
<title> Test </title>
<body>
	<?php
		if(isset($_GET['Name'])){
			$name = $_GET['Name'];
			echo "User trying to find $name <br/>";
		}
	 ?>
	<form action="simpleget.php" method="GET">
		Name: <input type="text" name="Name"/><br/>
		<input type="Submit"/>
	</form>
	
</body>
</head>
</html>
