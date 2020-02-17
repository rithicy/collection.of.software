<?php include 'layouts/header.php'; ?>

<div id="demoo" class="carousel slide  mt--3" data-ride="carousel">

  <?php
    $page = new Page;

      ?>
  <!-- The slideshow -->
  <div class="carousel-inner mt--4" style="height:350px;">

      <?php
      $sub = $page->get_ads();
        if($sub->num_rows>0){
          $ii = 0;
          while ($each = $sub->fetch_assoc()) {
            $ii++;
      ?>
      <div class="carousel-item <?php echo (($ii==1) ?  'active' : '') ; ?>">
      <img src="./assets/images/uploads/<?php echo $each['img_source']; ?>" alt="Los Angeles" width="100%">
          </div>
    <?php } } ?>


  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demoo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demoo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>

<!-- 1 -->
    <div class="mb-9" style="margin-top:50px;">

<?php
$sub = $page-> show_type_products('popular');
  if($sub->num_rows>0){ ?>
    <div class="row">

          <h2 class="home-h2">Popular</h2>


    </div>
<div class="row">
    <?php
    while ($each = $sub->fetch_assoc()) {
?>
<div class="col-md-2">
  <a href="product.php?id=<?php echo $each['product_id']; ?>" class="home-block">
    <img src="./assets/images/uploads/<?php echo $each['thumbnail']; ?>" alt="" style="width:60%;">
    <p><?php echo $each['code']; ?></p>
    <p>$ <?php echo $each['price']; ?> USD</p>
  </a>
</div>
<?php  } ?>
</div>
<?php  }  ?>
<?php if($sub->num_rows>6){ ?>
  </div>
<div class="row">
      <a href="archive.php?name=<?php echo $cats_name; ?>&type=<?php echo $each['category_id']; ?>" class="btn btn-secondary text-right ml-auto" style="display:block;">More</a>
</div>
<br>
<?php   } ?>
</div>

<!-- 2 -->
<div class="mb-9" style="margin-top:50px;">

<?php
$sub = $page-> show_type_products('instock');
if($sub->num_rows>0){ ?>
<div class="row">

      <h2 class="home-h2">Instock</h2>


</div>
<div class="row">
<?php
while ($each = $sub->fetch_assoc()) {
?>
<div class="col-md-2">
<a href="product.php?id=<?php echo $each['product_id']; ?>" class="home-block">
<img src="./assets/images/uploads/<?php echo $each['thumbnail']; ?>" alt="" style="width:60%;">
<p><?php echo $each['code']; ?></p>
<p>$ <?php echo $each['price']; ?> USD</p>
</a>
</div>
<?php  } ?>
</div>
<?php  }  ?>
<?php if($sub->num_rows>6){ ?>
</div>
<div class="row">
  <a href="archive.php?name=<?php echo $cats_name; ?>&type=<?php echo $each['category_id']; ?>" class="btn btn-secondary text-right ml-auto" style="display:block;">More</a>
</div>
<br>
<?php   } ?>
</div>

<!-- 3 -->
<div class="mb-9" style="margin-top:50px;">

<?php
$sub = $page-> show_type_products('new');
if($sub->num_rows>0){ ?>
<div class="row">

      <h2 class="home-h2">New Products</h2>


</div>
<div class="row">
<?php
while ($each = $sub->fetch_assoc()) {
?>
<div class="col-md-2">
<a href="product.php?id=<?php echo $each['product_id']; ?>" class="home-block">
<img src="./assets/images/uploads/<?php echo $each['thumbnail']; ?>" alt="" style="width:60%;">
<p><?php echo $each['code']; ?></p>
<p>$ <?php echo $each['price']; ?> USD</p>
</a>
</div>
<?php  } ?>
</div>
<?php  }  ?>
<?php if($sub->num_rows>6){ ?>
</div>
<div class="row">
  <a href="archive.php?name=<?php echo $cats_name; ?>&type=<?php echo $each['category_id']; ?>" class="btn btn-secondary text-right ml-auto" style="display:block;">More</a>
</div>
<br>
<?php   } ?>
</div>
</div>
<!-- ddddddddddddddddd -->

<?php include 'layouts/footer.php'; ?>
