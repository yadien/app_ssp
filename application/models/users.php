<?php
class Users extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function by_type($type)
	{
		$this->db->select('*');
		$this->db->order_by ('nama_pengguna', 'ASC');
		$this->db->where('level', $type);
		$this->db->where('status', 'ACTIVE');
		$query = $this->db->get('tbl_login');
		return ($query->num_rows() >= 1) ? $query->result() : false;
		/**
		if ($query->num_rows() >= 1)
		{
			$results = $query->result();
			foreach ($results as $r)
			{
				$r->nama_pengguna = $r->nama_pengguna .' ('. $this->workload ($r->username).')';
			}
			return $results;
		}
		return false;
		*/
	}
	
		
	function add_user($data)
	{
		$this->db->insert('tbl_login', $data);
	}
	
	function remove($username)
	{
		$this->db->where('username', $username);
		$this->db->delete('tbl_login');
	}
	
	function update ($username, $data)
	{
		$this->db->where('username', $username);
		$this->db->update('tbl_login', $data);
	}
	
	function workload ($username)
	{
		$this->db->select('COUNT(t.id) total', false);
		$this->db->where ('t.outdate', NULL);
		$this->db->where ('t.to', $username);
		$query = $this->db->get ('task t');
		if ($query->num_rows() >= 1)
		{
			$rs = $query->first_row();
			return $rs->total;
		}
		return '0';
	}
	
	function info ($username)
	{
		$query = $this->db->get_where('tbl_login', array ('username' => $username));
		return ($query->num_rows() >= 1) ? $query->first_row() : false;
	}
}
?>