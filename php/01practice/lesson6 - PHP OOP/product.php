<?php include 'header.php'; ?>
<div class="container">

<h2 class="text-center">Product List</h2>






<?php
$product = new Product();


$data = $product->index();


if($data->num_rows>0)
{
  ?>
  <table class="table table-striped table-bordered">
    <thead>
      <td>Name</td>
      <td>Photo</td>
      <td>Price</td>
      <td>Description</td>
  </thead>
    <?php
  while($item = $data->fetch_assoc())
  {
  ?>
  <tbody>
          <td><h4><?php echo $item['name']; ?></h4></td>
          <td><img src="<?php echo $item['photo']; ?>" height="200px;"></td>
          <td><p><?php echo $item['price']; ?> USD</p></td>
          <td></td>
  </tbody>
  <?php
  }
  ?>
  </table>
  <?php
}
else{
  ?>
  <h1>No Data</h1>

  <?php
}
?>






</div>
