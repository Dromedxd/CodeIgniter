<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){

		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('Publication','');
		$data['h']=$this->Publication->select();

		$this->load->view('TiendaOnline.php',$data);//Pagina de Inicio



}

public function CargarLista(){
	$this->load->helper('url');
	$this->load->helper('html');
	$this->load->library('form_validation');
	$this->load->helper('form');
	$this->load->database();
	$this->load->model('Publication','');
	$data['h']=$this->Publication->select();

	$this->load->view('InicioListaConcreta.php',$data);//Pagina de Inicio

}

public function informacion(){
	$this->load->helper('url');
	$this->load->library('form_validation');
	$this->load->view('informacion.php');
}

public function contacto(){
	$this->load->helper('url');
	$this->load->library('form_validation');
	$this->load->view('contacto.php');
}

public function registro(){

	$this->load->model('Publication','');
	$this->load->helper('url');
	$this->load->library('form_validation');
	$this->load->helper('form');
	$this->load->model('Usuario');

             $this->form_validation->set_rules(
                     'username', 'Username',
                     'trim|required|min_length[5]|max_length[12]|callback_username_check', // |is_unique[users.username]
                     array(
                             'required'      => 'You have not provided %s.' // ,'is_unique'     => 'This %s already exists.'
                     )
             );
             $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]'); // htmlspecialchars
             $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');
             $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

             if ($this->form_validation->run() == FALSE)
             {
                     $this->load->view('registroUsuario.php');
             }
             else
             {
							$postData = $this->input->post();
							$data['Usuario']=$this->input->post('username');
							$data['Contraseña']=$this->input->post('password');
							$data['Correo']=$this->input->post('email');
							$data['Fechanacimiento']=$this->input->post('fechanacimiento');
							$data['Postal']=$this->input->post('postal');
						$this->Usuario->insertar($data);
            $this->load->view('usuarioregistrado.php');
             }



}

public function perfil(){
	$this->load->helper('url');
 $this->load->library('form_validation');
$this->load->model('Usuario');


 if(isset($_SESSION['username'])){

	 $data['h']=$this->Usuario->select();

	 $this->load->view('perfil.php',$data);
 }else{
  $this->load->view('nologueado.php');
 }

}

