<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
  public function __construct() {
       parent::__construct();
       $this->load->model('posts_model');
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

		$posteos = $this->posts_model->posts();
		$data['posts'] = $this->paginator->paginate($posteos, ['base_url' => "/", 'per_page' => 3]);
		$this->load->view('principal', $data);

		$this->load->view('foot');
	}

  public function addpost()
  {
		if ($this->session->userdata('rango') == "admin") {

$data['categorias'] = $this->posts_model->ver_categorias();
$this->load->view('head');
$this->load->view('add_post', $data);
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

} else {
	redirect('/', 'refresh');


}
}

public function ver($id=null)
{
	$this->load->model('admin_model');
$data['titulos'] = $this->admin_model->titulos($id);
$this->load->view('head', $data);
if($id){
	
$data['contenido'] = $this->posts_model->ver($id);
$comprobacion = $this->posts_model->autor($id);
if($comprobacion){
	$data['usuario'] = $this->usuario_model->obtenerdatos($comprobacion->autor);

	$this->load->view('ver_post', $data);
	$this->load->view('formu_comentarios', $data);
	$this->load->model('comentarios_model');
	$data2['comentarios'] = $this->comentarios_model->ver_comentarios($id);
	$this->load->view('ver_comentarios', $data2);
	$this->load->view('foot');
} else {

	redirect('/', 'refresh');


}

} else {

echo "Posts relacionados";
}

}

public function subir_imagen()
{

	
	$this->load->helper('file');
	$dir_name = "upload/";
	$tiempo = time();
	$completo = $dir_name.$tiempo.$_FILES['image']['name'];
		move_uploaded_file($_FILES['image']['tmp_name'],$completo);
		$url2 =base_url();
    echo $url2.$dir_name.$tiempo.$_FILES['image']['name'];

}


public function editar($id) {
	if ($this->session->userdata('rango') == "admin") {

	if ($this->input->post()) {

		$titulo = $this->input->post('titulo');
		$contenido = $this->input->post('contenido');
		$tags = $this->input->post('tags');
		$categoria = $this->input->post('categoria');
		$editar = $this->posts_model->editar($id,$titulo,$contenido,$tags);
	
		$this->session->set_flashdata('afirmacion', 'El post ha sido modificado correctamente.');
    redirect('posts/editar/'.$id.'', 'refresh');
	} else {


	$data['datos'] = $this->posts_model->ver($id);
	$this->load->view('head');
	$this->load->view('editar_post', $data);
	$this->load->view('foot');

	
		



}
	} else {
    redirect('/', 'refresh');


	}
}

public function borrar($id) {
	if ($this->session->userdata('rango') == "admin") {

		$insertar = $this->posts_model->borrar($id);

		if($insertar) {

			redirect('posts/', 'refresh');
		
		  } else {
		
		  }


	} else {
		redirect('/', 'refresh');
	
	
		}
}

public function crear_categoria() {
	if ($this->session->userdata('rango') == "admin") {

$this->load->view('head');
if ($this->input->post()) {

	$nombre = $this->input->post('nombre');
	$descripcion = $this->input->post('descripcion');

	$this->form_validation->set_rules('nombre', 'nombre', 'required');
	$this->form_validation->set_rules('descripcion', 'descripcion', 'required');

	if($this->form_validation->run() == FALSE)
      			{
              $this->session->set_flashdata('error', '¡No puedes dejar ningún campo en blanco!');
              redirect('posts/crear_categoria', 'refresh');
            } else {


	$categoria = $this->posts_model->crear_categoria($nombre,$descripcion);
	$this->session->set_flashdata('afirmacion', 'La categoría se creo correctamente.');
	redirect('posts/crear_categoria', 'refresh');
	
			}



} else {
	$data['categorias'] = $this->posts_model->ver_categorias();
	$this->load->view('crear_categorias', $data);


}

$this->load->view('foot');

} else {
	redirect('/', 'refresh');


	}

}


}
