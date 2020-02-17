<?php include 'layouts/header.php'; ?>
<br>



      <?php
        $page = new Page;
        if(isset( $_GET['type'])){
          $id = $_GET['type'];
          ?>
          <div class="mb-9">
            <div class="row">
              <div class="col jumbotron">
          <?php


          $thisdata = $page->get_product_category($id);
          if($thisdata->num_rows>0)
          {
            while ($category = $thisdata->fetch_assoc()) {
              $cats_name = $category['category_id'];
              ?>

                <h2><?php echo $category['category_value']; ?></h2>
              <?php
            // $category_name = $each['category_value'];
            }
          }?>

        <ul class="nav nav-tabs bg-white mb-6 list-section">
          <?php
          $sub = $page-> get_product_subcategory($id);
          if($sub->num_rows>0){
            while ($each = $sub->fetch_assoc()) {
              ?>
          <li class="nav-item">
            <a class="nav-link" href="#<?php  echo $each['category_value']; ?>"><?php  echo $each['category_value']; ?></a>
          </li>
          <?php
        }
      }
      ?>
    </ul>
  </div>
</div>

    <?php
      $sub = $page-> get_product_subcategory($id);
        if($sub->num_rows>0){
          while ($each = $sub->fetch_assoc()) {
    ?>


  <?php
          $products = $page->display_product($each['subcategory_id']);
          if($products->num_rows>0){
  ?>
            <div class="row" id="<?php echo $each['category_value']; ?>">

                  <h3  class="home-h2"><?php echo $each['category_value']; ?></h3>

            </div>
            <div class="row">

  <?php
  $i=0;
  while ($item = $products->fetch_assoc()) {
    if($i<6){
  ?>

  <div class="col-md-2">
    <a href="product.php?id=<?php echo $item['product_id']; ?>" class="home-block">
      <img src="./assets/images/uploads/<?php echo $item['thumbnail']; ?>" alt="" style="width:60%;">
    <p><?php echo $item['code']; ?></p>
     <p>$ <?php echo $item['price']; ?> USD</p>
    </a>
  </div>

<?php } $i++;  }?>

<?php if($products->num_rows>6){ ?>
  </div>
<div class="row">
      <a href="archive.php?name=<?php echo $cats_name; ?>&type=<?php echo $each['category_id']; ?>" class="btn btn-secondary text-right ml-auto" style="display:block;">More</a>
</div>

<br>

<?php   } ?>
</div>



  <?php } }  }  ?>
<?php } else {
  include '404.php';
}?>

</div>
</div>
<?php include 'layouts/footer.php'; ?>
