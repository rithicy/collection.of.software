<?php require 'header.php'; ?>


<!--  **********    DELETE FROM DATABASE  *************  -->
<div class="col-lg-12 jumbotron">
			<form method="POST" action="delete.php">
						<h4>Delete From Database</h4>

					<div class="form-group">
					<label>Delete Id :</label>
					<input type="text" name="delDrink" id="fdDel" class="form-control"/>
				</div>
   				<input type="submit" id="phoneNum" name="delDri" value="Delete" class="btn btn-danger">
			</form>	
<?php
if(isset($_POST['delDri'])){ 
				if($_POST["delDrink"]=="")
				{
					echo '<script>alert ("please input  ID *******");</script>';
					exit();
				}

	$select = "SELECT * FROM $table";
		$str = $con->query($select);
		if($str->num_rows>0)
		{	
			while($student=$str->fetch_assoc())
			{
				if($student["$row[0]"]==$_POST['delDrink']) {
					$del="DELETE FROM $table WHERE $row[0] = ".$_POST["delDrink"];
					echo $del;
					if($con->query($del)===TRUE)
						{
							echo "<h4 class='text-success'>Delete success!";
						}
						else{
							echo "<h4 class='text-warning'>Delete Wrong </h4>";
						}
				}                    
			}
		}
}
?>
</div>	

<?php	
require 'footer.php';
	?>