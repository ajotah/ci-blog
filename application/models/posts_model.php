<?php
class Posts_model extends CI_Model {
   public function __construct() {
      parent::__construct();
   }

   public function posts() {

     $this->db->select('id, titulo, tituloseo, contenido, fecha, tags');
          $this->db->from('posts');
          $this->db->order_by('id');
          $consulta = $this->db->get();
          $datos = $consulta->result();
          return $datos;

   }

   public function add_post($titulo,$contenido,$tags) {

$tituloseo = preg_replace('/[^A-Za-z0-9-]+/', '-', $titulo);
$fecha = now();
$fechahumana = unix_to_human($fecha);
$datosregistro = array(

     'titulo' => $titulo,
     'tituloseo' => $tituloseo,
     'fecha' => $fechahumana,
     'contenido' => $contenido,
     'tags' => $tags,

   );

   $query = $this->db->insert('posts', $datosregistro);
   return $query;


   }

   }
