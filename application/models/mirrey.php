<?php 
class Mirrey extends CI_Model{
	
	function __construct()
	    {
	        parent::__construct();
	    }
	
	function insertame_papawh(){
		$a = array(
			"name" => $this->input->post("name"),
			"id" => $this->input->post("id")
			);
		if($this-db->insert("mirrey", $a)){
			return true;			
		}				
		else 
			return false;
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