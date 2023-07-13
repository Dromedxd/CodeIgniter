<?php

class Form extends CI_Controller {

        public function index()
        {
                $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');
                $this->load->library('session');
                $this->load->model('Carrito');

                $this->form_validation->set_rules('direccion', 'Direccion', 'required'); // htmlspecialchars
                $this->form_validation->set_rules('codigopostal', 'Codigo Postal', 'trim|required|numeric|exact_length[5]');
                $this->form_validation->set_rules('ciudad', 'Ciudad', 'trim|required');
                $this->form_validation->set_rules('telefono', 'Telefono', 'trim|required');
                if(isset($_SESSION['username'])){
                  $data1['Usuario']=$this->session->userdata('username');
              		$Usuario=$this->session->userdata('username');
                  $data["nombre"]=$this->session->userdata('username');
            		}else{
                  $data1['Usuario']="NoUsuario";
              		$Usuario="NoUsuario";
                  $data["nombre"]=$Usuario;
            		}
                $precio=$this->Carrito->precio($Usuario);
                $numeroItm=$this->Carrito->numeroItems($Usuario);
                if ($this->form_validation->run() == FALSE)
                {
                        // FALTAN CAMPOS QUE ARREGLAR
                        $this->load->view('myform');
                }
                else
                {
                        // CARGAR INFORMACION DEL PRODUCTO
                        // Esto puede acerse cargando de la base de datos, o recuperando informacion
                        // del formulario en caso de tener campos hidden en el POST

                        // GUARDAR LA INFORMACION DEL PRODUCTO Y OTROS EN EL CAMPO $data
                        // Las de este formulario no son necesarias ya que son accesibles usando set_value
                        $data["PeticionActual"] = bin2hex(random_bytes(16));
                        $data["precio"]=$precio;
                        $data["cantidad"]=$numeroItm;



                        // LLAMAR A UN FORMULARIO QUE AUTOENVIA UN POST A LA PAGINA DE UMAPAL
                        $this->load->view('callumapal', $data);
                }
        }
}

?>
