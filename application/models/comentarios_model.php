<?php
class Comentarios_model extends CI_Model {
   public function __construct() {
      parent::__construct();
   }

   public function ver_comentarios($id) {

          $this->db->from('comentarios');
          $this->db->where('articulo', $id);
          $this->db->order_by('fecha', 'desc');
          $consulta = $this->db->get();
          $resultado = $consulta->result();
          return $resultado;


   }

   public function add_comentario($articulo,$contenido) {

     $fecha = now();
     $fechahumana = unix_to_human($fecha);
     $usuario = $this->session->userdata('usuario');
     $datosregistro = array(

          'usuario' => $usuario,
          'contenido' => $contenido,
          'fecha' => $fechahumana,
          'articulo' => $articulo,

        );

        $query = $this->db->insert('comentarios', $datosregistro);
        return $query;


   }
 }
