<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>


<div class="container">

<div class="col-lg-6 col-lg-offset-3">
	<form class="" method="post" action="">
	<h2>Form</h2>
	<div class="form-group">
			<label for="">Value A</label>
			<input  name="a" placeholder="please input A" class="form-control" required>
	</div>

	<div class="form-group">
			<label for="">Value B</label>
			<input name="b" placeholder="please input B" class="form-control" required>
	</div>
	<input type="submit"  class="btn btn-danger" name="operator" value="+">
		<input type="submit" class="btn btn-info" name="operator" value="-">
		<input type="submit" class="btn btn-success" name="operator" value="x">
		<input type="submit" class="btn btn-warning
		" name="operator" value="/">


	</form>
	<hr>
	<?php
	 $a=$b=$result=null;



		if(!isset($_POST['a']) && !isset($_POST['b'])){

		}
		else{
			$operator=$_POST['operator'];
			$a = isset($_POST['a']) ? $_POST['a'] : '';
			$b = isset($_POST['b']) ? $_POST['b'] : '';


			if($operator=='+')
			{
				$result = $a+$b;
			}
			if($operator=='-')
			{
				$result = $a-$b;
			}
			if($operator=='x')
			{
				$result = $a*$b;
			}
			else{
				$result = $a/$b;
			}
		}
	 ?>
	<?php
		if($result != null){
			echo '<h3> Answer : '.$result.'</h3>';
		}
		else{
				echo '<h1>No DATA</h1>';
		}
	?>
</div>
</div>

</body>
</html>
