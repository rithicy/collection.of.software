<?php
      include './layouts/header.php';
      include './layouts/sidemenu.php';

      $admin = new Admin;

      $product = $admin->get_ads();
?>
  <div class="main-content">
    <?php include './layouts/top-menu.php'; ?>
    <!-- Header -->
<div class="container-fluid mt--9">



  <div class="row">
         <div class="col">
           <div class="card shadow">
             <div class="card-header border-0">
              <div class="row align-items-center">
               <div class="col-4">
                 <h3 class="mb-0">Ads Management</h3>
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
                 <a href="ads_add.php" class="btn btn-success">New Ads</a>
               </div>
             </div>
             </div>
             <div class="table-responsive">
               <table class="table align-items-center table-flush">
                 <thead class="thead-light">
                   <tr>
                     <th scope="col">Product Name</th>
                     <th scope="col">Detail</th>
                     <th scope="col">Date</th>
                     <th></th>

                   </tr>
                 </thead>

                 <tbody id="data">
                    <?php if($product->num_rows>0){
                      while($each = $product->fetch_assoc()){

                      ?>

                   <tr>
                     <th scope="row">
                       <div class="media align-items-center">
                         <a href="#" class="avatar rounded-circle mr-3">
                           <img alt="Image placeholder" src="../assets/images/uploads/<?php echo $each['img_source']; ?>">
                         </a>
                         <div class="media-body">
                           <span class="mb-0 text-sm"><?php echo $each['title']; ?></span>
                         </div>
                       </div>
                     </th>

                     <td>
                      <?php echo $each['detail']; ?>
                     </td>
                     <td>  <?php echo $each['created_at']; ?></td>
                     <td class="text-right">
                       <div class="dropdown">
                         <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-ellipsis-v"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                           <!-- <a class="dropdown-item" href="ads_edit.php?id=<?php// echo $each['id']; ?>">Edit Ads</a> -->
                           <form class="" method="post">
                             <input type="hidden" name="id" value="<?php echo $each['id']; ?>">
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
           if( isset($_POST["submit"]) ){
             $id = $_POST["id"];
             $admin->delete_ads($id);
             echo $alert_success;
           }
        ?>

<?php include './layouts/footer-credit.php'; ?>
</div>
</div>
<?php include './layouts/footer.php'; ?>
