<?php

class FormSuccess extends CI_Controller {

        public function index()
        {
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->model('Carrito');
            $this->load->database();


            if(isset($_SESSION['username'])){
          		$Usuario=$this->session->userdata('username');
          	}else{
          		$Usuario="NoUsuario";
          	}

            $this->db->where('Usuario', $Usuario);
            $query = $this->db->get('carrito');

            foreach ($query->result() as $row) {
              $this->db->insert('registrocompras',$row);
              }

              $this->Carrito->borrarUsuarioProductos($Usuario);
            $data["PeticionActual"] = $this->input->post('cartID');
            $this->load->view('sucess', $data);
        }

}

?>
