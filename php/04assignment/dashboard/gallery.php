<?php
      include 'layouts/header.php';
      include 'layouts/sidemenu.php';
      $dirname = "../assets/images/uploads/";
      $images = glob($dirname."*.*");
?>
  <div class="main-content">
<?php include 'layouts/top-menu.php'; ?>
    <!-- Header -->
    <div class="container-fluid mt--9">
      <div class="row">
          <div class="col-lg-12">
              <h1 class="text-white text-center mb-6"> Gallery</h1>
          </div>
      </div>
      <div class="row">
        <?php foreach($images as $image) {   ?>
            <div class="col-lg-2">
              <div class="card">
                  <img class="img-thumbnail" src="<?php echo $image; ?>"/>
              </div>

                </div>
        <?php  }  ?>
      </div>








    <?php include './layouts/footer-credit.php'; ?>
    </div>
  </div>
    <?php include './layouts/footer.php'; ?>
