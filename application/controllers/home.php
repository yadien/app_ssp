<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	var $data;
	var $profile;
	function __construct()
	{
		parent::__construct();
		$this->authentication->protect();
		$this->profile = $this->session->userdata('profile');
		$this->data['profile'] =  $this->profile;
	}
	
	public function index()
	{
		$this->data['body'] = $this->load->view('home', $this->data, true);
		$this->load->view('layout', $this->data);
	}	
	
}
?>