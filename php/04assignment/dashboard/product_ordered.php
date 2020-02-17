<?php
      include './layouts/header.php';
      include './layouts/sidemenu.php';

      $admin = new Admin;

      $product = $admin->get_product_ordered();
?>
  <div class="main-content">
    <?php include './layouts/top-menu.php'; ?>
    <!-- Header -->
<div class="container-fluid mt--9">



  <div class="row">
         <div class="col">
           <div class="card  shadow ">
             <div class="card-header border-0 bg-info ">
              <div class="row align-items-center">
               <div class="col-6">
                 <h3 class="mb-0 text-white">All Products</h3>
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
       </div>
       <?php
           // if( isset($_POST["submit"]) ){
           //   $id = $_POST["id"];
           //   $admin->delete_product($id);
           //   echo $alert_success;
           // }
        ?>

<?php include './layouts/footer-credit.php'; ?>
</div>
</div>
<?php include './layouts/footer.php'; ?>
