<!--?php require 'header.php'; ?-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="main.css" />
	<script src="main.js"></script>
	
<link rel="stylesheet" href="style/style.css">
</head>
<body>
	<h1> Php មេរៀនទី២ : របៀបconnect ជាមួយ​database</h1>
	<?php
		$name="localhost";
		$pass="";
		$db="";
		$con=mysqli_connect($name,$pass,$db) or die("fail");

		echo 'database connect successful';
		echo '<h3>'.mysqli_get_host_info($con).'</h3>';
		?>
		

      
</body>
</html>
<!--?php	
require 'footer.php';
	?-->