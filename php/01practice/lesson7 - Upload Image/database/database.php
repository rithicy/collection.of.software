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
  function store($a,$b,$c){
        $sql = "INSERT INTO {$this->table} (name,photo,price) VALUE ( '{$a}','{$b}',{$c} )";
        $this->connect->query($sql);
  }

        function uploadImage($destination){
              move_uploaded_file($_FILES['photo']['tmp_name'],$destination.$_FILES['photo']['name']);
              return $_FILES['photo']['name'];
      }
}





 ?>
