<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PinjamModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_pinjaman()
	{
		$this->db->select('*');
		$this->db->from('pinjam');
		$this->db->join('karyawan', 'karyawan.karyawan_id = pinjam.pinjam_karyawan_id');
		$this->db->order_by('karyawan_date_created', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tambah_pinjaman($data)
	{
		$this->db->insert('pinjam', $data);
		return $this->db->affected_rows();
	}

	public function update_pinjaman($id, $data)
	{
		$this->db->where('pinjam_id', $id);
		$this->db->update('pinjam', $data);
		return $this->db->affected_rows();
	}
}
