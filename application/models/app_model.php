<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_Model extends CI_Model {

	 
	//query otomatis dengan active record
	public function getAllData($table)
	{
		return $this->db->get($table);
	}
	
	public function getAllDataLimited($table,$limit,$offset)
	{
		return $this->db->get($table, $limit, $offset);
	}
	
	public function getAllDataVilla($limit,$offset)
	{
		return $this->db->query("select a.*, b.status_villa from tbl_villa a left join tbl_status_v b on a.id_status = b.id_status",$limit,$offset);
	}
	
	public function getSelectedDataLimited($table,$data,$limit,$offset)
	{
		return $this->db->get_where($table, $data, $limit, $offset);
	}
	
	public function getSelectedData($table,$data)
	{
		return $this->db->get_where($table, $data);
	}	
	
	function updateData($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	
	function deleteData($table,$data)
	{
		$this->db->delete($table,$data);
	}
	
	function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}
	
	function manualQuery($q)
	{
		return $this->db->query($q);
	}
	
	
	//query login
	public function getLoginData($usr,$psw)
	{
		//$u = mysql_real_escape_string($usr);
		//$p = md5(mysql_real_escape_string($psw.'appFakturDlmbg32'));
			//$p =mysql_real_escape_string($p);
		$q_cek_login = $this->db->get_where('tbl_login', array('username' => $usr, 'password' => $psw));
		if(count($q_cek_login->result())>0)
		{
			foreach($q_cek_login->result() as $qck)
			{
				if($qck->stts=='admin')
				{
					foreach($q_cek_login->result() as $qad)
					{
						$sess_data['logged_in'] = 'yesGetMeLogin';
						$sess_data['username'] = $qad->username;
						$sess_data['nama_pengguna'] = $qad->nama_pengguna;
						$sess_data['stts'] = $qad->stts;
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'pemesanan/pending');
				}
			}
		}
		else
		{
			$this->session->set_flashdata('result_login', 'Username atau Password yang anda masukkan salah.');
			header('location:'.base_url().'front');
		}
	}
}

/* End of file app_model.php */
/* Location: ./application/models/app_model.php */