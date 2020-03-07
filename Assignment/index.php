
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" /> 	
	<title>Page Title</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="style/style.css" />
	<script src="main.js"></script>
	<link rel="stylesheet" href="style/bootstrap.css">
</head>
<body>
	<div class="container-fluid text-center"> 
		<h3 class="col-lg-12"><a href="index.php">Student Management</a></h3>
	</div>
	<?php
		$name="localhost";
		$user="root";
		$pass="";			
		$db="university";
		$table="tbstudent";
		$row = array('stId','stName','stSex','stBirthDate','stYear','stClass','stSubject','stShift');			
		$con=mysqli_connect($name,$user,$pass,$db) or die("fail");
	?>
 <div class="col-lg-4 data2">
 	<!--  ********** Search FROM THE DATABASE   *******  -->
<div class="col-lg-12 jumbotron">
			<form method="POST" action="index.php" >
						<h4>Search</h4>
					<div class="form-group">
					<label>Search Name :</label>
					<input type="text" name="fdDel" id="fdDel" class="form-control" />
				</div>
   				<input  type="submit" id="phoneNum" name="searchName" value="Search" class="btn btn-danger">
				   
			</form>
</div> 
<!-- *********   INSERT TO THE DATABASE   ************  -->
 	<div class="col-lg-12 well">
		<form method="post" action="index.php" name="frmIns">
			<h4>New Student</h4>
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="stuName" id="fdId" class="form-control"/>
				</div>
				<div class="form-group">
					<label>Sex</label>
					<select name="stuSex" class=" col-lg-12">
						<option value ="">**Please Select**</option>
					<option value = "M">Male</option>
					<option value = "F" >Female</option>
				</select>
				</div>
				
				<div class="form-group">
					<label>BirthDate</label>
					<input type="text" name="stuBirth" id="fdPrice" class="form-control"/>
				</div>
				<div class="form-group">
					<label>Year</label>
					<input type="text" name="StuYear" id="fdPrice" class="form-control"/>
				</div>
				<div class="form-group">
					<label>Class</label>
					<input type="text" name="stuClass" id="fdPrice" class="form-control"/>
				</div>
				<div class="form-group">
					<label>Subject</label>
					<select name="stuSubject" class="col-lg-12">
					<option value ="">**Please Select**</option>
					<option value = "Web App Development">Web App Development</option>
					<option value = "Software Engineering" >Software Engineering</option>
					<option value = "Object Oriented Administrator">Object Oriented Administrator</option>
					<option value = "Linux System Admin">Linux System Admin</option>
					<option value = "Android App Development">Android App Development</option>
					<option value = "Management Information System">Management Information System</option>
					<option value = "Laravel Framework">Laravel Framework</option>
					<option value = "AngularJS Development">AngularJS Development</option>
					<option value = "ReactNative Development">ReactNative Development</option>
				</select>
				</div>
				<div class="form-group">
					<label>Shift</label>
					<select name="stuShift" class="col-lg-12">
					<option value ="">**Please Select**</option>
					<option value = "Morning">Morning</option>
					<option value = "Afternoon" >Afternoon</option>
					<option value = "Evening">Evening</option>
					<option value = "Night">Night</option>
					<option value = "Weekend">Weekend</option>
				</select>
				</div>

				
   				<input type="submit" name="phoneNumb" value="save" class="btn btn-danger" onclick="valid()">
			</form>
