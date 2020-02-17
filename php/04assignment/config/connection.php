<?php


class Connection
{
    public $server = "localhost";
    public  $username = "root";
    public  $password = "";
    public $database = "instinct";
    public $connect;

  public function __construct()
  {
    $this->connect = mysqli_connect("{$this->server}","{$this->username}","{$this->password}","{$this->database}") or die('fail');
  }
  function getCategory($id){
      $sql = "SELECT category_value FROM tbl_category WHERE category_id = {$id}";
      $query = $this->connect->query($sql);
        return $query;
        // echo "<script>  console.log('{$a[0]}');    </script>";
  }
  function getList($id){
      $sql = "SELECT * FROM tbl_product WHERE category_id={$id}";
      $query = $this->connect->query($sql);
      return $query;
  }


}
?>
