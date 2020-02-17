<?php
session_start();

 include 'header.php';

if(isset( $_SESSION['user'] ))
{
?>

  <h1>Your Data is</h1>
  <div class="well">

    <h2><?php echo $_SESSION['user']['name']; ?></h2>

  </div>


<?php
}
else{
  ?>
  <h1>Not Found</h1>
  <?php
}
