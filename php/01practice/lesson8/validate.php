<?php include 'header.php'; ?>
<div class="container">

<?php
  $product = new Product;
  $name=$name_err=$pass=$pass_err='';

     // ---------------validate------------
  if(isset( $_POST['submit'] ))
  {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($_POST['name']=='' || $_POST['price']=='' || $_POST['price']==''){

      echo "<script> alert('error') </script>";
        header("Location: index.php?err=true&b=1");
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

      $ans = $product->store($name,$photo,$price);
      header('Location: product.php');
    }
}
 ?>
 
</div>
