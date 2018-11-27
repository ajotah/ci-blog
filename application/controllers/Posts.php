<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
  public function __construct() {
       parent::__construct();
       $this->load->model('posts_model');
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
    $this->load->view('principal');
    $this->load->view('foot');
	}

  public function addpost()

  {

$this->load->view('head');
$this->load->view('add_post');
if ($this->input->post()) {
  $titulo = $this->input->post('titulo');
  $contenido = $this->input->post('contenido');
  $tags = $this->input->post('tags');
  $insertar = $this->posts_model->add_post($titulo,$contenido,$tags);

  if($insertar) {

    $this->session->set_flashdata('afirmacion', 'El post ha sido añadido con éxito.');
    redirect('posts/addpost', 'refresh');

  } else {
    $this->session->set_flashdata('error', 'Hubo un error al introducir el post.');
    redirect('posts/addpost', 'refresh');

  }

  }
  $this->load->view('foot');


}
}
