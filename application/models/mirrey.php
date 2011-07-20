<?php 
class Mirrey extends CI_Model{
	
	function __construct()
	    {
	        parent::__construct();
	    }
	
	function valida_papawh{
		$mirreycandidato  = $this->input->post();
		$votante = $this->input->post();
		$this->db->where('votado', $mirreycandidato);
		$this->db->where('votante', $votante);
		$query= $this->db->get("votos");		
		if($query->num_rows() > 0){
			//redirecciona o genera otro
		}
		else{
			$a = array( "votado" => $mirreycandidato,
						"votante" => $votante
					);
			$this->db->insert("votos", $a);
			
		}
			
			
		}
		
	}
		
	
}
?>