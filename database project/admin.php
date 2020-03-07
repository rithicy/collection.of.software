<!--?php require 'header.php'; ?-->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="main.css" />
	<script src="main.js"></script>
<link rel="stylesheet" href="style/bootstrap.css">
</head>
<body>
	<h1 class="well bg-default"> Php មេរៀនទី4 : CRUD (Create,Read,Update,Delete) Method in PHP </h1>
	<?php
		$name="localhost";
		$user="root";
		$pass="";
		$db="test";
		$con=mysqli_connect($name,$user,$pass,$db) or die("fail");

		echo '<h6 class="text-warning"> status : database connect successful</h6>';
		echo '<h6> mysql info :'.mysqli_get_host_info($con).'</h6>';
		?>
		 <div class="col-lg-6 well">
		<!--          *****************   INSERT TO DATABASE   *********************           -->

 	<div class="col-lg-6">
			<form method="post" action="index.php" >
				<h3>Add Into Database</h3>
				<div>
					<label>Food Id</label>
					<input type="text" name="foodId" id="fdId"/>
				</div>

				<div>
					<label>Food Namee</label>
					<input type="text" name="foodName" id="fdName"/>
				</div>
				
				<div >
					<label>Food Price</label>
					<input type="text" name="fdPrice" id="fdPrice"/>
				</div>
   				<input type="submit" id="phoneNum" name="phoneNumb" value="save" class="btn btn-success">

			</form>
			<?php
				if(isset($_POST['phoneNumb'])){
						$ins="INSERT INTO tbfood VALUES(".$_POST["foodId"].",'".$_POST['foodName']."',".$_POST['fdPrice'].")";
						if($con->query($ins)===TRUE)
						{
							echo "successeee";
							echo $ins;
						}
						else{
							echo "CREATE error";
						}

					}
					$_POST['phoneNumb']="";
				 ?>
</div>



				<!--          *******************    DELETE FROM DATABASE  *******************           -->

<div class="col-lg-6">
			<form method="POST" action="index.php" >
						<h3>Delete From Detabase</h3>
					<div>
					<label>Delete Id :</label>
					<input type="text" name="fdDel" id="fdDel"/>
				</div>
   				<input type="submit" id="phoneNum" name="deletess" value="delete" class="btn btn-warning">

			</form>
				
<?php
if(isset($_POST['deletess'])){

    echo $_POST['fdDel'];
$select = "SELECT * FROM tbfood";
		$str = $con->query($select);
		if($str->num_rows>0)
		{
			
			while($stu=$str->fetch_assoc())
			{
				if($stu["foodId"]==$_POST['fdDel']) {
					$del="DELETE FROM tbfood WHERE foodId = ".$_POST["fdDel"];
					if($con->query($del)===TRUE)
						{
							echo " Delete Success";
						}
						else{
							echo " Delete error";
						}
				}                    
			}
		}
}
?>

	</div>	


           <!--          ********************  UPDATE THE DATABASE   ******************           -->

<div class="col-lg-6">
	<form method="post" action="index.php">
		<h3>UPDATE Database</h3>
			<div>
				<label>Chooes Id to update</label>
				<input type="text" name="choose" id="fdId"/>
			</div>
        <h3>UPDATE BELOW :</h3>
			<div>
				<label>Food Namee</label>
				<input type="text" name="UfoodName" id="fdName"/>
			</div>
			<div>
				<label>Food Price</label>
				<input type="text" name="UfdPrice" id="fdPrice"/>
			</div>
   			<input type="submit" id="phoneNum" name="updates" value="updateeee" class="btn btn-success">
	</form>
			<?php
			
				if(isset($_POST['updates'])){
	$upd="UPDATE tbfood SET foodName='".$_POST['UfoodName']."',foodPrice=".$_POST['UfdPrice']." WHERE foodId=".$_POST['choose'];
						
						if($con->query($upd)===TRUE)
						{
							echo "UPDATEs Success";
							echo $ins;
						}
						else{
							echo "UPDATEs error";
						}

					}
					$_POST['phoneNumb']="";
				 ?>
</div>

             <!--          *****************    READ THE DATA BASE    *********************           -->
             </div>
		 <div class="col-lg-6">
		<?php

		$select = "SELECT * FROM tbfood";
		$st = $con->query($select);
		if($st->num_rows>0)
		{
			echo "<table border=1 class='table'> <tr class='thead'>
			 <th>Food Id</th>
			<th>Food Name</th>
			<th>Food Price</th></tr>   ";
			while($stu=$st->fetch_assoc())
			{
				echo "<tr class='tbody'><td>" 
				                     .$stu["foodId"]."</td><td>"
								     .$stu["foodName"]."</td><td>"
									 .$stu["foodPrice"]."</td></tr>";
			}
			echo "</table>";
			mysqli_close($con);
		}
		?>
		</div>		  <!--  End Display Data   -->	      
</body>
</html>

<!--?php	
require 'footer.php';
	?-->