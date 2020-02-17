<?php
      include './layouts/header.php';
      include './layouts/sidemenu.php';

      $admin = new Admin;


?>
  <div class="main-content">
    <?php include './layouts/top-menu.php'; ?>
    <!-- Header -->
<div class="container-fluid mt--9">

  <div class="row">
    <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">

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
                        <input name="name" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Product Name" value="">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="custom-file form-group">
                        <label class="form-control-label" for="input-last-name">Image (1170px * 460px)  <span class="text-red">(Required)</span> </label>

                        <input type="file" name="image" id="input-last-name" class="custom-file-input form-control" placeholder="Last name" value="">
                        <label class="custom-file-label" style="margin-top:30px;" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Detail</label>
                        <textarea name="detail" id="input-address" class="form-control form-control-alternative" rows="8" cols="10"  placeholder="Home Address"></textarea>
                      </div>
                    </div>
                  </div>



              </form>

            </div>
          </div>
        </div>
  </div>
  <?php
      if( isset($_POST["submit"]) ){

  // echo "Upload: " . $_FILES["thumbnail"]["name"] . "<br>";
  // echo "Type: " . $_FILES["thumbnail"]["type"] . "<br>";
  // echo "Size: " . ($_FILES["thumbnail"]["size"] / 1024) . " kB<br>";


        $nam = $_POST["name"];
        $det = $_POST["detail"];
        // Name that store image : thumbnail
        $ima = "image";

        if($nam=="" || $det=="" ||$ima== "" ){
            echo $alert_error;
        }
        else{
          $status = $admin->add_ads($nam,$ima,$det);
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
