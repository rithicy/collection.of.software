<?php require 'header.php'; ?>


<!-- *********** READ THE DATABASE ************ -->       
		 
		 	<table border=1 class='tables table table-condensed'> <tr class='thead'>
			 <th>ID</th>
			<th>Name of Drink</th>
			<th>Drink Type</th>
			<th>Price</th></tr> </table>
			<div class="data">
<?php   
		if(isset($_POST['searchDrink'])){
			if($_POST['searchDr']==''){
				echo '<script>alert("Please Enter Name ");</script>';
				exit();
			}
			$select = "SELECT * FROM $table";
		$st = $con->query($select);
		if($st->num_rows>0)
		{

			echo "<table border=1 class='table table-striped'>";
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

				/******************/



		$select = "SELECT * FROM $table";
		$st = $con->query($select);
		if($st->num_rows>0)
		{

			echo "<table border=1 class='table table-striped'>";
					while($stu=$st->fetch_assoc())
					{
					
						echo "<tr class='tbody'><td>No "; 
						echo  	 $stu["drinkId"]."</td><td>"
								.$stu["drinkName"]."</td><td>"
								.$stu["drinkType"]."</td><td>"
								.$stu["drinkPrice"]." $</td></tr>";
					}
				
			echo "</table>";
			
		}
		?>
		</div>  
		
<!-- *********** End OF Database Display ************ -->  


<?php	
require 'footer.php';
	?>