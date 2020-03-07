<?php include 'header.php'; ?>

	<h1>Class Management</h1>
	<form method="POST" action="manageclass.php">
		<fieldset>
			<legend>Class Management</legend>
			<label>ID</label>
			<input type="text" name="ID">
			<label>Class</label>
<!-- 			<input type="text" name="ClassName"> -->
			<select name="Class" size="1">
				<?php
					require 'connection.php';
					$qClass = "SELECT Class FROM classes";

					$rClass = mysqli_query($connection,$qClass);
					if(mysqli_num_rows($rClass) > 0)
					{
						while ($r = mysqli_fetch_array($rClass)) 
						{ ?>
							<option value="<?php echo $r['Class'] ?>"><?php echo $r['Class'] ?></option>
					 	<?php	}
					}
					mysqli_close($connection);
				?>
			</select>
			<label>Session ID</label>
			<input type="text" name="SessionID">
			<button type="Submit" name="Save">Save</button>
			<button type="Submit" name="Update">Update</button>
			<button type="Submit" name="Delete">Delete</button>
		</fieldset>
	</form>

	<table>
		<?php
			require 'connection.php';
			$SelectQuery = "SELECT cd.ID,c.Class,s.TimeStart,s.TimeEnd FROM classesdetail cd JOIN classes c ON cd.ClassID = c.ClassID JOIN sessions s ON cd.SessionID = s.SessionID";

			$SelectResult = mysqli_query($connection,$SelectQuery);
			if(mysqli_num_rows($SelectResult) > 0)
			{
				while ($row = mysqli_fetch_assoc($SelectResult)) 
				{
					echo "<tr><td>" . $row["ID"] . "</td><td>"
					. $row["Class"] . "</td><td>"
					. $row["TimeStart"] . "</td><td>"
					. $row["TimeEnd"] . "</td></tr>";
				}
			}
			else
			{ 
				echo "No Result";
			}
			mysqli_close($connection);

			echo "</table><table>";

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

			if(isset($_POST["Save"]))
			{
				$Class=$_POST["Class"];
				$SessionID=$_POST["SessionID"];
				$ClsID = 0;
				require "connection.php";

				$qClsID = mysqli_query($connection,"SELECT ClassID FROM classes WHERE Class='".$Class."' LIMIT 1");
				if(mysqli_num_rows($qClsID) > 0)
				{
					while($ro = mysqli_fetch_assoc($qClsID))
						$ClsID = $ro["ClassID"];
				}

				$InsertQuery = "INSERT INTO classesdetail (SessionID,ClassID) VALUES ('".$SessionID."','".$ClsID."')";

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
				$ID=$_POST["ID"];
				$Class=$_POST["Class"];
				$SessionID=$_POST["SessionID"];
				$ClsID = 0;
				
				require "connection.php";

				$qClsID = mysqli_query($connection,"SELECT ClassID FROM classes WHERE Class='".$Class."' LIMIT 1");
				if(mysqli_num_rows($qClsID) > 0)
				{
					while($ro = mysqli_fetch_assoc($qClsID))
						$ClsID = $ro["ClassID"];
				}

				$UpdateQuery = "UPDATE classesdetail 
								SET ClassID='".$ClsID."',
									SessionID='".$SessionID."'
								WHERE ID = '".$ID."'";

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
				$ID=$_POST["ID"];

				require "connection.php";

				$DeleteQuery = "DELETE FROM classesdetail 
								WHERE ID = '".$ID."'";

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