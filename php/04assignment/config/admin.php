<?php


class Admin
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
  function login($email,$password){
    $pass = md5($password);
    $sql = "SELECT * FROM tbl_admin WHERE email ='{$email}' AND password = '{$pass}' ";
    $query = $this->connect->query($sql);
    return $query;
  }
  function check(){
    if(!isset($_SESSION['user_id'])){
      echo "<script type='text/javascript'>
          window.location.href = '{$current_url}' + 'login.php';
            </script>";
    }
  }
  function get_session(){
    if(isset($_SESSION['user_id']))
    {
      return $_SESSION['user_id'];
    }
    return false;
  }

  // image-------------------------------------------
  function image_validation($file){
    $ext = pathinfo($_FILES["{$file}"]["name"], PATHINFO_EXTENSION);
      if($_FILES["{$file}"]["size"] > (1024 * 1024 * 8) || ($ext != 'gif' && $ext != 'png' && $ext != 'jpg') )
      {
        return false;
      }
        return true;
  }
  function upload_image($file){
      move_uploaded_file($_FILES["{$file}"]["tmp_name"], "../assets/images/uploads/".$_FILES["{$file}"]["name"]);
      return $_FILES["{$file}"]["name"];
  }
  // Product------------------------------------------
  function get_products(){
      $sql = "SELECT * FROM tbl_product";
      $query = $this->connect->query($sql);
      return $query;
  }
  function get_ads(){
      $sql = "SELECT * FROM tbl_advertise";
      $query = $this->connect->query($sql);
      return $query;
  }
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
  function find_products($id){
  $sql = "SELECT * FROM tbl_product WHERE product_id = {$id}";
    $query = $this->connect->query($sql);
    return $query;
}
function find_ads($id){
$sql = "SELECT * FROM tbl_advertise WHERE id = {$id}";
  $query = $this->connect->query($sql);
  return $query;
}
  function add_product($name,$code,$price,$file,$description,$categoryid,$subcategoryid,$type){
  echo '<script> alert(" '.$type.' "); </script> ';
    if($this->image_validation($file)){

      $image_name = $this->upload_image($file);
      $sql = "INSERT INTO tbl_product (name,code,price,thumbnail,description,category_id,subcategory_id,type) VALUES ('{$name}','{$code}','{$price}','{$image_name}','{$description}','{$categoryid}','{$subcategoryid}','{$type}')";
      $query = $this->connect->query($sql);

      return true;
    }
    return false;
  }
  function add_ads($name,$image,$detail){

    if($this->image_validation($image)){

      $image_name = $this->upload_image($image);
      $sql = "INSERT INTO tbl_advertise (title,img_source,detail) VALUES ('{$name}','{$image_name}','{$detail}')";
      $query = $this->connect->query($sql);

      return true;
    }
    return false;
  }
  function update_product($name,$code,$price,$file,$description,$categoryid,$subcategoryid,$id){
    if($this->image_validation($file)){
      $image_name = $this->upload_image($file);
    $sql = "UPDATE tbl_product SET name='{$name}',code='{$code}',price={$price},thumbnail='{$image_name}',description='{$description}',category_id={$categoryid},subcategory_id={$subcategoryid} WHERE product_id = {$id} ";
      $query = $this->connect->query($sql);
      return true;
    }
    return false;
  }
  function delete_product($id){
      $sql = "DELETE FROM tbl_product WHERE product_id = {$id}";
      $query = $this->connect->query($sql);
      return $query;
  }
  function delete_ads($id){
      $sql = "DELETE FROM tbl_advertise WHERE id = {$id}";
      $query = $this->connect->query($sql);
      return $query;
  }
    // Product Color --------------------------------

  function get_product_color($id){
    $sql = "SELECT productimg_url, productimg_value from tbl_product_image WHERE product_id = {$id}";
    $query = $this->connect->query($sql);
    return $query;
  }

      // Product Category --------------------------------

  function get_product_category(){
    $sql = "SELECT * from tbl_category";
    $query = $this->connect->query($sql);
    return $query;
  }
  function view_product_category($id){
    $sql = "SELECT * from tbl_category WHERE category_id = {$id}";
    $query = $this->connect->query($sql);
    return $query;
  }
  function add_product_category($name){
    $sql = "INSERT INTO tbl_category (category_value) VALUES ('{$name}')";
    $query = $this->connect->query($sql);
    return $query;
  }
  function remove_product_category($id){
    $sql = "DELETE FROM tbl_category WHERE category_id = {$id}";
    $query = $this->connect->query($sql);
    return $query;
  }
            // Product SubCategory --------------------------------

  function get_product_subcategory(){
    $sql = "SELECT * from tbl_subcategory";
    $query = $this->connect->query($sql);
    return $query;
  }
  function remove_product_subcategory($id){
    $sql = "DELETE FROM tbl_subcategory WHERE subcategory_id = {$id}";
    $query = $this->connect->query($sql);
    return $query;
  }
  function add_product_subcategory($name,$cat){
    $sql = "INSERT INTO tbl_subcategory (category_id,category_value) VALUES ('{$cat}','{$name}')";
    $query = $this->connect->query($sql);
    // return $query;
  }
  //  Product ORDERED --------------------------------
  function get_income(){
    $sql = "SELECT tbl_product.price from tbl_order
    INNER JOIN tbl_product
    ON tbl_order.product_id = tbl_product.product_id
    ";
    $query = $this->connect->query($sql);
    $result = 0;
    if($query->num_rows>0){

      while($a = $query->fetch_assoc())
      {
          $result+= $a['price'];
      }
    }
    return $result;
  }
  function get_product_ordered(){
    $sql = "SELECT
    tbl_order.shipping_id,
    tbl_user.profile,
    tbl_user.firstname,
    tbl_user.lastname,
    tbl_product.name,
    tbl_order.ordered_date,
    tbl_order.delivery_duration,
    tbl_order.deliveried_date,
    tbl_order.destination

     from tbl_order
    LEFT JOIN tbl_product
    ON tbl_order.product_id = tbl_product.product_id
    INNER JOIN tbl_user
    ON tbl_order.user_id = tbl_user.user_id
    ";
    $query = $this->connect->query($sql);
    return $query;
  }
