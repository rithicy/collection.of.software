
<?php
include 'connection.php';

class Page
{
  public $server = "localhost";
    public  $username = "root";
    public  $password = "";
    public $database = "php_ecommerce";
    public $connect;
    public function __construct()
    {

      $this->connect = mysqli_connect("{$this->server}","{$this->username}","{$this->password}","{$this->database}") or die('fail');
    }
  // function test(){
  //   return $username;
  // }
  function product_id_encode($encode){
    $sql = "SELECT product_id FROM tbl_product";
    $query = $this->connect->query($sql);
    while($each = $query->fetch_assoc())
    {
        if(md5($each['product_id']) == $encode)
        {
          return $each['product_id'];
        }
    }
  }
  function get_ads(){
      $sql = "SELECT * FROM tbl_advertise";
      $query = $this->connect->query($sql);
      return $query;
  }
  function get_product_category($id){
    $sql = "SELECT * from tbl_category WHERE category_id = {$id}";
    $query = $this->connect->query($sql);
    return $query;
  }
  // sub page
  function get_product_subcategory($id){
    $sql = "SELECT * from tbl_subcategory WHERE category_id = {$id}";
    $query = $this->connect->query($sql);
    return $query;
  }
  function display_product($id){
    $sql = "SELECT * from tbl_product WHERE subcategory_id = {$id}";
    $query = $this->connect->query($sql);
    return $query;
  }
  function archive_product($category,$sub){
    $sql = "SELECT * from tbl_product WHERE subcategory_id = {$sub} AND category_id = {$category}";
    $query = $this->connect->query($sql);
    return $query;
  }
  function single_product($id){
    $sql = "SELECT * from tbl_product WHERE product_id = {$id}";
    $query = $this->connect->query($sql);
    return $query;
  }

  function get_products(){
    $sql = "SELECT * FROM tbl_product";
    $query = $this->connect->query($sql);
    return $query;
  }
  //home page
  function show_type_products($type){
    $sql = "SELECT * FROM tbl_product WHERE type = '{$type}' ";
    $query = $this->connect->query($sql);
    return $query;
  }
  //archive_product
  function get_archive_header($name,$type){
    $sql = "SELECT tbl_category.category_value as main,
                    tbl_subcategory.category_value as sub
                    FROM tbl_category
                    INNER JOIN tbl_subcategory ON
                    tbl_category.category_id = tbl_subcategory.category_id
                    WHERE tbl_category.category_id = {$name}
                    AND tbl_subcategory.subcategory_id = {$type}
                    ";
    $query = $this->connect->query($sql);
    return $query;
  }

}
 ?>
