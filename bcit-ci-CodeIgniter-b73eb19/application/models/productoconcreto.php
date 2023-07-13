<?php

class Productoconcreto extends CI_Model{


  public $productoconreto_id;
  public $productoconreto_name;

  function __construct()
  {
     parent::__construct();
  }


  public function insert(){


  }

public function create(){

}

public function select($string)
{

  $sql = "SELECT * FROM productoconcreto WHERE Producto = ?";
  $query=$this->db->query($sql,$string);

   return $query;
}

}
?>
