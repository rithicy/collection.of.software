<?php include 'header.php'; ?>
<div class="container">

<?php

	 if( empty($_GET['err']) ){
		 $_GET['err']='';
	 }
	 else{

	 }
	// $_GET['name_error']=$_GET['pass_error']='';

 ?>
<form action="validate.php" method="post">
	<h2>Create Product</h2>
    <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" class="form-control" placeholder="product name .......">
    </div>
    <div class="form-group">
          <label for="">Image Url</label>
          <input type="text" name="photo" class="form-control" placeholder="image url .......">
    </div>
    <div class="form-group">
          <label for="">Price</label>
          <input type="text" name="price" value="" class="form-control" placeholder="product name .......">
    </div>
		<br/>
    	<?php if( !empty($_GET['err'])) echo '<div class="alert alert-danger"><strong>One Of the field need Value</strong></div>'; ?>
    <input type="submit" name="submit" class="btn btn-info">

</form>







</div>
