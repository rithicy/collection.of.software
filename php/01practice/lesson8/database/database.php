<?php

/**
 *
 */
class Product
{
    public $server = 'localhost';
    public $user = 'root';
    public $password = '';
    public $database = 'instinct';
    public $table = 'tbl_product';
    public $connect;

        function __construct()
        {
             $this->connect = mysqli_connect($this->server,$this->user,$this->password,$this->database) or die('error');
        }

  function index(){
        $sql = 'SELECT * FROM '.$this->table;
        $query = $this->connect->query($sql);
        return $query;
  }
  function find($id){
      $sql = "SELECT * FROM {$this->table} WHERE id = $id ";
      $result = $this->connect->query($sql);
      return $result;
  }
  function store($a,$b,$c){
        $sql = "INSERT INTO {$this->table} (name,photo,price) VALUE ( '{$a}','{$b}',{$c} )";
        $this->connect->query($sql);
  }
    function delete($id){
        $sql = "DELETE FROM {$this->table} WHERE id = {$id}";
        $this->connect->query($sql);
    }
    function update($id,$name,$photo,$price){
      $sql = "UPDATE {$table} SET 'name' = {$name}, 'photo' = {$photo}, 'price' = {$price}, WHERE id = {$id}";
      if($this->connect->query($sql)){
        return true;
      }
      else{
        return false;
      }
    }
// UPDATE `tbl_product` SET `name` = 'dddd' WHERE `tbl_product`.`id` = 14;


        function uploadImage($destination){
              move_uploaded_file($_FILES['photo']['tmp_name'],$destination.$_FILES['photo']['name']);
              return $_FILES['photo']['name'];
      }
}





 ?>
