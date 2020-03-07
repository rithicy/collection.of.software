 <?php require 'header.php'; ?>


  <!-- **********  UPDATE THE DATABASE   *******  -->
<div class="col-lg-12 well">
	<form method="post" action="update.php">
		<div class="form-group">
					<label>Update Name By Id :</label>
					<input type="text" name="drinkIds" id="fdId" class="form-control"/>
				</div>
		<h4>UPDATE Database</h4>
			<div class="form-group">
					<label>Name</label>
					<input type="text" name="drinkNames" id="fdId" class="form-control"/>
				</div>
				<div class="form-group">
					<label>Type</label>
					<input type="text" name="drinkTypes" id="fdPrice" class="form-control"/>
				</div>
				<div class="form-group">
					<label>Price</label>
					<input type="text" name="drinkPrices" id="fdPrice" class="form-control"/>
				</div>
   			<input type="submit" id="phoneNum" name="updates" value="updateeee" class="btn btn-danger">
	</form>
<?php
	if(isset($_POST['updates'])){
		if($_POST['drinkNames']=="")
				{
					echo '<script>alert ("please input Drink Name");</script>';
					exit();
				}
				if($_POST['drinkTypes']=="")
				{
					echo '<script>alert ("please input Drink Type");</script>';
					exit();
				}
				if($_POST['drinkPrices']=="")
				{
					echo '<script>alert ("please write Price of Drink in to form");</script>';
					exit();
				}
				
		$upd="UPDATE $table SET $row[1]='".$_POST['drinkNames']."',"."
								$row[2]='".$_POST['drinkTypes']."',"."
								$row[3]='".$_POST['drinkPrices'].
								"' WHERE $row[0]=".$_POST['drinkIds'];

		if($con->query($upd)===TRUE)
		{
			echo "<h4 class='text-success'>Update success!";		
		}
		else
		{
			echo "<h4 class='text-warning'>Update Wrong </h4>";
		}
	}
$_POST['studName']=NULL;
$_POST['studSex']=NULL;
$_POST['studBirth']=NULL;
$_POST['StudYear']=NULL;
$_POST['studClass']=NULL;
$_POST['stuSubject']=NULL;
$_POST['studShift']=NULL;
$_POST['studId']=NULL;
				 ?>
</div>
 </div>

<?php	
require 'footer.php';
	?>
