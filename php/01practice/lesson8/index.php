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

<form action="validate.php" method="post" enctype="multipart/form-data">
	<h2>Create Product</h2>
    <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" class="form-control" placeholder="product name .......">
    </div>
    <div class="form-group">
          <label for="">Image Url</label>
          <input type="file" name="photo" onload="readURL(fff)" class="form-control" id="input" placeholder="image url .......">
					<br/>
					<div class="" style="width:200px;height:200px;background-color:#f0f0f0;">
							<img src="" alt="" style="width:100%;">
					</div>
    </div>
    <div class="form-group">
          <label for="">Price</label>
          <input type="text" name="price" value=""  class="form-control" placeholder="product name .......">
    </div>
		<br/>
    	<?php if(($_GET['err']!='')) echo '<div class="alert alert-danger"><strong>One Of the field need Value</strong></div>'; ?>
    <input type="submit" name="submit" class="btn btn-info">

</form>



<script>

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#product_image').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
        $("#imgInp").change(function(){
        readURL(this);

            // alert(JSON.stringify(this));
    });
</script>



</div>
