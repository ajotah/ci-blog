<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentarios extends CI_Controller {
  public function __construct() {
       parent::__construct();
       $this->load->model('comentarios_model');
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
    $this->load->view('ver_comentarios', $data);
	}


public function add($id)
{

  if ($this->input->post()) {
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


}
