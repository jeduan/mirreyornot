<?php 
class Mirrey extends CI_Model{
  
  function __construct() {
    parent::__construct();
  }
  
  function los_participantes($must = null) {
    $ret = array();
    $random_guys = ($must === null) ? 2 : 1;

    if ($random_guys === 1) {
      $this->db->select('uid');
      $query = $this->db->get_where('mirrey',array('uid' => $must), 1);
      foreach ($query->result_array() as $row) {
        $ret []= $row['uid'];
      }
    }

    $this->db->select('uid')->order_by('uid','random')->limit($random_guys);
    if ($random_guys === 1) {
      $this->db->where('uid !=', $must);
    }
    $query = $this->db->get('mirrey');
    foreach ($query->result_array() as $row) {
      $ret []= $row['uid'];
    }
//    $candidates = array('702152773', '2250617', '572862449', '502180815', '1002101672', '734322104');
    
    return $ret;
  }
  
  //TODO escribir esto en ActiveRecord ?
  function los_mejores_10() {
    $sql = "SELECT `votado` as id, COUNT(`votado`) as total"
        . " FROM `votos`"
        . " GROUP BY `votado`"
        . " ORDER BY total DESC LIMIT 10";
    $query = $this->db->query($sql);
    
    return array('data' => $query->result_array());
  }
  
  function insertame_papawh($name, $id, $nominator){
    $this->db->where('name', $name);
    $this->db->where('uid', $id);
    $query = $this->db->get("mirrey");
    
    if ($query->num_rows() > 0) {
      return false;
    } else {
      $a = array(
        'name' => $name,
        'uid' => $id,
        'nominator' => $nominator);
      
      return ( $this->db->insert("mirrey", $a) );
      
    }
  }
    
  function valida_papawh($votado, $votante){
    $this->db->where('votado', $votado);
    $this->db->where('votante', $votante);
    $query = $this->db->get("votos");		
    
    if ($query->num_rows() > 0) {
      return false;
    } else {
      $a = array( 
        "votado" => $votado,
        "votante" => $votante);
      return ($this->db->insert("votos", $a));
    }						
  }	
}
?>