<?php include 'header.php'; ?>

	<h1>Classes</h1>
	<form method="POST" action="student.php" class="well col-lg-4">
		<fieldset >
			<legend>Student Setup</legend>
			<div class="form-group ">
			<label>Student ID</label>
			<input type="text" name="StudentID" class="form-control">
			<label>Student Name</label>
			<input type="text" name="StudentName" class="form-control">
			<label>Sex</label>
			<input type="text" name="Sex" class="form-control">
			<label>Date of birth</label>
			<input type="Date" name="BirthDate" class="form-control">
			<label>Phone Number</label>
			<input type="text" name="PhoneNumber" class="form-control">
			<label>Address</label>
			<input type="textarea" name="Address" class="form-control">
			<label>Department</label>
			<select name="DepartmentName" size="1" class="form-control">
				<?php
					require 'connection.php';
					$qDepartment = "SELECT DepartmentName FROM departments";

					$rDepartment = mysqli_query($connection,$qDepartment);
					if(mysqli_num_rows($rDepartment) > 0)
					{
						while ($r = mysqli_fetch_array($rDepartment)) 
						{ ?>
							<option value="<?php echo $r['DepartmentName'] ?>"><?php echo $r['DepartmentName'] ?></option>
					 	<?php	}
					}
					mysqli_close($connection);
				?>
			</select>
			<button type="Submit" name="Save" class="btn btn-danger">Save</button>
			<button type="Submit" name="Update" class="btn btn-danger">Update</button>
			<button type="Submit" name="Delete" class="btn btn-danger">Delete</button>
			</div>
		</fieldset>
	</form>
<div class="col-lg-8">

	<table class=" table bg-danger">
		<tr class="table-"><td>Id</td><td>Name</td><td>Sex</td><td>Birthdate</td>
			<td>phone</td><td>addr</td><td>department</td></tr>
		<?php
			require 'connection.php';
			$SelectQuery = "SELECT s.StudentID,s.StudentName,s.Sex,s.BirthDate,s.PhoneNumber,s.Address,d.DepartmentName FROM students AS s JOIN departments AS d ON s.DepartmentID=d.DepartmentID";

			$SelectResult = mysqli_query($connection,$SelectQuery);
			if(mysqli_num_rows($SelectResult) > 0)
			{

				while ($row = mysqli_fetch_assoc($SelectResult)) 
				{
					echo "<tr><td>" . $row["StudentID"] . "</td><td>"
					. $row["StudentName"] . "</td><td>"
					. $row["Sex"] . "</td><td>"
					. $row["BirthDate"] . "</td><td>"
					. $row["PhoneNumber"] . "</td><td>"
					. $row["Address"] . "</td><td>"
					. $row["DepartmentName"] . "</td></tr>";
				}
			}
			else
			{ 
				echo "No Result";
			}
			
			mysqli_close($connection);

			echo "</table></div>";

			if(isset($_POST["Save"]))
			{
				$StudentName=$_POST["StudentName"];
				$Sex=$_POST["Sex"];
				$BirthDate=$_POST["BirthDate"];
				$PhoneNumber=$_POST["PhoneNumber"];
				$Address=$_POST["Address"];
				$DepartmentName=$_POST["DepartmentName"];
				$DeptID = 0;

				require "connection.php";

				$qDeptID = mysqli_query($connection,"SELECT DepartmentID FROM departments WHERE DepartmentName='".$DepartmentName."' LIMIT 1");
				if(mysqli_num_rows($qDeptID) > 0)
				{
					while($r = mysqli_fetch_assoc($qDeptID))
						$DeptID = $r["DepartmentID"];
				}

				$InsertQuery = "INSERT INTO students (StudentName,Sex,BirthDate,PhoneNumber,Address,DepartmentID) VALUES ('".$StudentName."','".$Sex."','".$BirthDate."','".$PhoneNumber."','".$Address."','".$DeptID."')";

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
				$StudentID=$_POST["StudentID"];
				$StudentName=$_POST["StudentName"];
				$Sex=$_POST["Sex"];
				$BirthDate=$_POST["BirthDate"];
				$PhoneNumber=$_POST["PhoneNumber"];
				$Address=$_POST["Address"];
				$DepartmentName=$_POST["DepartmentName"];
				$DeptID = 0;

				require "connection.php";

				$qDeptID = mysqli_query($connection,"SELECT DepartmentID FROM departments WHERE DepartmentName='".$DepartmentName."' LIMIT 1");
				if(mysqli_num_rows($qDeptID) > 0)
				{
					while($r = mysqli_fetch_assoc($qDeptID))
						$DeptID = $r["DepartmentID"];
				}

				$UpdateQuery = "UPDATE students SET StudentName = '".$StudentName."',
													Sex = '".$Sex."', 
													BirthDate = '".$BirthDate."',
													PhoneNumber = '".$PhoneNumber."',
													Address = '".$Address."',
													DepartmentID = '".$DeptID."'";

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
				$StudentID=$_POST["StudentID"];

				require "connection.php";

				$DeleteQuery = "DELETE FROM students 
								WHERE StudentID = '".$StudentID."'";

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