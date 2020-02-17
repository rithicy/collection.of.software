<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <title></title>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
  <div class="container">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="?id=3 ">Product 3</a></li>
      <li><a href="?id=2 ">Product 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">sample</a></li>
    </ul>
  </div>
</nav>
<div class="container">


<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "instinct";

$connect = mysqli_connect("{$server}","{$username}","{$password}","{$database}") or die("error");

// ($a < $b ? 'a is smaller' : 'a equals or is greater');
( isset($_GET['id']) ? $_GET['id'] : 3 );

if(isset($_GET['id'])){

$query = " SELECT
          tbl_myproduct.id,tbl_myproduct.name,tbl_myproduct.image_url,tbl_myproduct.price,
          tbl_mycolor.value,tbl_mycolor.image_uri
          FROM tbl_myproduct
          INNER JOIN
          tbl_mycolor
          ON tbl_myproduct.id = tbl_mycolor.product_id
          WHERE tbl_myproduct.id = {$_GET['id']}
        ";

$result = $connect->query($query);

if($result->num_rows>0)
{
  $i=0;
  while ($each = $result->fetch_assoc()) {
    if($i==0)
    {
      $Product_Name = $each['name'];
      $Product_image = $each['image_url'];
      $Product_Price = $each['price'];
    }
    $Product_color[$i] = $each['value'];
    $Product_color_uri[$i] = $each['image_uri'];
    $i++;
  }
}
?>

<div class="col-md-4">
<img src="<?php echo $Product_image; ?>" alt="" class="img-responsive">
</div>
<div class="col-md-8">
    <h2>Name : <?php echo $Product_Name ; ?></h2><hr/>
    <h3>Price : <?php echo $Product_Price ; ?></h3><hr/>
    <h4>Color</h4>

    <?php for($j=0;$j<$i;$j++) { ?>
      <img src="<?php echo $Product_color_uri[$j]; ?>" alt="" style="display:inline-block;width:80px;">

    <?php } ?>
</div>

<?php }
 else{
  echo '<h2 class="text-center">Product not found</h2>';
} ?>

</div>
