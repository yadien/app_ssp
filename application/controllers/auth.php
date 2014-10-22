<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller {
	var $data;
	
	function __construct(){ 
		parent::__construct(); 
	
	}
	
	public function index()
	{
		if ($_POST)
		{
			$this->load->library ('Form_validation');
			$rule = $this->form_validation;
			$rule->set_rules('username', 'Username', 'trim|required|xss_clean');
			$rule->set_rules('password', 'Password', 'trim|required|xss_clean');
			if ($rule->run())
			{
				if ($profile = $this->authentication->login (set_value('username'), set_value('password')))
				{
					$sess_array = array(
					 'username' => $profile->username,
					 'password' => $profile->password,
					 'nama_pengguna' => $profile->nama_pengguna,
					 'level' => $profile->level,
					 'status' => $profile->status
					);					
					//$this->session->set_userdata($sess_array);					
					$this->session->set_userdata(array ('auth' => true, 'profile' => $profile));
					
					$redir = base_url();
					$rtn = array ('code' => 0, 'redir' => $redir);
				}
				else		
					$rtn = array ('code' => 1, 'message' => 'Authentication failed, please try again.');
			}
			else
				$rtn = array ('code' => 1, 'message' => validation_errors('<li>', '</li>'));
	
			
			print json_encode ($rtn);
			redirect('home');
			exit();
		}
		$this->load->view('login', $this->data);
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('');
	}
}
?>