<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
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
        $user_profile = $this->facebook->api('/me');
      } catch (FacebookApiException $e) {
        error_log($e);
        $user = null;
      }
    }
    
    if ($user) {
      $data['logoutUrl'] = $this->facebook->getLogoutUrl();
      $this->load->view('index', $data);      
    } else {
      $data['loginUrl'] = $this->facebook->getLoginUrl();
      $this->load->view('loggedOut', $data);
    }
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */