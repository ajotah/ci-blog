<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
  public function __construct() {
       parent::__construct();
       $this->load->model('usuario_model');
    }
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
	public function index()
	{
    $this->load->view('head');
		$this->load->view('registrar_usuarios');
    $this->load->view('foot');
	}

  public function registrar()
{
  $this->load->view('head');
  switch ($this->session->userdata('perfil')) {

    case '':
    $this->load->view('registrar_usuarios');
    if ($this->input->post()) {
      $usuario = $this->input->post('usuario');
      $password = md5($this->input->post('password'));
      $email = $this->input->post('email');
      $insertar = $this->usuario_model->registrar($usuario,$password,$email);




    }

    break;
    case 'publico':
    $this->load->view('inicio');
    break;
  }


  $this->load->view('foot');
}

}
