<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentarios extends CI_Controller {
  public function __construct() {
       parent::__construct();
       $this->load->model('comentarios_model');
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

    $data['comentarios'] = $this->comentarios_model->listado($id);
    $idusuario = $data['comentarios']['usuario'];
    $data['avatar'] = $this->usuario_model->url_avatar($idusuario);
    $this->load->view('ver_comentarios', $data);
	}


public function add($id)
{
  if ($this->session->userdata('logged_in')) {
  if ($this->input->post()) {
    $this->form_validation->set_rules('contenido', 'Escribir un comentario...', 'required');
    if($this->form_validation->run() == FALSE)
    			{
            $this->session->set_flashdata('error', 'No has cumplimentado correctamente el comentario. No lo dejes en blanco, no uses caracteres extraños.');
            redirect('posts/ver/'.$id.'', 'refresh');

          } else {
    $contenido = $this->input->post('contenido');
    $articulo = $id;
    $insertar = $this->comentarios_model->add_comentario($articulo,$contenido);

    if($insertar) {

      $this->session->set_flashdata('afirmacion', 'El comentario ha sido añadido con éxito.');
      redirect('posts/ver/'.$id.'', 'refresh');

    } else {
      $this->session->set_flashdata('error', 'Hubo un error al introducir el comentario.');
      redirect('posts/ver/'.$id.'', 'refresh');

    }

}
}
} else {
  $this->session->set_flashdata('error', '¡Debes iniciar sesión para comentar!');
  redirect('posts/ver/'.$id.'', 'refresh');

}
}


}
