<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DashboardModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function jumlah_karyawan()
	{
		$this->db->from('karyawan');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function jumlah_pinjaman()
	{
		$this->db->from('pinjam');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function jumlah_absen()
	{
		$this->db->from('absen');
		$this->db->like('absen_date_created', date('Y-m-d'));
		$query = $this->db->get();
		return $query->num_rows();
	}
}
