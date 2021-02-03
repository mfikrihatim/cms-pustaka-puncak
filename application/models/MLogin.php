<?php
class MLogin extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function GoLogin($username, $password)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$row = $query->row();
			$this->load->library('session');
			$this->session->set_userdata('id_user', $row->id_user);
			$this->session->set_userdata('nama', $row->nama);
			$this->session->set_userdata('foto_profile', $row->foto_profile);
			return $row->id_user;
		} else {
			return false;
		}
	}
}
