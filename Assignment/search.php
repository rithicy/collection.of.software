<!--?php require 'header.php'; ?-->
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
		<h3 class="col-lg-11">Student Management</h3>
		<a href="index.php" class="col-lg-1 btn btn-default">Home</a>

	</div>
	<?php
		$name="localhost";
		$user="root";
		$pass="";			
		$db="rupp";
		$table="tbstudent";
		$row = array('stId','stName','stSex','stBirthdate','stYear','stClass','stSubject','stShift');			
		$con=mysqli_connect($name,$user,$pass,$db) or die("fail");
	?>
 <div class="col-lg-6 data2">

 	<!--  ********** Search THE DATABASE   *******  -->
<div class="col-lg-12 well">
			<form method="POST" action="search.php" >
						<h4>Search</h4>
					<div class="form-group">
					<label>Search Name :</label>
					<input type="text" name="fdDel" id="fdDel" class="form-control"/>
				</div>
   				<input type="submit" id="phoneNum" name="searchName" value="Search" class="btn btn-default">
			</form>
</div>
 </div>

<!-- *********** READ THE DATABASE ************ -->       
		 <div class="col-lg-6">
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

<?php   $select = "SELECT * FROM tbStudent";

		$st = $con->query($select);
		if($st->num_rows>0)
		{
			echo "<table border=1 class='table'>";
			
				
				if(isset($_POST['searchName'])){
					while($stu=$st->fetch_assoc())
					{

						if($_POST['fdDel']==$stu["stName"]){
						echo "<tr class='tbody'><td>"; 
						echo  $stu["stId"]."</td><td>"
								.$stu["stName"]."</td><td>"
								.$stu["stSex"]."</td><td>"
								.$stu["stBirthdate"]."</td><td>"
								 .$stu["stYear"]."</td><td>"
								  .$stu["stClass"]."</td><td>"
								   .$stu["stSubject"]."</td><td>"
									 .$stu["stShift"]."</td></tr>";
						}
					}
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