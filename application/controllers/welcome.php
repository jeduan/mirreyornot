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
		$this->load->library('facebook');
				
		$facebook = new Facebook( array(
		  'appId' => $this->config->item('app_id'),
		  'secret' => $this->config->item('app_secret')
		));
		$user = $facebook->getUser();
		
		if ($user) {
      try {
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');
      } catch (FacebookApiException $e) {
        error_log($e);
        $user = null;
      }
    }
    
    if ($user) {
      $data['logoutUrl'] = $facebook->getLogoutUrl();
    } else {
      $data['loginUrl'] = $facebook->getLoginUrl();
    }
		
		$this->load->view('index', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */