<?php
class Admin_model extends CI_Model {
   public function __construct() {
      parent::__construct();
   }

   public function contar_usuarios() {

     $comprobacion = $this->db->from('usuarios');
     $contar = $comprobacion->count_all_results();

     if($contar == 0) {
$cero = "0";
return $cero;

} else {
          return $contar;
}

   }

   public function contar_posts() {

     $comprobacion = $this->db->from('posts');
     $contar = $comprobacion->count_all_results();

     if($contar == 0) {
   $cero = "0";
   return $cero;

   } else {
          return $contar;
   }

   }

   public function contar_comentarios() {

     $comprobacion = $this->db->from('comentarios');
     $contar = $comprobacion->count_all_results();

     if($contar == 0) {
   $cero = "0";
   return $cero;

   } else {
          return $contar;
   }

   }

   public function ultimos_comentarios($limit=null) {

    $this->db->select('*');
    $this->db->from('comentarios');
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit);
    $consulta = $this->db->get();
    $resultado = $consulta->result();
    return $resultado;
    


   }
   
   public function buscar_usuario($usuario) {

    $this->db->from('usuarios');
    $this->db->where('usuario', $usuario);
    $consulta = $this->db->get();
    $resultado = $consulta->result();
    
    return $resultado;

  }



 }
