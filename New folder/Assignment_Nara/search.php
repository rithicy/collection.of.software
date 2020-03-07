 	<?php require 'header.php'; ?>


 	<!--  ********** Search THE DATABASE   *******  -->

			<form method="POST" action="search.php" class="well">
						<h4>Search</h4>
					<div class="form-group">
					<label>Search Drink :</label>
					<input type="text" name="searchDr" id="fdDel" class="form-control"/>
				</div>
   				<input type="submit" id="phoneNum" name="searchDrink" value="Search" class="btn btn-danger">
			</form>

	<table border=1 class='tables table'> <tr class='thead'>
			<th>ID</th>
			<th>Name of Drink</th>
			<th>Drink Type</th>
			<th>Price</th></tr> </table>
			<div class="data">
<?php   
		if(isset($_POST['searchDrink'])){
			if($_POST['searchDr']==''){
				echo '<script>alert("Please Enter Drink Name  ");</script>';
				exit();
			}
			$select = "SELECT * FROM $table";
		$st = $con->query($select);
		if($st->num_rows>0)
		{

			echo "<table border=1 class='table'>";
					while($stu=$st->fetch_assoc())
					{
						if($_POST['searchDr']==$stu["$row[1]"]){
						echo "<tr class='tbody'><td>"; 
						echo  $stu["drinkId"]."</td><td>"
								.$stu["drinkName"]."</td><td>"
								.$stu["drinkType"]."</td><td>"
									 .$stu["drinkPrice"]."</td></tr>";
									}
					}
				
			echo "</table>";
			mysqli_close($con);
		}
				exit();
				
				}
				?>
</div>

<?php	
require 'footer.php';
	?>