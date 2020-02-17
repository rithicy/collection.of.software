<?php
      include 'layouts/header.php';
      include 'layouts/sidemenu.php';
?>
  <div class="main-content">
    <?php include 'layouts/top-menu.php'; ?>
    <!-- Header -->
    <div class="container-fluid mt--9">
      <?php
        $admin = new Admin;
      
      ?>

      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Products</h5>
                  <?php $product = $admin->get_products(); ?>
                  <span class="h2 font-weight-bold mb-0"><?php echo $product->num_rows; ?></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                    <i class="fas fa-clipboard"></i>
                  </div>
                </div>
              </div>
              <!-- <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
              </p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                    <?php $product = $admin->get_user();  ?>
                  <h5 class="card-title text-uppercase text-muted mb-0">Users</h5>
                  <span class="h2 font-weight-bold mb-0"><?php echo $product->num_rows; ?></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                  
                    <i class="fas fa-users"></i>
                  </div>
                </div>
              </div>
              <!-- <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                <span class="text-nowrap">Since last week</span>
              </p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Product Ordered</h5>
                    <?php $product = $admin->get_product_ordered();  ?>
                  <span class="h2 font-weight-bold mb-0"><?php echo $product->num_rows; ?></span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                  <i class="fas fa-chart-pie"></i>
                  </div>
                </div>
              </div>
              <!-- <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                <span class="text-nowrap">Since yesterday</span>
              </p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                    <?php $product = $admin->get_income();  ?>
                  <h5 class="card-title text-uppercase text-muted mb-0">Income</h5>
                  <span class="h2 font-weight-bold mb-0"><?php echo $product; ?>$</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                    <i class="fas fa-percent"></i>
                  </div>
                </div>
              </div>
              <!-- <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                <span class="text-nowrap">Since last month</span>
              </p> -->
            </div>
          </div>
        </div>
      </div>
      <!-- End card stats -->
