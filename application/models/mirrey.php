<?php 
class Mirrey extends CI_Model{
	
	function __construct()
	    {
	        parent::__construct();
	    }
	
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