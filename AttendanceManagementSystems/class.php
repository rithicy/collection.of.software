<?php include 'header.php'; ?>
<div class="jumbotron col-lg-12">
	<h1>Classes</h1>
	<form method="POST" action="class.php">
		<fieldset>
			<legend>Class Setup</legend>
			<label>Class ID</label>
			<input type="text" name="ClassID">
			<label>Class Name</label>
			<input type="text" name="Class">
			<label>Department Name</label>
			<input type="text" name="DepartmentName">
			<button type="Submit" name="Save">Save</button>
			<button type="Submit" name="Update">Update</button>
			<button type="Submit" name="Delete">Delete</button>
			<button type="Submit" name="Search">Search</button>
		</fieldset>
	</form>
</div>
  <!-- search by name -->
<?php if(isset($_POST["Search"])) { ?>

	<table class="table bg-danger">
		<?php
			require 'connection.php';
			$SelectQuery = "SELECT c.ClassID, c.Class, d.DepartmentName FROM classes AS c JOIN departments AS d ON c.DepartmentID=d.DepartmentID";

			$SelectResult = mysqli_query($connection,$SelectQuery);
			if(mysqli_num_rows($SelectResult) > 0)
			{
				while ($row = mysqli_fetch_assoc($SelectResult)) 
				{
					if($_POST["Class"]==$row["Class"])
					{
					echo "<tr><td>" . $row["ClassID"] . "</td><td>"
					. $row["Class"] . "</td><td>"
					. $row["DepartmentName"] . "</td></tr>";
					}
			}	
			}
			else
			{ 
				echo "No Result";
			}
			mysqli_close($connection);

			echo "</table>";
 ?>
     <!-- display db -->
<?php }
 else { ?>

	<table class="table bg-danger">
		<?php
			require 'connection.php';
			$SelectQuery = "SELECT c.ClassID, c.Class, d.DepartmentName FROM classes AS c JOIN departments AS d ON c.DepartmentID=d.DepartmentID";

			$SelectResult = mysqli_query($connection,$SelectQuery);
			if(mysqli_num_rows($SelectResult) > 0)
			{
				while ($row = mysqli_fetch_assoc($SelectResult)) 
				{
					echo "<tr><td>" . $row["ClassID"] . "</td><td>"
					. $row["Class"] . "</td><td>"
					. $row["DepartmentName"] . "</td></tr>";
				}
			}
			else
			{ 
				echo "No Result";
			}
			mysqli_close($connection);

			echo "</table>";
		}
 ?>
 <!-- save -->
		<?php
			if(isset($_POST["Save"]))
			{
				$Class=$_POST["Class"];
				$DepartmentName=$_POST["DepartmentName"];
				$DeptID = 0;

				require "connection.php";

				$qDeptID = mysqli_query($connection,"SELECT DepartmentID FROM departments WHERE DepartmentName='".$DepartmentName."' LIMIT 1");
				if(mysqli_num_rows($qDeptID) > 0)
				{
					while($r = mysqli_fetch_assoc($qDeptID))
						$DeptID = $r["DepartmentID"];
				}

				$InsertQuery = "INSERT INTO classes (Class,DepartmentID) VALUES ('".$Class."','".$DeptID."')";

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

// update

			if(isset($_POST["Update"]))
			{
				$ClassID=$_POST["ClassID"];
				$Class=$_POST["Class"];
				$DepartmentName=$_POST["DepartmentName"];
				$DeptID = 0;

				require "connection.php";

				$qDeptID = mysqli_query($connection,"SELECT DepartmentID FROM departments WHERE DepartmentName='".$DepartmentName."' LIMIT 1");

				if(mysqli_num_rows($qDeptID) > 0)
				{
					while($r = mysqli_fetch_assoc($qDeptID))
						$DeptID = $r["DepartmentID"];
				}

				$UpdateQuery = "UPDATE classes 
								SET Class='".$Class."',
									DepartmentID='".$DeptID."'
								WHERE ClassID = '".$ClassID."'";

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
				$ClassID=$_POST["ClassID"];

				require "connection.php";

				$DeleteQuery = "DELETE FROM classes 
								WHERE ClassID = '".$ClassID."'";

				if(!mysqli_query($connection,$DeleteQuery))
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