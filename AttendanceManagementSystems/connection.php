<?php
		$servername="localhost";
		$username="root";
		$password="";
		$database="attendance";

		$connection=mysqli_connect($servername,$username,$password,$database);

			if(!$connection)
			{
				echo "Error No: " . mysqli_connect_errno() . "Error Message: " . mysqli_connect_error();
				exit();
			}
?>