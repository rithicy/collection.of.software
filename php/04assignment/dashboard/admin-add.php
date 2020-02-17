<?php
      include './layouts/header.php';
      include './layouts/sidemenu.php';

      $admin = new Admin;

      $product = $admin->get_products();
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
                  <h3 class="mb-0">New Admin Account</h3>
                </div>
                <div class="col-4 text-right">
                  <input type="submit" name="submit" value="Create" class="btn btn-primary">
                </div>
              </div>
            </div>
            <div class="card-body">

                <h6 class="heading-small text-muted mb-4">Admin Account Info</h6>

                  <div class="row">
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">First Name : <span class="text-red">(Required)</span> </label>
                        <input name="firstname" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Your first name....">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Last Name : <span class="text-red">(Required)</span> </label>
                        <input type="text" name="lastname" id="input-email" class="form-control form-control-alternative" placeholder="Your last name...">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Nickname </label>
                        <input type="text" name="nickname" id="input-first-name" class="form-control form-control-alternative" placeholder="Nickname...." >
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">birthdate </label>
                        <input type="date" name="birthdate" id="input-first-name" class="form-control form-control-alternative" placeholder="Nickname...." >
                      </div>
                    </div>
                  </div>
                  <div class="row">

                   
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Email  <span class="text-red">(Required)</span> </label>
                        <input type="text" name="email" id="input-last-name" class="form-control" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="custom-file form-group">
                        <label class="form-control-label" for="input-last-name">Profile Picture</label>
                        <input type="file" name="profile" id="input-last-name" class="custom-file-input form-control" placeholder="Last name">
                        <label class="custom-file-label" style="margin-top:30px;" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">password   <span class="text-red">(Required)</span> </label>
                        <input type="password" name="password" id="input-last-name" class="form-control" placeholder="password....">
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">phone  </label>
                        <input type="text" name="phone" id="input-last-name" class="form-control" placeholder="password....">
                      </div>
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <textarea name="address" id="input-address" class="form-control form-control-alternative" rows="8" cols="10"  placeholder="Home Address"></textarea>
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


        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $nickname = $_POST["nickname"];
        $birthdate = $_POST["birthdate"];
        $email = $_POST["email"];
         // Name that store image : thumbnail
        $file = "profile";
        $password = $_POST["password"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        if($firstname=="" || $lastname=="" ||$email=="" ||$password=="" ){
            echo $alert_error;
        }
        else{
          $status = $admin->add_admin_user( $firstname, $lastname, $nickname,$birthdate,$email,$file, $password,$phone,$address);
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
