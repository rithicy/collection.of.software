<?php include 'header.php'; ?>
<div class="container">


<?php
  $name=$name_err=$pass=$pass_err='';

     // ---------------validate------------
  if(isset( $_POST['submit'] ))
  {
    if($_POST['name']=='' || $_POST['photo']=='' || $_POST['price']==''){
        $_GET['err']="One of the field is blank";
        header("Location: index.php?err=true");
    }
    else{
      $name = $_POST['name'];
      $photo = $_POST['photo'];
      $price = $_POST['price'];

      $product = new product;
      $ans = $product->store($name,$photo,$price);
      header('Location: product.php');
    }
}
 ?>
</div>
