<?php
class Usuario_model extends CI_Model {
   public function __construct() {
      parent::__construct();
   }

   public function registrar($usuario, $password, $email){

  $datosregistro = array(

  'usuario' => $usuario,
  'password' => $password,
  'email' => $email,

  );

  $this->db->insert('usuarios', $datosregistro);
  if ($this->db->trans_status() === FALSE) {

    $this->session->set_flashdata('registro', 'Hubo un error en el registro.');
    redirect('usuarios/registrar', 'refresh');
  } else {


    $this->session->set_flashdata('registro', '¡Se registro correctamente!');
    redirect('usuarios', 'refresh');
  }






}



   }