<?php
//	if(isset($_POST['phoneNumb'])){
?>
			<?php
			if(isset($_POST['phoneNumb'])){

				if($_POST["stuName"]=="")
				{
					if(gettype($_POST["stuName"])!="string")
					{

						echo '<script>alert ("Please Input only Character");</script>';
					exit();
					}
					echo gettype($_POST["stuName"]);
					echo '<script>alert ("please input student name");</script>';
					exit();
				}
				
				if($_POST["stuSex"]=="")
				{
					echo '<script>alert ("please input student sex");</script>';
					exit();
				}
				if($_POST["stuBirth"]=="")
				{
					echo '<script>alert ("please input birthdate");</script>';
					exit();
				}
				if($_POST["StuYear"]=="")
				{
					echo '<script>alert ("please input year");</script>';
					exit();
				}
				if($_POST["stuClass"]=="")
				{
					echo '<script>alert ("please input class");</script>';
					exit();
				}
				if($_POST["stuSubject"]=="")
				{
					echo '<script>alert ("please input subject");</script>';
					exit();
				}
				if($_POST["stuShift"]=="")
				{
					echo '<script>alert ("please input shift");</script>';
					exit();
				}

		$ins="INSERT INTO $table VALUES(NULL,'".$_POST["stuName"]."','".
												$_POST['stuSex']."','".$_POST['stuBirth']."',".
												$_POST['StuYear'].",'".$_POST['stuClass']."','".
												$_POST['stuSubject']."','".$_POST['stuShift']."');";
			if($con->query($ins)===TRUE)
				{
					echo "<h4 class='text-success'>Add success!</h4>";
				}
			else{
					echo "<h4 class='text-warning'>Adding Wrong </h4>";
				}
				}
			?>
<?php
//	}			
?>
</div>


<!--  **********    DELETE FROM DATABASE  *************  -->
<div class="col-lg-12 jumbotron">
			<form method="POST" action="index.php">
						<h4>Delete From Database</h4>

					<div class="form-group">
					<label>Delete Id :</label>
					<input type="text" name="delCol" id="fdDel" class="form-control"/>
				</div>
   				<input type="submit" id="phoneNum" name="delStu" value="Delete" class="btn btn-danger">
			</form>	