//  --------------------------------
  function getList($id){
      $sql = "SELECT * FROM tbl_product WHERE category_id={$id}";
      $query = $this->connect->query($sql);
      return $query;
  }
  // User -----------------------------------
  function get_user(){
    $sql = "SELECT * from tbl_user";
    $query = $this->connect->query($sql);
    return $query;
  }
  function add_admin_user($first,$last,$nick,$birth,$email,$file,$pass,$phone,$addr){
    if($this->image_validation($file)){
      $image = $this->upload_image($file);
      $passw = md5($pass);
      $sql = "INSERT INTO tbl_admin (firstname,lastname,nickname,birthdate,email,profile,password,phone,address) VALUES ('{$first}','{$last}','{$nick}','{$birth}','{$email}','{$image}','{$passw}','{$phone}','{$addr}')";
      $query = $this->connect->query($sql);
      return true;
    }

    return false;
  }
  function update_admin_user($nick,$email,$file,$pass,$phone,$addr,$id){
    $passw = md5($pass);
    if(isset(  $_FILES["{$file}"]) )
    {
      $sql = "UPDATE tbl_admin SET nickname='{$nick} ',email='{$email}' ,password='{$passw}',phone='{$phone}',address='{$addr}'   WHERE user_id = {$id}";

    }
    else{
      $image = $this->upload_image($file);
      $sql = "UPDATE tbl_admin SET nickname='{$nick} ',email='{$email} ',image='{$image} ',password='{$passw}',phone='{$phone}',address='{$addr}'   WHERE user_id = {$id}";

    }


      // $sql = "INSERT INTO tbl_admin (firstname,lastname,nickname,birthdate,email,profile,password,phone,address) VALUES ('{$first}','{$last}','{$nick}','{$birth}','{$email}','{$image}','{$passw}','{$phone}','{$addr}')";
      $query = $this->connect->query($sql);
      return true;



  }
  // Admin -----------------------------------
  function get_admin(){
  $sql = "SELECT * from tbl_admin";
    $query = $this->connect->query($sql);
    return $query;
  }
  function get_recent_user($id){
    $sql = "SELECT * from tbl_admin WHERE user_id = {$id}";
    $query = $this->connect->query($sql);
    return $query;
  }


}

?>
