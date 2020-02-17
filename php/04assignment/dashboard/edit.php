<?php
      include 'layouts/header.php';
      include 'layouts/sidemenu.php';
?>
  <div class="main-content">
    <?php include 'layouts/top-menu.php';
    $admin = new Admin; ?>
    <!-- Header -->
<div class="container-fluid mt--9">

  <div class="row">
         <div class="col">
           <div class="card shadow">
             <div class="card-header border-0">
               <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Users</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">New User</a>
                </div>
              </div>
             </div>
             <div class="table-responsive">
               <table class="table align-items-center table-flush">
                 <thead class="thead-light">
                   <tr>
                     <th scope="col">Userame</th>
                     <th scope="col">Email</th>
                     <th scope="col">Phone</th>
                     <th scope="col">Address</th>
                     <th scope="col">Birthdate</th>
                     <th scope="col"></th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php $data = $admin->get_user();
                      if($data->num_rows>0){
                        while($each = $data->fetch_assoc()){
                    ?>
                   <tr>
                     <th scope="row">
                       <div class="media align-items-center">
                         <a href="#" class="avatar rounded-circle mr-3">
                           <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                         </a>
                         <div class="media-body">
                           <span class="mb-0 text-sm"><?php echo $each['lastname'].' , '.$each['firstname']; ?></span>
                         </div>
                       </div>
                     </th>
                     <td>
                      <?php echo $each['email']; ?>
                     </td>
                     <td>
                       <span class="badge badge-dot mr-4">
                         <i class="bg-warning"></i><?php echo $each['phone']; ?>
                       </span>
                     </td>
                     <td>
                       <span class="badge badge-dot mr-4">
                        <?php echo $each['address']; ?>
                       </span>
                     </td>
                     <td>
                       <span class="badge badge-dot mr-4">
                        <?php echo $each['birthdate']; ?>
                       </span>
                     </td>
                     <td class="text-right">
                       <div class="dropdown">
                         <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fas fa-ellipsis-v"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                           <a class="dropdown-item" href="#">Action</a>
                           <a class="dropdown-item" href="#">Another action</a>
                           <a class="dropdown-item" href="#">Something else here</a>
                         </div>
                       </div>
                     </td>
                   </tr>
                 <?php }}   ?>
                 </tbody>
               </table>
             </div>
             <div class="card-footer py-4">
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
             </div>
           </div>
         </div>
       </div>

<?php include './layouts/footer-credit.php'; ?>
</div>
</div>
<?php include './layouts/footer.php'; ?>
