<?php include 'header.php'; ?>
<?php

	 if( empty($_GET['err']) ){
		 $_GET['err']='';
	 }
	 else{

	 }
	// $_GET['name_error']=$_GET['pass_error']='';
 ?>

<?php
    if(isset($_GET['id'])){
      $product = new Product;
      var_dump($product->find($_GET['id']));
    }
 ?>
<div class="container">

<form method="post" enctype="multipart/form-data">
	<h2>Update Product</h2>
    <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" class="form-control" placeholder="product name .......">
    </div>
    <div class="form-group">
          <label for="">Image Url</label>
          <input type="file" name="photo" class="form-control" placeholder="image url .......">
    </div>
    <div class="form-group">
          <label for="">Price</label>
          <input type="text" name="price" value="" class="form-control" placeholder="product name .......">
    </div>
		<br/>
    	<?php if(($_GET['err']!='')) echo '<div class="alert alert-danger"><strong>One Of the field need Value</strong></div>'; ?>
    <input type="submit" name="submit" class="btn btn-info">

</form>
<?php
  $product = new Product;
  $name=$name_err=$pass=$pass_err='';

     // ---------------validate------------
  if(isset( $_POST['submit'] ))
  {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($_POST['name']=='' || $_POST['price']=='' || $_POST['price']==''){

      echo "<script> alert('error') </script>";
        header("Location:edit.php?err=true&b=1");
        // $_FILES["fileToUpload"]["tmp_name"];
    }

    // validate if image or not
    elseif($check == false) {
      header("Location: index.php?err=true&a=1");
    }
    else{
      $dir = './assets/uploads/';

      $name = $_POST['name'];
      $photo = $product->uploadImage($dir);
      $price = $_POST['price'];

      $ans = $product->update($id,$name,$photo,$price);
      if($ans = true){
            header('Location: product.php');
      }
      else{
        echo 'false';
      }

    }
}
 ?>





</div>
