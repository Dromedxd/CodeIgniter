<?php

class Usuario extends CI_Model{

  public $usuario_nombre;
  public $usuario_contraseña;
  public $usuario_email;

public  function __construct()
  {
     parent::__construct();
  }

  public function can_login($username, $password)
        {
             $this->db->where('Usuario', $username);
             $this->db->where('Contraseña', $password);
             $query = $this->db->get('usuarios');
             if(($query->num_rows() > 0))
             {
                  return true;
             }
             else
             {
                  return false;
             }
        }

public function insertar($data){

  $this->db->insert('usuarios',$data);

}

public function select(){
  $sql = "SELECT * FROM usuarios WHERE Usuario = ?";
  $string= $this->session->userdata('username');
  $query=$this->db->query($sql,$string);
  return $query;
}


}


?>
