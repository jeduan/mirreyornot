<?php 
class Mirrey extends CI_Model{
	
	function __construct() {
	  parent::__construct();
	}
	
	function los_participantes() {
	  $candidates = array('702152773', '2250617', '572862449', '502180815', '1002101672', '734322104');
	  $keys = array_rand($candidates, 2);
	  $ret = array();
	  foreach ($keys as $key)
	  {
	    $ret []= $candidates[$key];
	  }
	  
	  return $ret;
	}
	
	function los_mejores_10() {
	  $sql = "SELECT `votado` as id, COUNT(`votado`) as total FROM `votos` GROUP BY `votado` ORDER BY total DESC LIMIT 10";
	  $query = $this->db->query($sql);
	  
	  return array('data' => $query->result_array());
	}
	
	function insertame_papawh(){
		$a = array(
			"name" => $this->input->post("name"),
			"id" => $this->input->post("id")
			);
		if($this->db->insert("mirrey", $a)) {
			return true;			
		}	else {
			return false;
		}
	}
	
	//Comentario dummie para prueba
	
	function valida_papawh(){
		$mirreycandidato  = $this->input->post("votado");
		$votante = $this->input->post("votante");
		$this->db->where('votado', $mirreycandidato);
		$this->db->where('votante', $votante);
		$query= $this->db->get("votos");		
		if($query->num_rows() > 0){
			return false;
		}
		else{
			$a = array( "votado" => $mirreycandidato,
						"votante" => $votante
					);
			if($this->db->insert("votos", $a))
				return true;
				
			else{
				return false;
			}						
		}						
	}	
}
?>