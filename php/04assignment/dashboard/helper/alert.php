<?php
  $current_url =  'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

$alert_success = "<script>
      Swal.fire({
        type: 'success',
        title: 'Good Job!',
        text: 'Successful!'
      }).then((result) => {
      if (result.value) {
        window.location.href = '{$current_url}';
      }
      })
    </script>
    ";
$alert_error = "<script>
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Please fill in Required field!'
      })
    </script>
    ";
    $alert_error_img = "<script>
          Swal.fire({
            type: 'error',
            title: 'Wrong...',
            text: 'Please check your image size again!'
          })
        </script>
        ";
    $login_error = "<script>
          Swal.fire({
            type: 'error',
            title: 'can not login...',
            text: 'Please check your username and password again!'
          })
        </script>
        ";
        $login_success = "<script>
              Swal.fire({
                type: 'success',
                title: 'Success !',
                text: 'Log in successful!'
              }).then((result) => {
              if (result.value) {
                window.location.href = 'index.php' ;
              }
              })
            </script>
            ";
$alert_yesno = "
      <script>
      Swal.fire({
      title: 'Are you sure?',
      text: 'You can not undo this!'',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
      if (result.value) {
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
        window.location.href = '{$current_url}';
      }
      })
        </script>
        ";

 ?>
