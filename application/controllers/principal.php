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

		$posteos = $this->posts_model->posts();
		$data['posts'] = $this->paginator->paginate($posteos, ['base_url' => "/", 'per_page' => 3]);
		$this->load->view('principal', $data);

		$this->load->view('foot');

	}



}
