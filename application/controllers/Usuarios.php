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
      $this->form_validation->set_rules('usuario', 'Usuario', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      if($this->form_validation->run() == FALSE)
      			{
              $this->session->set_flashdata('error', '¡No puedes dejar ningún campo en blanco!');
              redirect('usuarios/registrar', 'refresh');
            } else {
      $usuario = $this->input->post('usuario');
      $password = md5($this->input->post('password'));
      $email = $this->input->post('email');
      $rango = 'publico';        
      $insertar = $this->usuario_model->registrar($usuario,$password,$email,$rango);
}



    }

    break;
    case 'logged_in':
    redirect('/', 'refresh');
    break;
  }


  $this->load->view('foot');
}

public function login()
{
  $this->load->view('head');

  if ($this->input->post()) {
      $this->form_validation->set_rules('usuario', 'Usuario', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      if($this->form_validation->run() == FALSE)
      			{
              $this->session->set_flashdata('error', '¡No puedes dejar ningún campo en blanco!');
              redirect('usuarios', 'refresh');
            } else {
    $usuario = $this->input->post('usuario');
    $password = md5($this->input->post('password'));
    $insertar = $this->usuario_model->login($usuario,$password);
    if($insertar) {
      $datosusuario = array(
                     'id' => $insertar->id,
                     'usuario' => $insertar->usuario,
                     'rango' => $insertar->rango,
                     'logged_in' => TRUE
                  );


      $this->session->set_userdata($datosusuario);
      redirect('/', 'refresh');

    } else {

      $this->session->set_flashdata('error', 'El nombre de usuario/contraseña no coinciden.');
      redirect('usuarios', 'refresh');


    }

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

public function perfil(){

$this->load->view('head');
$this->load->view('perfil');
$this->load->view('foot');

}

public function actualizar_avatar() {
  if($this->session->userdata('logged_in')) {
      $config['upload_path'] = './upload/avatars';
      $config['allowed_types'] = 'jpg|png';
      $config['overwrite'] = TRUE; 
      $config['encrypt_name'] = TRUE;
      $config['max_size'] = '200'; 

      $this->upload->initialize($config);
      if ( ! $this->upload->do_upload('userfile'))
      {
          $error = $this->upload->display_errors(); 

          $this->session->set_flashdata('error', $error);

          redirect('/usuarios/perfil');
      }
      else
      {                
          $config['image_library'] = 'gd2';
          $config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
          $config['create_thumb'] = FALSE;
          $config['maintain_ratio'] = FALSE;
          $config['width'] = 60;
          $config['height'] = 60;

          $this->load->library('image_lib', $config); 

          $this->image_lib->resize();

          $url = 'upload/avatars/' . $this->upload->file_name;
          $id = $this->session->userdata('id');
          $this->usuario_model->actualizar_avatar($url, $id);

          $this->session->set_flashdata('afirmacion', '¡Avatar actualizado!');

          redirect('/usuarios/perfil');
      }
  
    }
} 

public function actualizar_perfil() {
 if($this->session->userdata('logged_in')) {
  if ($this->input->post()) {

		$descripcion = $this->input->post('descripcion');
		$email = $this->input->post('email');
		$twitter = $this->input->post('twitter');
    $web = $this->input->post('web');
    $id = $this->session->userdata('id');
		$editar = $this->usuario_model->editar_perfil($id,$descripcion,$email,$twitter,$web);
	
		$this->session->set_flashdata('afirmacion', 'Los datos del perfil han sido actualizados correctamente.');
    redirect('usuarios/perfil/', 'refresh');
  } else {

    redirect('usuarios/perfil', 'refresh');

  }
 }
}



}
