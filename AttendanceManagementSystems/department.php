<?php include 'header.php'; ?>
<div class="jumbotron">
	<h1>Departments</h1>
	<form method="POST" action="department.php">
		<fieldset >
			<legend>Department Setup</legend>
			<label>Department ID</label>
			<input type="text" name="DepartmentID">
			<label>Department Name</label>
			<input type="text" name="DepartmentName">
			<button type="Submit" name="Save">Save</button>
			<button type="Submit" name="Update">Update</button>
			<button type="Submit" name="Delete">Delete</button>
			<button type="Submit" name="Search">Search</button>
		</fieldset>
	</form>
</div>
<?php if(isset($_POST["Search"])){	?>
<table class="table  bg-danger">
	<?php
		require 'connection.php';
		$SelectQuery = "SELECT * FROM departments";
		$SelectResult = mysqli_query($connection,$SelectQuery);
		if(mysqli_num_rows($SelectResult) > 0)
		{
			while ($row = mysqli_fetch_assoc($SelectResult)) 
			{
				$i=0;
				if(($_POST["DepartmentName"])==$row["DepartmentName"] )
				{
					$i++;
				echo "<tr><td>" . $row["DepartmentID"] . "</td><td>"
				. $row["DepartmentID"] . "</td><td>"
				. $row["DepartmentName"] . "</td></tr>";
				}
				
			}
			if($i==0)
			{
				echo '<div class="col-lg-12 well">Not Found in List</div>';
			}
		}
		else
		{ 
			echo "No Result";
		}
		echo '</table>';
		mysqli_close($connection);
		?>
		<?php } else { ?>
			<table class="table  bg-danger">
	<?php
		require 'connection.php';
		$SelectQuery = "SELECT * FROM departments";
		$SelectResult = mysqli_query($connection,$SelectQuery);
		if(mysqli_num_rows($SelectResult) > 0)
		{
			while ($row = mysqli_fetch_assoc($SelectResult)) 
			{
				echo "<tr><td>" . $row["DepartmentID"] . "</td><td>"
				. $row["DepartmentID"] . "</td><td>"
				. $row["DepartmentName"] . "</td></tr>";
			}
		}
		else
		{ 
			echo "No Result";
		}
		echo '</table>';
		mysqli_close($connection);
		?>
		<?php } ?>

		<?php

		if(isset($_POST["Save"]))
		{
			echo "Hello";
			$DepartmentName=$_POST["DepartmentName"];

			require "connection.php";

			$InsertQuery = "INSERT INTO departments (DepartmentName) VALUES ('".$DepartmentName."')";

			if(!mysqli_query($connection,$InsertQuery))
			{
				die('Error: ' . mysqli_error($connection));
			}
			else
			{
				echo "Successfully added one record to database";
			}
			mysqli_close($connection);
		}	



		if(isset($_POST["Update"]))
		{
			$DepartmentID=$_POST["DepartmentID"];
			$DepartmentName=$_POST["DepartmentName"];

			require "connection.php";

			$UpdateQuery = "UPDATE departments 
							SET DepartmentName='".$DepartmentName."'
							WHERE DepartmentID = '".$DepartmentID."'";

			if(!mysqli_query($connection,$UpdateQuery))
			{
				die('Error: ' . mysqli_error($connection));
			}
			else
			{
				echo "Successfully update one record in database";
			}
			mysqli_close($connection);
		}




		if(isset($_POST["Delete"]))
		{
			$DepartmentID=$_POST["DepartmentID"];

			require "connection.php";

			$UpdateQuery = "DELETE FROM departments 
							WHERE DepartmentID = '".$DepartmentID."'";

			if(!mysqli_query($connection,$UpdateQuery))
			{
				die('Error: ' . mysqli_error($connection));
			}
			else
			{
				echo "Successfully delete one record in database";
			}
			mysqli_close($connection);
		}	
	?>
</body>
</html>