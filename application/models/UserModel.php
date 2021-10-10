<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KaryawanModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function lihat_karyawan()
	{
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('jabatan', 'jabatan.jabatan_id = karyawan.karyawan_jabatan_id');
		$this->db->order_by('karyawan_date_created', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tambah_karyawan($data)
	{
		$this->db->insert('karyawan', $data);
		return $this->db->affected_rows();
	}

	public function lihat_satu_karyawan($id)
	{
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('jabatan', 'jabatan.jabatan_id = karyawan.karyawan_jabatan_id');
		$this->db->where('karyawan_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function update_karyawan($id, $data)
	{
		$this->db->where('karyawan_id', $id);
		$this->db->update('karyawan', $data);
		return $this->db->affected_rows();
	}

	public function hapus_karyawan($id)
	{
		$this->db->where('karyawan_id', $id);
		$this->db->delete('karyawan');
		return $this->db->affected_rows();
	}
}
