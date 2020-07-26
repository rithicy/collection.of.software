<?php
      include './layouts/header.php';
      include './layouts/sidemenu.php';

      $admin = new Admin;
      $id = $_GET['id'];
      $product = $admin->find_ads($id);
?>
  <div class="main-content">
    <?php include './layouts/top-menu.php'; ?>
    <!-- Header -->
<div class="container-fluid mt--9">

  <div class="row">
    <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
          <?php  while($each = $product->fetch_assoc())
    { ?>
            <form method="POST" enctype="multipart/form-data">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit Advertise</h3>
                </div>
                <div class="col-4 text-right">
                  <input type="submit" name="submit" value="Create" class="btn btn-primary">
                </div>
              </div>
            </div>
            <div class="card-body">

                <h6 class="heading-small text-muted mb-4">Info Ads</h6>

                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Product Name <span class="text-red">(Required)</span> </label>
                        <input name="name" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Product Name" value="<?php echo $each['name']; ?>">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="custom-file form-group">
                        <label class="form-control-label" for="input-last-name">Thumbnail  <span class="text-red">(Required)</span> </label>

                        <input type="file" name="thumbnail" id="input-last-name" class="custom-file-input form-control" placeholder="Last name" value="<?php echo $each['thumbnail']; ?>">
                        <label class="custom-file-label" style="margin-top:30px;" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Description</label>
                        <textarea name="description" id="input-address" class="form-control form-control-alternative" rows="8" cols="10"  placeholder="Home Address"><?php echo $each['description']; ?></textarea>
                      </div>
                    </div>
                  </div>



              </form>
                            <?php } ?>
            </div>
          </div>
        </div>
  </div>
  <?php
      if( isset($_POST["submit"]) ){

  // echo "Upload: " . $_FILES["thumbnail"]["name"] . "<br>";
  // echo "Type: " . $_FILES["thumbnail"]["type"] . "<br>";
  // echo "Size: " . ($_FILES["thumbnail"]["size"] / 1024) . " kB<br>";


        $name = $_POST["name"];
        $code = $_POST["code"];
        $pri = $_POST["price"];
        // Name that store image : thumbnail
        $file = "thumbnail";
        $desc = $_POST["description"];
        $cate = $_POST["category"];
        $sub = $_POST["subcategory"];
        if($name=="" || $code=="" ||$pri=="" ||$desc=="" ||$cate=="" ||$sub==""){
            echo $alert_error;
        }
        else{
          $status = $admin->update_product($name,$code,$pri,$file,$desc,$cate,$sub,$id);
          if($status==true){
            echo $alert_success;
          }
          else{
              echo $alert_error_img;
          }

        }




      }
   ?>

<?php include './layouts/footer-credit.php'; ?>
</div>
</div>
<?php include './layouts/footer.php'; ?>
