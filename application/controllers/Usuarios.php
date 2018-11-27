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
    if ($this->session->userdata('logged_in')) {

echo 'Esta ok, esto es panel administracion.';

  } else {
    $this->load->view('login');

    }
    $this->load->view('foot');
	}

  public function registrar()
{
  $this->load->view('head');
  switch ($this->session->userdata('logged_in')) {

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
    redirect('usuarios/login', 'refresh');
    break;
  }


  $this->load->view('foot');
}

public function login()
{
  $this->load->view('head');

  if ($this->input->post()) {
    $usuario = $this->input->post('usuario');
    $password = md5($this->input->post('password'));
    $insertar = $this->usuario_model->login($usuario,$password);
    if($insertar) {
      $datosusuario = array(
                     'id' => $insertar->id,
                     'usuario' => $insertar->usuario,
                     'logged_in' => TRUE
                  );


      $this->session->set_userdata($datosusuario);
      redirect('/', 'refresh');

    } else {

      $this->session->set_flashdata('error', 'El nombre de usuario/contraseña no coinciden.');
      redirect('usuarios', 'refresh');


    }




  } else {
    redirect('usuarios', 'refresh');

  }

    $this->load->view('foot');

}

public function logout()
{
  session_destroy();
  redirect('/', 'refresh');


}

}
