<?php
class authentication extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function protect($level = 'USER')
	{
		if (!$this->session->userdata('auth'))
		{
			$this->session->set_userdata('redir', current_url());
			redirect('auth');
			exit();
		}
		
		if (!empty ($level) AND $level == 'ADMIN')
		{
			$profile = $this->session->userdata('profile');
			if ($profile->level != $level)
			{
				$this->session->set_userdata('redir', current_url());
				redirect('auth');
				exit();
			}
		}
	}
	
	function login ($username, $password)
	{
		//$query = $this->db->get_where ('tbl_login', array ('status' => 'ACTIVE', 'username' => $username, 'password' => md5($password)));
		$query = $this->db->get_where ('tbl_login', array ('status' => 'ACTIVE', 'username' => $username, 'password' => $password));
		return ($query->num_rows() >= 1) ? $query->first_row() : false;
	}
}
?>