<?php
if(isset($_POST['delStu'])){ 
				if($_POST["delStu"]=="")
				{
					echo '<script>alert ("please input student id");</script>';
					exit();
				}

	$select = "SELECT * FROM $table";
		$str = $con->query($select);
		if($str->num_rows>0)
		{	
			while($student=$str->fetch_assoc())
			{
				if($student["$row[0]"]==$_POST['delCol']) {
					$del="DELETE FROM $table WHERE $row[0] = ".$_POST["delCol"];
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

  <!-- **********  UPDATE THE DATABASE   *******  -->
<div class="col-lg-12 well">
	<form method="post" action="index.php">
		<div class="form-group">
					<label>Update Name By Id :</label>
					<input type="text" name="studId" id="fdId" class="form-control"/>
				</div>
		<h4>UPDATE Database</h4>
			<div class="form-group">
					<label>Name</label>
					<input type="text" name="studName" id="fdId" class="form-control"/>
				</div>
				<div class="form-group">
					<label>Sex</label>
					<select name="studSex" class=" col-lg-12">
					<option value ="">**Please Select**</option>
					<option value = 'M'>Male</option>
					<option value = 'F' >Female</option>
				</select>
				</div>
				<div class="form-group">
					<label>BirthDate</label>
					<input type="text" name="studBirth" id="fdPrice" class="form-control"/>
				</div>
				<div class="form-group">
					<label>Year</label>
					<input type="text" name="StudYear" id="fdPrice" class="form-control"/>
				</div>
				<div class="form-group">
					<label>Class</label>
					<input type="text" name="studClass" id="fdPrice" class="form-control"/>
				</div>
				<div class="form-group">
					<label>Subject</label>
					<select name="studSubject" class="col-lg-12">
					<option value ="">**Please Select**</option>
					<option value = "Web App Development">Web App Development</option>
					<option value = "Software Engineering" >Software Engineering</option>
					<option value = "Object Oriented Administrator">Object Oriented Administrator</option>
					<option value = "Linux System Admin">Linux System Admin</option>
					<option value = "Android App Development">Android App Development</option>
					<option value = "Management Information System">Management Information System</option>
					<option value = "Laravel Framework">Laravel Framework</option>
					<option value = "AngularJS Development">AngularJS Development</option>
					<option value = "ReactNative Development">ReactNative Development</option>
				</select>
				</div>

				<div class="form-group">
					<label>Shift</label>
					<select name="studShift" class="col-lg-12">
					<option value ="">**Please Select**</option>
					<option value = "Morning">Morning</option>
					<option value = "Afternoon" >Afternoon</option>
					<option value = "Evening">Evening</option>
					<option value = "Night">Night</option>
					<option value = "Weekend">Weekend</option>
				</select>
				</div>
				
	
   			<input type="submit" id="phoneNum" name="updates" value="updateeee" class="btn btn-danger">
	</form>
<?php
	if(isset($_POST['updates'])){
		if($_POST['studName']=="")
				{
					echo '<script>alert ("please input student name");</script>';
					exit();
				}
				if($_POST['studSex']=='')
				{
					echo '<script>alert ("please input student sex");</script>';
					exit();
				}
				if($_POST['studBirth']=="")
				{
					echo '<script>alert ("please input birthdate");</script>';
					exit();
				}
				if($_POST['StudYear']=="")
				{
					echo '<script>alert ("please input year");</script>';
					exit();
				}
				if($_POST['studClass']=="")
				{
					echo '<script>alert ("please input class");</script>';
					exit();
				}
				if($_POST['studSubject']=="")
				{
					echo '<script>alert ("please input subject");</script>';
					exit();
				}
				if($_POST['studShift']=="")
				{
					echo '<script>alert ("please input shift");</script>';
					exit();
				}
				if($_POST['studId']=="")
				{
					echo '<script>alert ("please input shift");</script>';
					exit();
				}
		$upd="UPDATE $table SET $row[1]='".$_POST['studName']."',"."
								$row[2]='".$_POST['studSex']."',"."
								$row[3]='".$_POST['studBirth']."',"."
								$row[4]=".$_POST['StudYear'].","."
								$row[5]='".$_POST['studClass']."',"."
								$row[6]='".$_POST['studSubject']."',"."
								$row[7]='".$_POST['studShift'].
					"' WHERE $row[0]=".$_POST['studId'];

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

<!-- *********** READ THE DATABASE ************ -->       
		 <div class="col-lg-8">
		 	<table border=1 class='tables table'> <tr class='thead'>
			 <th>ID</th>
			<th>Name</th>
			<th>Sex</th>
			<th>BirthDate</th>
			<th>Year of Study</th>
			<th>Class</th>
			<th>Subject</th>
			<th>Shift</th></tr> </table>
			<div class="data">
<?php   
		if(isset($_POST['searchName'])){
			if($_POST['fdDel']==''){
				echo '<script>alert("Please Enter Name ");</script>';
				exit();
			}
			$select = 'SELECT * FROM tbStudent WHERE stName LIKE "%'.$_POST['fdDel'].'%" ';
		$st = $con->query($select);
		if($st->num_rows>0)
		{
			
			echo "<table border=1 class='table'>";
					while($stu=$st->fetch_assoc())
					{	

						echo "<tr class='tbody'><td>"; 
						echo  $stu[  $row[0]   ]."</td><td>"
								.$stu[ $row[1] ]."</td><td>"
								.$stu[ $row[2] ]."</td><td>"
								.$stu[ $row[3] ]."</td><td>"
								 .$stu[ $row[4] ]."</td><td>"
								  .$stu[ $row[5] ]."</td><td>"
								   .$stu[ $row[6] ]."</td><td>"
									 .$stu[ $row[7] ]."</td></tr>";
						

					}

					
				
			echo "</table>";
			mysqli_close($con);
		}
		else{
			echo '<h1>Name Not Found</h1>';
		}
				exit();
				
				}

				/******************/



		$select = "SELECT * FROM tbstudent";
		$st = $con->query($select);
		if($st->num_rows>0)
		{

			echo "<table border=1 class='table'>";
					while($stu=$st->fetch_assoc())
					{
					
						echo "<tr class='tbody'><td>"; 
						echo  $stu[  $row[0]   ]."</td><td>"
								.$stu[ $row[1] ]."</td><td>"
								.$stu[ $row[2] ]."</td><td>"
								.$stu[ $row[3] ]."</td><td>"
								 .$stu[ $row[4] ]."</td><td>"
								  .$stu[ $row[5] ]."</td><td>"
								   .$stu[ $row[6] ]."</td><td>"
									 .$stu[ $row[7] ]."</td></tr>";
					}
				
			echo "</table>";
			mysqli_close($con);
		}
		?>
		</div>  
		</div>
<!-- *********** End OF Database Display ************ -->  

</body>
</html>

<!--?php	
require 'footer.php';
	?-->