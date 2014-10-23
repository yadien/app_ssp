<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller {
	var $data;
	var $profile;
	function __construct()
	{
		parent::__construct();
		$this->authentication->protect();
		$this->profile = $this->session->userdata('profile');
		$this->data['profile'] =  $this->profile;
		$this->load->model('users');
	}
	
	public function index()
	{
		if ($_POST)
		{
			$this->load->library ('Form_validation');
			$f = $this->form_validation;
			$f->set_rules('nama_pengguna', 'Nama Lengkap', 'trim|required');
			if ($f->run())
			{
				$rtn = array ('code' => 0);
				$data = array (
					'nama_pengguna' => set_value('nama_pengguna')
				);
				$this->users->update($this->profile->username, $data);
				$this->profile->nama_pengguna = set_value('nama_pengguna');
				$this->session->set_userdata('profile', $this->profile);
			}
			else
			{
				$rtn = array ('code' => 1, 'message' => validation_errors('<li>', '</li>'));
			}
			print json_encode ($rtn);
			exit();
		}
		$this->data['body'] = $this->load->view('profile', $this->data, true);
		$this->load->view('layout', $this->data);
	}
	
	public function chpasswd()
	{
		if ($_POST)
		{
			$this->load->library ('Form_validation');
			$f = $this->form_validation;
			$f->set_rules('password', 'Password Sekarang', 'trim|required|callback_check_password');
			$f->set_rules('new_password', 'Password Baru', 'trim|required|min_length[3]|max_length[30]');
			$f->set_rules('conf_password', 'Konfirmasi Password Baru', 'trim|required|matches[new_password]');
			if ($f->run())
			{
				$rtn = array ('code' => 0);
				$data = array (
					'password' => set_value('new_password') //md5(set_value('new_password'))
				);
				$this->users->update($this->profile->username, $data);
			}
			else
			{
				$rtn = array ('code' => 1, 'message' => validation_errors('<li>', '</li>'));
			}
			print json_encode ($rtn);
			exit();
		}
		$this->data['body'] = $this->load->view('chpasswd', $this->data, true);
		$this->load->view('layout', $this->data);
	}
	
	public function check_password ($password)
	{
		$username = $this->profile->username;
		if ($this->authentication->login ($username, $password))
			return true;
		else
		{
			$this->form_validation->set_message('check_password', 'Password yang Anda masukkan tidak benar, silahkan mencoba kembali.');
			return false;
		}
	}
}