<?php   $product = $admin->get_product_ordered(); ?>
      <div class="row mt-5">
        <div class="col-md-6 mb-5 mb-xl-0">
        <div class="card  shadow ">
             <div class="card-header border-0 bg-info ">
              <div class="row align-items-center">
               <div class="col-6">
                 <h3 class="mb-0 text-white">Ordered</h3>
               </div>
               <div class="col-3 text-right ml-auto">
                 <div class="input-group input-group-alternative">
                     <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fas fa-search"></i></span>
                   </div>
                     <input type="text" id="myInput" value="" class="form-control" placeholder="search....">
                   </div>
               </div>

             </div>
             </div>
             <div class="table-responsive">
               <table class="table align-items-center table-flush">
                 <thead class="thead-light">
                   <tr>
                     <th scope="col">User Ordered</th>
                     <th scope="col">Product Name</th>
                     <th scope="col">Date Ordered</th>
                     <th scope="col">Delivery duration</th>
                     <th scope="col">Delivered Date</th>
                     <th scope="col">User location</th>
                     <th scope="col"></th>
                   </tr>
                 </thead>

                 <tbody id="data">
                    <?php
                    if($product->num_rows>0){
                      while($each = $product->fetch_assoc()){

                      ?>

                   <tr>
                     <th scope="row">
                       <div class="media align-items-center">
                         <a href="#" class="avatar rounded-circle mr-3">
                           <img alt="Image placeholder" src="../assets/images/uploads/<?php echo $each['profile']; ?>">
                         </a>
                         <div class="media-body">
                           <span class="mb-0 text-sm"><?php echo $each['firstname'].', '.$each['lastname']; ?></span>
                         </div>
                       </div>
                     </th>

                     <td>
                       <span class="badge badge-dot mr-4">
                         <i class="bg-warning"></i> <?php echo $each['name']; ?>
                       </span>
                     </td>
                     <td>
                        <?php echo $each['ordered_date']; ?>
                     </td>
                     <td>
                       <div class="avatar-group">

                         <?php echo $each['delivery_duration']; ?>
                       <?php// } }  ?>
                       </div>
                     </td>
                     <td>
                      <?php echo $each['deliveried_date']; ?>
                     </td>
                     <td>
                      <?php echo $each['destination']; ?>
                     </td>
                     <td class="text-right">
                       <div class="dropdown">
                         <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-ellipsis-v"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="">Product Detail</a>
                           <a class="dropdown-item" href="product_edit.php?id=<?php echo $each['product_id']; ?>">Edit Product</a>
                           <form class="" method="post">
                             <input type="hidden" name="id" value="<?php echo $each['product_id']; ?>">
                             <input type="submit" class="dropdown-item" name="submit" value="Delete">

                           </form>
                         </div>
                       </div>
                     </td>
                   </tr>
                 <?php }}  ?>
                 </tbody>

               </table>
             </div>
             <!-- <div class="card-footer py-4">
               <nav aria-label="...">
                 <ul class="pagination justify-content-end mb-0">
                   <li class="page-item disabled">
                     <a class="page-link" href="#" tabindex="-1">
                       <i class="fas fa-angle-left"></i>
                       <span class="sr-only">Previous</span>
                     </a>
                   </li>
                   <li class="page-item active">
                     <a class="page-link" href="#">1</a>
                   </li>
                   <li class="page-item">
                     <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                   </li>
                   <li class="page-item"><a class="page-link" href="#">3</a></li>
                   <li class="page-item">
                     <a class="page-link" href="#">
                       <i class="fas fa-angle-right"></i>
                       <span class="sr-only">Next</span>
                     </a>
                   </li>
                 </ul>
               </nav>
             </div> -->
           </div>
        </div>
        <div class="col-md-6">
        <div class="card shadow">
             <div class="card-header border-0">
              <div class="row align-items-center">
               <div class="col-4">
                 <h3 class="mb-0">All Products</h3>
               </div>
               <div class="col-4 text-right">
                 <div class="input-group input-group-alternative">
                     <div class="input-group-prepend">
                     <span class="input-group-text"><i class="fas fa-search"></i></span>
                   </div>
                     <input type="text" id="myInput" value="" class="form-control" placeholder="search....">
                   </div>
               </div>
               <div class="col-4 text-right">
                 <a href="product_add.php" class="btn btn-success">New Product</a>
               </div>
             </div>
             </div>
             <div class="table-responsive">
               <table class="table align-items-center table-flush">
                 <thead class="thead-light">
                   <tr>
                     <th scope="col">Product Name</th>
                     <th scope="col">Code</th>
                     <th scope="col">Price</th>
                     <th scope="col">Color</th>
                     <th scope="col">description</th>
                     <th scope="col"></th>
                   </tr>
                 </thead>

                 <tbody id="data">
                    <?php 
                          $pro = $admin->get_products();
                    if($pro->num_rows>0){
                      while($each = $pro->fetch_assoc()){

                      ?>

                   <tr>
                     <th scope="row">
                       <div class="media align-items-center">
                         <a href="#" class="avatar rounded-circle mr-3">
                           <img alt="Image placeholder" src="../assets/images/uploads/<?php echo $each['thumbnail']; ?>">
                         </a>
                         <div class="media-body">
                           <span class="mb-0 text-sm"><?php echo substr($each['name'],0,30).'....'; ?></span>
                         </div>
                       </div>
                     </th>

                     <td>
                       <span class="badge badge-dot mr-4">
                         <i class="bg-warning"></i> <?php echo $each['code']; ?>
                       </span>
                     </td>
                     <td>
                       $ <?php echo $each['price']; ?> USD
                     </td>
                     <td>
                       <div class="avatar-group">
                        <?php $color = $admin->get_product_color($each['product_id']);
                        if($color->num_rows>0){
                          while($clr = $color->fetch_assoc()){
                        ?>
                         <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="<?php echo $clr['productimg_value']; ?>">
                           <img alt="Image placeholder" src="../assets/images/uploads/<?php echo $clr['productimg_url']; ?>" class="rounded-circle">
                         </a>
                       <?php } }  ?>
                       </div>
                     </td>
                     <td>
                      <?php echo substr($each['description'],0,15).'....'; ?>
                     </td>
                     <td class="text-right">
                       <div class="dropdown">
                         <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-ellipsis-v"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="">Product Detail</a>
                           <a class="dropdown-item" href="product_edit.php?id=<?php echo md5($each['product_id']); ?>">Edit Product</a>
                           <form class="" method="post">
                             <input type="hidden" name="id" value="<?php echo $each['product_id']; ?>">
                             <input type="submit" class="dropdown-item" name="submit" value="Delete">

                           </form>
                         </div>
                       </div>
                     </td>
                   </tr>
                 <?php }}  ?>
                 </tbody>

               </table>
             </div>
             <!-- <div class="card-footer py-4">
               <nav aria-label="...">
                 <ul class="pagination justify-content-end mb-0">
                   <li class="page-item disabled">
                     <a class="page-link" href="#" tabindex="-1">
                       <i class="fas fa-angle-left"></i>
                       <span class="sr-only">Previous</span>
                     </a>
                   </li>
                   <li class="page-item active">
                     <a class="page-link" href="#">1</a>
                   </li>
                   <li class="page-item">
                     <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                   </li>
                   <li class="page-item"><a class="page-link" href="#">3</a></li>
                   <li class="page-item">
                     <a class="page-link" href="#">
                       <i class="fas fa-angle-right"></i>
                       <span class="sr-only">Next</span>
                     </a>
                   </li>
                 </ul>
               </nav>
             </div> -->
           </div>
        </div>
      </div>




    <?php include './layouts/footer-credit.php'; ?>
    </div>
  </div>
    <?php include './layouts/footer.php'; ?>
