<?php require 'header.php'; ?>




<!-- *********   INSERT TO DATABASE   ************  -->
 	<div class="col-lg-12 well">
		<form method="post" action="create.php" name="frmIns">
			<h4>Add Drink</h4>
				<div class="form-group">
					<label>Drink Name</label>
					<input type="text" name="drinkNames" id="fdId" class="form-control"/>
				</div>
				<div class="form-group">
					<label>Type </label>
					<input type="text" name="drinkTypes" id="fdPrice" class="form-control"/>
				</div>
				<div class="form-group">
					<label>Price</label>
					<input type="text" name="drinkPrices" id="fdPrice" class="form-control"/>
				</div>
   				<input type="submit" name="addDrink" value="save" class="btn btn-danger" onclick="valid()">
			</form>
			<?php
			if(isset($_POST['addDrink'])){

				if($_POST["drinkNames"]=="")
				{
					echo '<script>alert ("please input Drink Name");</script>';
					exit();
				}
				if($_POST["drinkTypes"]=="")
				{
					echo '<script>alert ("please input Type of Drink");</script>';
					exit();
				}
				if($_POST["drinkPrices"]=="")
				{
					echo '<script>alert ("please input $$ Price");</script>';
					exit();
				}	
		$ins="INSERT INTO $table VALUES(NULL,'".$_POST['drinkNames']."','".
												$_POST['drinkTypes']."','".$_POST['drinkPrices']."');";
			if($con->query($ins)===TRUE)
				{
					echo "<h4 class='text-success'>Add success!</h4>";
				}
			else{
					echo "<h4 class='text-warning'>Adding Wrong </h4>";
				}
				}
			?>
</div>


<?php	
require 'footer.php';
	?>
