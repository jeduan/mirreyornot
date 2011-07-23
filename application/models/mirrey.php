<?php 
class Mirrey extends CI_Model{
	
	function __construct() {
	  parent::__construct();
	}
	
	function los_participantes($must = null) {
	  $candidates = array('702152773', '2250617', '572862449', '502180815', '1002101672', '734322104');
	  $keys = array_rand($candidates, 2);
	  $ret = array();
	  foreach ($keys as $key)
	  {
	    $ret []= $candidates[$key];
	  }
	  
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
	
	function insertame_papawh($name, $id){
    $this->db->where('name', $name);
    $this->db->where('id', $id);
    $query = $this->db->get("mirrey");
    
    if ($query->num_rows() > 0) {
    	return false;
    } else {
  		$a = array(
  			"name" => $name,
  			"id" => $id);  			
  		return ($this->db->insert("mirrey", $a));
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