public function username_check($str)
        {

					$query = $this->db->get_where('usuarios', array(
		'Usuario' => $str
));
 							$count = $query->num_rows();
                if ($count != 0)
                {
                        $this->form_validation->set_message('username_check', 'El usuario"'.$str.'"  no esta disponible, introduzca otro');
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
        }

public function login_validation(){
						$this->load->helper('url');
           $this->load->library('form_validation');
           $this->form_validation->set_rules('username', 'Username', 'required');
           $this->form_validation->set_rules('password', 'Password', 'required');
           if($this->form_validation->run())
           {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $this->load->model('Usuario');
                if($this->Usuario->can_login($username, $password))
                {
                     $session_data = array(
                          'username'     =>     $username
                     );
                     $this->session->set_userdata($session_data);
                     redirect(base_url());
                }
                else
                {
                     $this->session->set_flashdata('error', 'Invalid Username and Password');
                     redirect(base_url());
                }
           }
           else
           {
                redirect(base_url());
           }


}

public function carrito(){

	$this->load->helper('url');
	$this->load->helper('html');
	$this->load->library('form_validation');
	$this->load->helper('form');
	$this->load->database();
	$this->load->model('Carrito','');
	$data['h']=$this->Carrito->select();

	$this->load->view('carritocompra.php',$data);//Pagina de Inicio



}

public function anadir_carrito($string){

	$this->load->helper('url');
	$this->load->library('form_validation');
	$this->load->helper('form');
	$this->load->model('Carrito');

	$this->load->model('Productoconcreto','');
	$data1['h1']=$this->Productoconcreto->select($string);


	if(isset($_SESSION['username'])){
		$data['Usuario']=$this->session->userdata('username');
		$Usuario=$this->session->userdata('username');
	}else{
		$data['Usuario']="NoUsuario";
		$Usuario="NoUsuario";
	}

	$this->db->where('Producto', $string);
	$query1 = $this->db->get('productoconcreto');


	foreach ($query1->result() as $row) {
		if($row->Producto==$string){
	$precio=$row->Precio;

		}
	}


	$this->db->where('Usuario', $Usuario);
	$this->db->where('Producto', $string);
	$query = $this->db->get('carrito');

	$data['Producto']=$string;
	$data['Numero']=(1);
	$data['Precio']=$precio;

	foreach ($query->result() as $row) {
		if($row->Producto==$string){
	$data['Numero']=($row->Numero+1);
	$data['Precio']=($row->Numero+1)*$precio;
}
	}


$this->Carrito->borrar($Usuario,$string);
$this->Carrito->insertar($data);



		 	$this->load->view('producto.php',$data1);

}

public function compras(){
	$this->load->helper('url');
	$this->load->helper('html');
	$this->load->library('form_validation');
	$this->load->helper('form');
	$this->load->database();
	$this->load->model('Carrito','');
	$data['h']=$this->Carrito->selectComprados();
	
	$this->load->view('compras.php',$data);
}

public function unomas($producto){

	$this->load->helper('url');
	$this->load->library('form_validation');
	$this->load->helper('form');
	$this->load->model('Carrito');
	if(isset($_SESSION['username'])){
		$data['Usuario']=$this->session->userdata('username');
		$Usuario=$this->session->userdata('username');
	}else{
		$data['Usuario']="NoUsuario";
		$Usuario="NoUsuario";
	}

	$this->db->where('Usuario', $Usuario);
	$this->db->where('Producto', $producto);
	$query = $this->db->get('carrito');


	foreach ($query->result() as $row) {
		if($row->Producto==$producto){
	$data['Numero']=($row->Numero+1);
	$data['Precio']=($row->Numero+1)*$row->Precio/$row->Numero;
	$data['Producto']=$row->Producto;
		}
	}

//	$this->Carrito->borrar($Usuario,$producto);
//	$this->Carrito->insertar($data);

$this->Carrito->actualizar($data,$Usuario,$producto);

	$data['h']=$this->Carrito->select();

	$this->load->view('carritocompra.php',$data);//Pagina de Inicio


}

public function unomenos($producto){

		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('Carrito');
		if(isset($_SESSION['username'])){
			$data['Usuario']=$this->session->userdata('username');
			$Usuario=$this->session->userdata('username');
		}else{
			$data['Usuario']="NoUsuario";
			$Usuario="NoUsuario";
		}

		$this->db->where('Usuario', $Usuario);
		$this->db->where('Producto', $producto);
		$query = $this->db->get('carrito');


		foreach ($query->result() as $row) {
			if($row->Producto==$producto){
				if($row->Numero>1){
		$data['Numero']=($row->Numero-1);
		$data['Precio']=($row->Numero-1)*$row->Precio/$row->Numero;
		$data['Producto']=$row->Producto;

		//	$this->Carrito->borrar($Usuario,$producto);
		//	$this->Carrito->insertar($data);

		$this->Carrito->actualizar($data,$Usuario,$producto);

	}else{
		$this->Carrito->borrar($Usuario,$producto);
	}
			}
		}

		$data['h']=$this->Carrito->select();

		$this->load->view('carritocompra.php',$data);//Pagina de Inicio


}

public function terminarcompra(){

	$this->load->helper('url');
	$this->load->library('form_validation');
	$this->load->helper('form');
	$this->load->model('Carrito');
	$this->load->model('Publication','');
	$data['h']=$this->Publication->select();

	if(isset($_SESSION['username'])){
		$Usuario=$this->session->userdata('username');
	}else{
		$Usuario="NoUsuario";
	}

$this->Carrito->borrarUsuarioProductos($Usuario);

	$data['h']=$this->Publication->select();

	$this->load->view('TiendaOnline.php',$data);//Pagina de Inicio



}

function logout()
 {
	 		$this->load->helper('url');
			$this->session->unset_userdata('username');
			redirect(base_url());
 }

}
