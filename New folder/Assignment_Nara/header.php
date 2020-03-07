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
	<br/><br/>
	<div class="container">
		<br/>
	<?php require 'menu.php'; ?>
	<?php
		$name="localhost";
		$user="root";
		$pass="";			
		$db="rupp";
		$table="drinktb";
		$row = array('drinkId','drinkName','drinkType','drinkPrice');			
		$con=mysqli_connect($name,$user,$pass,$db) or die("fail");
	?>
	<div class="col-lg-8 data2">

