<?php include 'header.php'; ?>
<?php
   if( empty($_GET['name_err']) ){
		 $_GET['name_err'] = '';
	 }
	 else{

	 }

	 if( empty($_GET['pass_err']) ){
		 $_GET['pass_err']='';
	 }
	 else{

	 }
	// $_GET['name_error']=$_GET['pass_error']='';

 ?>
		<div class="container">
			<div class="col-lg-3">
				<form class="" action="validation.php" method="post">
					<h2>Form</h2>
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" name="name"  class="form-control">
						</div>
						<?php if( !empty($_GET['name_err'])) echo '<span style="color:red;"><strong>'.$_GET['name_err'].'</strong></span>'; ?>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" name="pass"  class="form-control">
						</div>
						<?php if( !empty($_GET['pass_err']) ) echo '<span style="color:red;"><strong>'.$_GET['pass_err'].'</strong></span>'; ?>
						<hr>
						<input type="submit" name="submit" value="Enter" class="btn btn-info">
				</form>
			</div>

		</div>


	</body>
</html>
