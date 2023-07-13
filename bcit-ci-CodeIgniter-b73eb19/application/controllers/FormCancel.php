<?php

class FormCancel extends CI_Controller {

        public function index()
        {
            $this->load->helper('url');
            $this->load->library('session');
            
            $data["PeticionActual"] = $this->input->post('cartID');
            $this->load->view('cancel', $data);
        }
        
}

?>