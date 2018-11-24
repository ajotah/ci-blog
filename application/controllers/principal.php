<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {
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

		$insertar = $this->posts_model->posts();
		if($insertar) {
		foreach ($instertar as $datos)
{
        echo $datos->titulo; // access attributes
        echo $datos->contenido; // or methods defined on the 'User' class
}
} else {

	echo 'No hay posts';
}
		$this->load->view('foot');

	}

  public function opcion1()

{

  $this->load->view('opcion1');
}
}
