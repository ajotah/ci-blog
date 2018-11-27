<?php
class Usuario_model extends CI_Model {
   public function __construct() {
      parent::__construct();
   }

   public function registrar($usuario, $password, $email){

$comprobar = array(
'usuario' => $usuario,

);
$comprobacion = $this->db->get_where('usuarios', $comprobar);
$contar = $comprobacion->num_rows();

if($contar >= 1) {

  $this->session->set_flashdata('error', 'El usuario ya existe, por favor intentelo con otro.');
  redirect('usuarios/registrar', 'refresh');

} else {


  $datosregistro = array(

  'usuario' => $usuario,
  'password' => $password,
  'email' => $email,

  );

  $this->db->insert('usuarios', $datosregistro);
  if ($this->db->trans_status() === FALSE) {

    $this->session->set_flashdata('error', 'Hubo un error en el registro.');
    redirect('usuarios/registrar', 'refresh');
  } else {


    $this->session->set_flashdata('afirmacion', '¡Se registro correctamente!');
    redirect('usuarios', 'refresh');
  }

}




}


public function login($usuario, $password) {

$datos = array(

'usuario' => $usuario,
'password' => $password,

);

$this->db->where($datos);
   return $this->db->get('usuarios')->row();


}


   }
