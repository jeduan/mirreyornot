<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$this->config->load('facebook');
		$fb_config = array(
			'appId' => $this->config->item('app_id'),
			'secret' => $this->config->item('app_secret')
		);
		$this->load->library('Facebook', $fb_config);
		
		$user = $this->facebook->getUser();
		
		if (! $user) {
  		$data['loginUrl'] = $this->facebook->getLoginUrl(array('scope' => 'publish_stream'));
  		$this->load->view('loggedOut', $data);
  		return;
  	}
  	
	  $profile = null;
	  
		try {
			$profile = $this->facebook->api('/me?fields=id,name,link');					
		} catch (FacebookApiException $e) {
			error_log($e);
			$user = null;
		}
		
		$fb_data = array(
			'me' => $profile,
			'uid' => $user,
			'loginUrl' => $this->facebook->getLoginUrl(array('scope' => 'publish_stream')),
			'logoutUrl' => $this->facebook->getLogoutUrl(),
	  );
		$this->session->set_userdata('fb_data', $fb_data);
    
    $this->load->model('mirrey');
		$participants = $this->mirrey->los_participantes();
		
		$data = array_merge($fb_data, array(
		  'app_id' => $this->config->item('app_id'),
		  'participants' => $participants,
		  'message' => $this->session->userdata('message')
		));
		$this->load->view('index', $data);			
	
	}
	
	public function participants() {
	  $this->load->model('mirrey');
	  echo json_encode($this->mirrey->los_participantes());
	}
	
	public function vote() {
		$this->load->model('mirrey');
		$vote = $this->mirrey->valida_papawh();
		
	  $message = ($vote) ?		  
		  'Pta si' :
		  'Ya votaste papawh';
		  
		//$this->session->set_flashdata('message', $message);*/
		
		$participants = $this->mirrey->los_participantes();
		echo json_encode(array(
		    'vote' => $vote, 
		    'message' => $message));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */