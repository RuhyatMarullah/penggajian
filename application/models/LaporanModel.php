<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LaporanModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_laporan($tanggal)
	{
		$this->db->select('*');
		$this->db->from('gaji');
		$this->db->join('karyawan', 'karyawan.karyawan_id = gaji.gaji_karyawan_id');
		$this->db->join('jabatan', 'jabatan.jabatan_id = gaji.gaji_jabatan_id');
		$this->db->like('gaji_bulan', $tanggal);
		// $this->db->order_by('gaji_bulan_ke', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
}
