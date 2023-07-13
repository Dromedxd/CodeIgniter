<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

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

		//$this->load->view('TiendaOnline.php',$data);
	//	$this->load->view('producto.php',$data1);

}
public function cargar($string) {

 $this->load->helper('url');
 $this->load->helper('html');
 $this->load->library('form_validation');
 $this->load->helper('form');
 $this->load->database();
 $this->load->model('Productoconcreto','');
 $data1['h1']=$this->Productoconcreto->select(urldecode($string));

$this->load->view('producto.php',$data1);
		}

}
