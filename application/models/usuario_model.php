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

$rango = "publico";
  $datosregistro = array(

  'usuario' => $usuario,
  'password' => $password,
  'email' => $email,
  'rango' => $rango,

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

public function obtenerdatos($id){

  $this->db->from('usuarios');
  $this->db->where('id', $id);
  $consulta = $this->db->get();
  $resultado = $consulta->result();
  return $resultado;
}

public function actualizar_avatar($url,$id) {

  $this->db->where('id', $id);
   $quitar = $this->db->get('usuarios')->row();
   $final = $quitar->avatar; 

unlink($final); 

  $data = array(
    'avatar' => $url,
);
$this->db->where('id', $id);
$this->db->set($data);
$this->db->update('usuarios');
}

public function editar_perfil($id,$descripcion,$email,$twitter,$web) {
  $data = array(
    'descripcion' => $descripcion,
    'email' => $email,
    'twitter' => $twitter,
    'web' => $web,
);

$this->db->where('id', $id);
$this->db->set($data);
$this->db->update('usuarios');

}

public function url_avatar($idusuario){

  $this->db->from('usuarios');
  $this->db->where('usuario', $idusuario);
  $consulta = $this->db->get();
  $resultado = $consulta->result();
  return $resultado;
}

   }
