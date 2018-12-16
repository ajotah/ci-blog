<?php
class Posts_model extends CI_Model {
   public function __construct() {
      parent::__construct();
   }

   public function posts() {

     $this->db->select('id, titulo, tituloseo, contenido, fecha, tags');
          $this->db->from('posts');
          $this->db->order_by('id', 'desc');
          return $this->db;


   }

   public function add_post($titulo,$contenido,$tags) {

$tituloseo = preg_replace('/[^A-Za-z0-9-]+/', '-', $titulo);
$fecha = now();
$fechahumana = unix_to_human($fecha);
$autor = $this->session->userdata('id');
$datosregistro = array(

     'titulo' => $titulo,
     'tituloseo' => $tituloseo,
     'fecha' => $fechahumana,
     'contenido' => $contenido,
     'tags' => $tags,
     'autor' => $autor,

   );

   $query = $this->db->insert('posts', $datosregistro);
   return $query;


   }

   public function ver($id) {

$this->db->from('posts');
$this->db->where('id', $id);
$consulta = $this->db->get();
$resultado = $consulta->result_array();
return $resultado;

   }

   public function autor($id){


     $this->db->select('autor', 'descripcion');
      $this->db->from('posts');
      $this->db->where('id', $id);
      $consulta = $this->db->get();
      return $consulta->row();
   }
   
public function ver_categorias() {

   $this->db->from('categorias');
   $this->db->order_by('id');
$consulta = $this->db->get();
$resultado = $consulta->result_array();
return $resultado;

}

public function editar($id,$titulo,$contenido,$tags) {
   $data = array(
      'titulo' => $titulo,
      'contenido'  => $contenido,
      'tags'  => $tags,
);
$this->db->where('id', $id);
$this->db->set($data);
$this->db->update('posts');
}

public function borrar($id) {

   $this->db->where('id', $id);
   $this->db->delete('posts');
   return true;
}
public function crear_categoria($nombre,$descripcion) {

   $datosregistro = array(

      'nombre' => $nombre,
      'descripcion' => $descripcion,
    );

    $query = $this->db->insert('categorias', $datosregistro);
    return $query;
 
}

   }
