<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>

<div class="container">


<div class="col-lg-6">

<!-- form -->
<form method="POST" action="">
	<h1>Absolute Class registration</h1>
	
		<div class="form-group">
		<label>Name :</label>
		<input class="form-control" name="name">
		</div>
		<div id="name_msg"></div>


		<div class="form-group">
		<label>E-mail :</label>
		<input class="form-control" name="email">
		</div>

		<div class="form-group">
		<label>Time :</label>
		<input class="form-control" name="time">
		</div>

		<div class="form-group">
		<label>Classes :</label>
		<textarea class="form-control" name="class">	
		</textarea>
		</div>

		<div class="form-group">
		<label>Gender :</label>
		<input type="radio" name="gender" value="male">
		<label>male</label>
		<input type="radio" name="gender" value="female">
		<label>female</label>
		</div>

		<div class="form-group">
		<label>Website :</label>
		<input class="form-control" name="website">
		</div>

	<input type="submit" class="btn btn-success">

</form>
<!-- end form -->
</div>


<div class="col-lg-4">
<?php

//declare error variable
$name_error=$email_error=$gender_error=$website_error='';
$name=$email=$time=$class=$gender=$website=$time='';
$time_error='';

	if($_SERVER["REQUEST_METHOD"]=="POST"){
		
		// start form validation	
		
		//name--------------------
		if(empty($_POST["name"])){
			$name_error="Name is Required";
			$name_msg="<div class='alert alert-danger'>$name_error</div>";
?>

			<script>document.getElementById('name_msg').push("<?= $name_msg ?> ");</script>
			<?php
			print("<div class='alert alert-danger'>$name_error</div>");

		}
		
		else{

			if(filter_var($_POST["name"],FILTER_VALIDATE_INT))
			{
				$name_error="name is character not number";
			}
			else
			{
				$name=$_POST["name"];
				print("$name");
			}
		}
	


		//email------------------------
		if(empty($_POST["email"])){
			$email_error="Email is Required";
			print("<div class='alert alert-danger'>
				$email_error</div>");
		}
		else{

			if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
			$email_error="This is not email type";
			print("<div class='alert alert-danger'>
				$email_error</div>");

			}
		else{
			$email=$_POST["email"];
			print("$email");
		}
		}

		//check if email address is well formed
		
		//time
		if(!empty($_POST["time"] )){
		
		}
		else{
			$time=$_POST["time"];
			print("$time");
		}

		//gender-------------------------
		if(empty($_POST["gender"])){
			$gender_error="Gender is Required";
			print("<div class='alert alert-danger'>
				$gender_error</div>");
		}
		else{
			$gender=$_POST["gender"];
			print("$gender");
		}

		//website-------------------------
		if(empty($_POST["website"])){
		
		}

		elseif(!filter_var($email,FILTER_VALIDATE_URL)){
			$website_error="This is not website type !";
			print("<div class='alert alert-danger'>
				$website_error</div>");
		}
		else{
			$website=$_POST["website"];
			print("$website");
		}

	}

echo '';

	



?>
</div>
</div>

</body>
</html>