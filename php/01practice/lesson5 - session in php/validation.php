<?php

session_start();

$server ='localhost';
$username = 'root';
$password = '';
$database ='instinct';
$table = 'tbl_user';
$row = ['id','name','sex','phone','password'];

$connect = mysqli_connect($server,$username,$password,$database) or die('connection fail');

$name=$_POST['name'];
$pass=$_POST['pass'];

// $sql = "select * from {$table} where name = '{$name}' and password = '{$pass}' ";

// echo $sql;

$sqlquery= "SELECT * FROM {$table} WHERE name= '{$name}' AND password= '{$pass}' ";


$data = $connect->query($sqlquery) or die('error using query');

// if($data->num_rows>0){
//
//   while($result = $data->fetch_assoc()){
//       echo "<h1> data : {$result['name']} ";
//   }
//
// }

$name=$name_err=$pass=$pass_err='';


     // ---------------validate------------
  if(isset( $_POST['submit'] ))
  {

    if($_POST['name']=='' || $_POST['pass']==''){

          if($_POST['name']=='')
          {
              $_GET['name_err']='Username is required';
          }
          if($_POST['pass']=='')
          {
            $_GET['pass_err']='Password is required';
          }
    }
      else{
            if($data->num_rows>0){
                  while($result = $data->fetch_assoc()){
                    $_SESSION['user']=array(
                      'name' => $result['name'],
                      'password' => $resut['pass']
                    );
                  }

                  header('Location: success.php');
            }
        else{
            header('Location: index.php?name_err='.  $_GET['name_err'] .'&pass_err='.  $_GET['pass_err']);
        }
      }


//           header('Location: index.php?name_err='.  $_GET['name_err'] .'&pass_err='.  $_GET['pass_err']);
//
//     }
//
// //true
//     else{
//
//         $_SESSION['user']=array(
//           'name' => $_POST['name'],
//           'password' => $_POST['pass']
//         );
//           // header('Location: success.php');



      //$_SESSION['user'];
        // $name=$_POST['name'];
        // $pass=$_POST['pass'];

    }
    // if($_POST['name']!='' || $_POST['pass']!='')
    // {
    //
    // }
    // else{
    //   echo '<h1>SUCCESS !!</h1>  <hr>';
    //
    //   echo $_POST['name'];
    // }



// }

// validate();

?>
</div>
