<?php

class Publication extends CI_Model{


  public $publication_id;
  public $publication_name;

  function __construct()
  {
     parent::__construct();
  }


  public function insert(){
    $this->db->insert('publications',$this);
    $this->publication_id=$thos->db->insert_id();
  }

public function create(){
  $this->load->model('Publication');
  $this->Publication->publication_name='test';
  $this->Publication->insert();
}

public function select()
{
   $query = $this->db->get('productos');

   return $query;
}
}
?>
