<?php
      include './layouts/header.php';
      include './layouts/sidemenu.php';
?>
  <div class="main-content">
    <?php include './layouts/top-menu.php';
          $admin = new Admin;

    ?>
    <!-- Header -->
<div class="container-fluid mt--9">

  <div class="row">
         <div class="col-md-4">
           <div class="card shadow">
             <div class="card-header border-0">
               <h3 class="mb-0">Product Category</h3>
             </div>
             <div class="table-responsive">
               <table class="table align-items-center table-flush">
                 <thead class="thead-light">
                   <tr>

                     <th scope="col">Category Name</th>
                     <th scope="col"></th>

                   </tr>
                 </thead>
                 <tbody>
                   <?php $category = $admin->get_product_category();
                   if($category->num_rows>0){
                     while($each = $category->fetch_assoc()){
                   ?>
                   <tr>
                     <th scope="row">
                       <div class="media align-items-center">
                         <div class="media-body">
                           <span class="mb-0 text-sm"><?php echo $each['category_value']; ?></span>
                         </div>
                       </div>
                     </th>

                     <td class="text-right">
                       <div class="dropdown">
                         <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-ellipsis-v"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <form class="" method="post">
                            <input type="hidden" name="category_id" value="<?php echo  $each['category_id']; ?>">
                            <input class="dropdown-item" type="submit" name="delete_category" value="Delete">
                          </form>


                         </div>
                       </div>
                     </td>
                   </tr>
                 <?php  } } ?>
                 </tbody>
               </table>
             </div>
             <div class="card-footer py-4">

             </div>
           </div>

         </div>


         <div class="col-xl-8 order-xl-1">
        <div class="card bg-info shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">New Category</h3>
              </div>

            </div>
          </div>
          <div class="card-body">
            <form method="POST">

                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label  text-white" for="input-username" >Category Name <span>(Required)</span> </label>
                      <input type="text" name="category_name" id="category_name" class="form-control form-control-alternative" placeholder="name">
                    </div>
                  </div>
                </div>

                  <div class="row ">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <input type="submit" name="category_form" class="btn btn-success" value="Create">
                      </div>
                    </div>
                  </div>

            </form>
          </div>
        </div>
      </div>
       </div>


       <div class="row mt-6">
         <div class="col-xl-8 ">
          <div class="card bg-warning shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">New Sub Category</h3>
                </div>

              </div>
            </div>
            <div class="card-body">
              <form method="POST">

                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label  text-white" for="input-username" >Sub-Category Name <span>(Required)</span></label>
                        <input type="text" name="add_subcategory_name" id="input-username" class="form-control form-control-alternative" placeholder="name">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label  text-white" for="input-username" >Choose Category</label>
                        <select class="form-control form-control-alternative" name="add_category_id">
                          <?php $category = $admin->get_product_category();
                          if($category->num_rows>0){
                            while($each = $category->fetch_assoc()){
                          ?>
                          <option value="<?php echo $each['category_id']; ?>"><?php echo $each['category_value']; ?></option>
                        <?php } } ?>
                        </select>

                      </div>
                    </div>
                  </div>

                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input type="submit" name="subcategory_form" value="Create" class="btn btn-success">
                        </div>
                      </div>
                    </div>

              </form>
            </div>
          </div>
        </div>
              <div class="col-md-4 mt--9">
                <div class="card shadow">
                  <div class="card-header border-0">
                    <h3 class="mb-0">Product Sub-Category</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>

                          <th scope="col">Sub-Category Name</th>
                          <th scope="col">Category</th>
                            <th scope="col"></th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php $subcategory = $admin->get_product_subcategory();
                        if($subcategory->num_rows>0){
                          while($each = $subcategory->fetch_assoc()){
                        ?>
                        <tr>
                          <th scope="row">
                            <div class="media align-items-center">
                              <div class="media-body">
                                <span class="mb-0 text-sm"><?php echo $each['category_value']; ?></span>
                              </div>
                            </div>
                          </th>

                          <th scope="row">
                            <div class="media align-items-center">
                              <div class="media-body">
                                <?php $category = $admin->view_product_category($each['category_id']);
                                if($category->num_rows==1){
                                  while($one = $category->fetch_assoc()){
                                ?>
                                <span class="mb-0 text-sm">  <?php echo $one['category_value']; ?></span>
                                <?php  } } ?>
                              </div>
                            </div>
                          </th>

                          <td class="text-right">
                            <div class="dropdown">
                              <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <form class="" method="post">
                                  <input type="hidden" name="subcategory_id" value="<?php echo  $each['subcategory_id']; ?>">
                                  <input class="dropdown-item" type="submit" name="delete_subcategory" value="Delete">
                                </form>

                              </div>
                            </div>
                          </td>
                        </tr>
                        <?php  } } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer py-4">

                  </div>
                </div>

              </div>



            </div>

<?php
    if(isset($_POST['category_form']) ){
      if($_POST["category_name"]=="")
      {
        echo $alert_error;
      }
      else{
        $admin->add_product_category($_POST["category_name"]);
        echo $alert_success;
      }
    }
    // -----------------
    if(isset($_POST['subcategory_form']) ){
      if($_POST["add_category_id"]=="" || $_POST["add_subcategory_name"]=="")
      {
        echo $alert_error;
      }
      else{
        $cat = $_POST["add_category_id"];
          $name = $_POST["add_subcategory_name"];
          // echo $cat.'-------------'.$sub;
        $admin->add_product_subcategory($name,$cat);
        echo $alert_success;
      }
    }
    // -----------------
    if(isset($_POST['delete_category']) ){
      $admin->remove_product_category($_POST["category_id"]);
      echo $alert_success;
    }
    if(isset($_POST['delete_subcategory']) ){
      $admin->remove_product_subcategory($_POST["subcategory_id"]);
      echo $alert_success;
    }

?>


<?php include './layouts/footer-credit.php'; ?>
</div>
</div>
<?php include './layouts/footer.php'; ?>
