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
	
<link rel="stylesheet" href="style/style.css">
</head>
<body>
	<h1> Php មេរៀនទី២ : របៀបinput and output data ដោយ​ប្រើ​form</h1>

      <form method="get" action="index.php">
      	<div>
      		<label> Text Box : </label>
      		<input type="text" name="txt"/>
      	</div>
      	<div>
      		<label> Password : </label>
      		<input type="text" name="pwd"/>
      	</div>
      	<div>
      		<label> Check Box : </label>
      		c1<input class="Checkbox" type="checkbox" name="chk1" value="1" />
      		c2<input  class="Checkbox" type="checkbox" name="chk2" value="2" />
      	</div>
      	<div>
      		<label> Radio Button : </label>
      		c1<input class="Checkbox" type="radio" name="rdo" value="A" />
      		c2<input   type="checkbox" name="rdo" value="B" />
      	</div>

      		<div>
      			<label> Dropdown List : </label>
      			<select name="dll">
      				<option value="1"> Option 1</option>
      				<option value="2"> Option 2</option>
      				<option value="3"> Option 3</option>
      			</select>
      		</div>

      		<div>
      			<label> Dropdown List : </label>
      			<select name="lst[]" multiple>
      				<option value="AA"> Option 1</option>
      				<option value="BB"> Option 2</option>
      				<option value="CC"> Option 3</option>
      			</select>
      		</div>

      	<div>
      		<label>Submit</label>
      		<input type="submit" name="smt" value="Yes"/>
      	</div>
      </form>

      <div id="form">
      	<h4 class="answer"> <!--   get value from input        -->
      	<?php
      	 if(isset($_GET["smt"]))// isset use to know variable get value by pressing button or not   -->      
      	 	{       
      	 	if(isset($_GET["txt"]))	{	echo "<h4>";	echo "Text Box :". $_GET["txt"];		echo "</h4>";	}	
      	 	if(isset($_GET["pwd"]))	{	echo "<h4>";	echo "Password :". $_GET["pwd"];		echo "</h4>";	} 
      	  	if(isset($_GET["chk1"]))	{ 	echo "<h4>";	echo "Checkbox 1 :". $_GET["chk1"];		echo "</h4><br/>";	}
      	  	if(isset($_GET["chk2"]))	{	echo "<h4>";	echo "Checkbox 2 :". $_GET["chk2"];		echo "</h4><br/>";	} 
      		if(isset($_GET["rdo"]))	{	echo "<h4>";	echo "Checkbox 2 :". $_GET["rdo"];		echo "</h4><br/>";	} 


      			if(isset($_GET["dll"]))	{	echo "<h4>";	echo "Dropdown List 2 :". $_GET["dll"];		echo "</h4><br/>";	} 
      				if(isset($_GET["lst"]))	{
      				foreach( $_GET["lst"] as $selected)
                              {
                                    echo "<h4>";     echo "Selected :". $selected;            echo "</h4>";
                              }

      					
      						} 

      		
      		}
      	 ?>
      	</h4>
      </div>
</body>
</html>
<!--?php	
require 'footer.php';
	?-->