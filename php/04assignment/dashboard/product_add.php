<?php
      include './layouts/header.php';
      include './layouts/sidemenu.php';

      $admin = new Admin;
      $img = 1;
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
                  <h3 class="mb-0">Create New Product</h3>
                </div>
                <div class="col-4 text-right">
                  <input type="submit" name="submit" value="Create" class="btn btn-primary">
                </div>
              </div>
            </div>
            <div class="card-body">

                <h6 class="heading-small text-muted mb-4">Product information</h6>

                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Product Name <span class="text-red">(Required)</span> </label>
                        <input name="name" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Product Name">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Product Code  <span class="text-red">(Required)</span> </label>
                        <input type="text" name="code" id="input-email" class="form-control form-control-alternative" placeholder="Product Code">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Price  <span class="text-red">(Required)</span> </label>
                        <input type="text" name="price" id="input-first-name" class="form-control form-control-alternative" placeholder="Price" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <!-- <div class="col-lg-3">
                      <div class="custom-file form-group">
                        <label class="form-control-label" for="input-first-name">Image </label>
                        <input type="file" name="thumbnail" id="input-last-name" class="custom-file-input form-control" placeholder="Last name">
                        <label class="custom-file-label" style="" for="customFile">Choose file</label>
                        <label class="form-control-label" for="input-first-name">Image </label>
                        <input type="file" name="thumbnail" id="input-last-name" class="custom-file-input form-control" placeholder="Last name">
                        <label class="custom-file-label" style="margin-top:30px;" for="customFile">Choose file</label>
                        <label class="form-control-label" for="input-first-name">Image </label>
                        <input type="file" name="thumbnail" id="input-last-name" class="custom-file-input form-control" placeholder="Last name">
                        <label class="custom-file-label" style="margin-top:30px;" for="customFile">Choose file</label>
                        <label class="form-control-label" for="input-first-name">Image </label>
                        <input type="file" name="thumbnail" id="input-last-name" class="custom-file-input form-control" placeholder="Last name">
                        <label class="custom-file-label" style="margin-top:30px;" for="customFile">Choose file</label>
                      </div>
                    </div> -->
                    <div class="col-lg-3">
                      <div class="custom-file form-group">
                        <label class="form-control-label" for="input-last-name">Thumbnail  <span class="text-red">(Required)</span> </label>

                        <input type="file" name="thumbnail" id="input-last-name" class="custom-file-input form-control" placeholder="Last name">
                        <label class="custom-file-label" style="margin-top:30px;" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Category  <span class="text-red">(Required)</span> </label>
                        <select id="" name="category" class="form-control form-control-alternative">
                          <?php $category = $admin->get_product_category();
                          if($category->num_rows>0){
                            while($each = $category->fetch_assoc()){
                          ?>
                          <option value="<?php echo $each['category_id']; ?>"><?php echo $each['category_value']; ?></option>
                             <?php  } } ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Type <span class="text-red">(Required)</span> </label>
                        <select id="" name="type" class="form-control form-control-alternative" value="new">

                          <option value="new">New</option>
                          <option value="instock">Instock</option>
                          <option value="popular">Popular</option>

                        </select>
                      </div>
                    </div>

                    <div class="col-lg-2">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Sub-Category   <span class="text-red">(Required)</span> </label>
                        <select name="subcategory"  class="form-control form-control-alternative">
                          <?php $subcategory = $admin->get_product_subcategory();
                          if($subcategory->num_rows>0){
                            while($each = $subcategory->fetch_assoc()){
                          ?>
                          <option value="<?php echo $each['subcategory_id']; ?>"><?php echo $each['category_value']; ?></option>
                              <?php  } } ?>
                        </select>
                      </div>
                    </div>
                    <script type="text/javascript">
                    function appendImg() {

                        var txt1 = `

                          <input type="file" name="img[${i}]" id="input-last-name" class="custom-file-input form-control" placeholder="Last name">
                          <label class="custom-file-label" style="margin-top:30px;" for="customFile">Choose file</label>
                          <input type="text" name="color[${i}]" >
                      `;               // Create element with HTML
                        // var txt1="ddddddddddddddddddd";
                        $("#prodimg").append(txt1);
                        i++;   // Append the new elements
                    }
                    </script>
                    <!-- <div class="col-md-4" id="prodimg">
                      <div class="custom-file form-group col-md-6">
                        <label class="form-control-label" for="input-last-name">Thumbnail  <span class="text-red">(Required)</span> </label>
                        <script type="text/javascript">
                          var i = 2;
                        </script>
                        <input type="file" name="img1" id="input-last-name" class="custom-file-input form-control" placeholder="Last name">
                        <label class="custom-file-label" style="margin-top:30px;" for="customFile">Choose file</label>

                      </div>
                        <div class=" form-group col-md-6">
                        <input type="text" name="color[${i}]" class="col-md-6">
                      </div>
                    </div> -->
                    <!-- <div class="col-md-1">
                      <label for="">Add</label>
                      <button type="button" name="button" onclick="appendImg()" class="btn btn-default">+</button>
                    </div> -->

                  </div>


                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Description</label>
                        <textarea name="description" id="input-address"  class="form-control form-control-alternative" rows="8" cols="10"  placeholder="Home Address"></textarea>
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


        $name = $_POST["name"];
        $code = $_POST["code"];
        $pri = $_POST["price"];
        // Name that store image : thumbnail
        $file = "thumbnail";
        $desc = $_POST["description"];
        $typ = $_POST["type"];
        $cate = $_POST["category"];
        $sub = $_POST["subcategory"];
        if($name=="" || $code=="" ||$pri=="" ||$desc=="" ||$cate=="" ||$sub=="" || $type=""){
            echo $alert_error;
        }
        else{
          $status = $admin->add_product($name,$code,$pri,$file,$desc,$cate,$sub,$typ);
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
