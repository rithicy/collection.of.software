<?php
      include 'layouts/header.php';
      include 'layouts/sidemenu.php';
?>
  <div class="main-content">
    <?php include 'layouts/top-menu.php'; ?>
    <!-- Header -->
    <?php $admin = new Admin;
            $myid = $_SESSION["user_id"];
          $pro = $admin->get_recent_user($myid);
          if($pro->num_rows==1){
          while($item = $pro->fetch_assoc()){
            $id = $item['user_id'];
    ?>

<div class="container-fluid mt--9">
        <div class="row">
          <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
              <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2 mb-6">
                  <div class="card-profile-image">
                    <a href="#">
                      <img src="../assets/images/uploads/<?php echo $item['profile']; ?>" class="rounded-circle img-thumbnail">
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">

                </div>
              </div>
              <div class="card-body pt-0 pt-md-4">

                <div class="text-center">
                  <h3>
                <?php echo $item['firstname'].' '.$item['lastname']; ?>
                  </h3>
                  <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i><?php echo $item['address']; ?>
                  </div>
                  <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i><?php echo $item['email']; ?>
                  </div>
                  <div>
                    <i class="ni education_hat mr-2"></i><?php echo $item['birthdate']; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
          <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
              <form method="POST">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">My account</h3>
                  </div>
                  
                  <div class="col-4 text-right">
                  <input type="submit" name="submit" class="btn btn-sm btn-primary" value="Update profile">
                  </div>
                </div>
              </div>
              <div class="card-body">
               
                  <h6 class="heading-small text-muted mb-4">User information</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                     
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Email address</label>
                          <input type="email" id="input-email" name="email" class="form-control form-control-alternative" placeholder="jesse@example.com" value="<?php echo $item['email']; ?>">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Password</label>
                          <input type="password" id="input-email" name="password" class="form-control form-control-alternative" placeholder="jesse@example.com">
                        </div>
                      </div>
                    </div>
                   
                  </div>

                  <div class="pl-lg-4">
                    <div class="row">

                     
                       <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-email">Nickname</label>
                          <input type="email" id="input-email" name="nickname" class="form-control form-control-alternative" placeholder="jesse@example.com" value="<?php echo $item['email']; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Address</label>
                          <input id="input-address" name="address" class="form-control form-control-alternative"  value="<?php echo $item['address']; ?>" type="text">
                        </div>
                      </div>
                     

                    </div>
                   
                  </div>

                  <div class="pl-lg-4">
                    <div class="row">

                      <div class="col-md-6">
                        <div class=" custom-file form-group">
                          <label class="form-control-label" for="input-address">Profile</label>
                          <input type="file" name="profile" id="input-last-name" class="custom-file-input form-control" placeholder="Last name" value="<?php echo $item['profile']; ?>">
                        <label class="custom-file-label form-control" style="margin-top:30px;" for="customFile" >Choose file</label>
                        </div>
                      </div>


                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-country">Phone</label>
                          <input type="text" name="phone" id="input-postal-code" class="form-control form-control-alternative"  value="<?php echo $item['phone']; ?>">
                        </div>
                      </div>

                    </div>
                   
                  </div>
                  </form>
               
              </div>
            </div>
          </div>
          
        </div>

<?php } } ?>

<?php
      if( isset($_POST["submit"]) ){

  // echo "Upload: " . $_FILES["thumbnail"]["name"] . "<br>";
  // echo "Type: " . $_FILES["thumbnail"]["type"] . "<br>";
  // echo "Size: " . ($_FILES["thumbnail"]["size"] / 1024) . " kB<br>";


        $email = $_POST["email"];
        $nickname = $_POST["nickname"];
      
        // Name that store image : thumbnail
        $file = "profile";
        $password = $_POST["password"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        if( $email=="" ||$password=="" ){
            echo $alert_error;
        }
        else{
          
          $status = $admin->update_admin_user($nickname,$email,$file, $password,$phone,$address,$id);
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
