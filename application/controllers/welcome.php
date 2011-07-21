<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *		http://example.com/index.php/welcome
	 *	- or -	
	 *		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->config->load('facebook');
		$fb_config = array(
			'appId' => $this->config->item('app_id'),
			'secret' => $this->config->item('app_secret')
		);
		$this->load->library('Facebook', $fb_config);
				
		$user = $this->facebook->getUser();
		
		if ($user) {
			try {
				// Proceed knowing you have a logged in user who's authenticated.
				$profile = $this->facebook->api('/me?fields=id,name,link,email');
				$fb_data = array(
												'me' => $profile,
												'uid' => $user,
												'loginUrl' => $this->facebook->getLoginUrl(array('scope' => 'publish_stream')),
												'logoutUrl' => $this->facebook->getLogoutUrl(),
										);
				$this->session->set_userdata('fb_data', $fb_data);
				$data = array_merge($fb_data, array('app_id' => $this->config->item('app_id')));
				$this->load->view('index', $data);			
				
			} catch (FacebookApiException $e) {
				error_log($e);
				$user = null;
			}
		} else {
			$data['loginUrl'] = $this->facebook->getLoginUrl(array('scope' => 'publish_stream'));
			$this->load->view('loggedOut', $data);
		}
		
	}
	
	public function vote() {
		$this->load->model('mirrey');
		$vote = $this->mirrey->valida_papawh();
		
		redirect('/');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */