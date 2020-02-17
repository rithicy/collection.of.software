<?php

  $current_url =  'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $to_current_url = "<script type='text/javascript'>
      window.location.href = '{$current_url}';
        </script>";
        $to_login = "<script type='text/javascript'>
            window.location.href = '{$current_url}' + 'login.php';
              </script>";


 ?>
