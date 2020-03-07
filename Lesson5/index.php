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
		  <!--  End Display Data   -->	
		  <?php 
		  	use PHPMailer\PHPMailer\PHPMailer;  //nameapace / class
		  	use PHPMailer\PHPMailer\Exception;

		  	//file for using PHP mail
		  	require "PHPMailer\PHPMailer.php";
		  	require "PHPMailer\Exception.php";
		  	require "include\PHPMailer\SMTP.php";

		  	$mail=new PHPMailer(true);

		  	try{//SMTP   mail transfer protocol
		  		$mail->isSMTP();
		  		$mail->HOst='smtp.googlemail.com';
		  		$mail->SMTPAuth=true;
		  		$mail->Username=GMAIL_USERNAME;
		  		$mail->Password=GMAIL_PASSWORD;
		  		$mail->SMTPSecure='ssl';
		  		$mail->Port=465;
		  		$mail->setFrom(FROM_EMAIL_ADDRESS, FROM_NAME);

		  		$mail->addAddress(TO_EMAIL_ADDRESS, FROM_NAME);
		  	}
		  ?>      
</body>
</html>

<!--?php	
require 'footer.php';
	?-->