<?php

class Carrito extends CI_Model{


  function __construct()
  {
     parent::__construct();
  }


  public function insert(){
  }

public function create(){
}

public function insertar($data){

  $this->db->insert('carrito',$data);

}



public function actualizar($data,$Usuario,$string){

  $this->db->where('Usuario', $Usuario);
  $this->db->where('Producto', $string);
  $this->db->update('carrito', $data);

}

public function borrar($Usuario,$string){

  $this->db->where('Usuario', $Usuario);
  $this->db->where('Producto', $string);
  $this->db->delete('carrito');
}

public function borrarUsuarioProductos($Usuario){
  $this->db->where('Usuario', $Usuario);
  $this->db->delete('carrito');
}

public function precio($Usuario){
  $this->db->where('Usuario', $Usuario);
  $query = $this->db->get('carrito');
  $precio =0;
  foreach ($query->result() as $row) {
      if($row->Numero>1){
        $precio=$precio+($row->Numero)*$row->Precio/$row->Numero;


    }
  }
  return $precio;
}

public function numeroItems($Usuario){
  $this->db->where('Usuario', $Usuario);
  $query = $this->db->get('carrito');
  $numero =0;
  foreach ($query->result() as $row) {
      if($row->Numero>1){
        $numero=($row->Numero)+$numero;
      }

  }
  return $numero;
}

public function select()
{
   $query = $this->db->get('carrito');

   return $query;
}

public function selectComprados()
{
   $query = $this->db->get('registrocompras');

   return $query;
}

}
?>
