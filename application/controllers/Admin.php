<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct() {
       parent::__construct();
       $this->load->model('posts_model');
       $this->load->model('usuario_model');
       $this->load->model('Admin_model');
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
    $data['cantidad_usuarios'] = $this->Admin_model->contar_usuarios();
    $data['cantidad_posts'] = $this->Admin_model->contar_posts();
    $data['cantidad_comentarios'] = $this->Admin_model->contar_comentarios();

    $this->load->view('head');

    $this->load->view('admin', $data);

    $this->load->view('foot');

	}



}
