<?php include 'header.php'; ?>
<div class="well col-lg-12"> 
	<h1>Session</h1>
	<form method="POST" action="session.php">
		<fieldset>
			<legend>Class Setup</legend>
			<label>Session ID</label>
			<input type="text" name="SessionID">
			<label>Time Start</label>
			<input type="Time" name="TimeStart">
			<label>Time End</label>
			<input type="Time" name="TimeEnd">
			<button type="Submit" name="Save">Save</button>
			<button type="Submit" name="Update">Update</button>
			<button type="Submit" name="Delete">Delete</button>
			<button type="Submit" name="Search">Search</button>
		</fieldset>
	</form>
</div>
<?php   	if(isset($_POST["Search"])) {  ?>

	<table class="table bg-danger">
		<?php
			require 'connection.php';
			$SelectQuery = "SELECT * FROM sessions";

			$SelectResult = mysqli_query($connection,$SelectQuery);
			if(mysqli_num_rows($SelectResult) > 0)
			{
				while ($row = mysqli_fetch_assoc($SelectResult)) 
				{
					$i=0;
					if($_POST["SessionID"]==$row["SessionID"]){
						$i++;
					echo "<tr><td>" . $row["SessionID"] . "</td><td>"
					. $row["TimeStart"] . "</td><td>"
					. $row["TimeEnd"] . "</td></tr>";
					}
				}
				if($i==0){ echo 'Not Found in database';}
			}
			else
			{ 
				echo "No Result";
			}
			mysqli_close($connection);

			echo "</table>";	
		?>
		<?php }	else {  ?>
			<table class="table bg-danger">
		<?php
			require 'connection.php';
			$SelectQuery = "SELECT * FROM sessions";

			$SelectResult = mysqli_query($connection,$SelectQuery);
			if(mysqli_num_rows($SelectResult) > 0)
			{
				while ($row = mysqli_fetch_assoc($SelectResult)) 
				{
					echo "<tr><td>" . $row["SessionID"] . "</td><td>"
					. $row["TimeStart"] . "</td><td>"
					. $row["TimeEnd"] . "</td></tr>";
				}
			}
			else
			{ 
				echo "No Result";
			}
			mysqli_close($connection);

			echo "</table>";	
		?>
		<?php } ?>
			<?php
			if(isset($_POST["Save"]))
			{
				$TimeStart=$_POST["TimeStart"];
				$TimeEnd=$_POST["TimeEnd"];

				require "connection.php";

				$InsertQuery = "INSERT INTO sessions (TimeStart,TimeEnd) VALUES ('".$TimeStart."','".$TimeEnd."')";

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
				$SessionID=$_POST["SessionID"];
				$TimeStart=$_POST["TimeStart"];
				$TimeEnd=$_POST["TimeEnd"];

				require "connection.php";

				$UpdateQuery = "UPDATE sessions 
								SET TimeStart='".$TimeStart."',
									TimeEnd='".$TimeEnd."'
								WHERE SessionID = '".$SessionID."'";

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
				$SessionID=$_POST["SessionID"];

				require "connection.php";

				$DeleteQuery = "DELETE FROM sessions 
								WHERE SessionID = '".$SessionID."'";

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