<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PenggunaModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function get_user_account($user)
	{
		$this->db->select('*');
		$this->db->join('hak_akses', 'hak_akses.hak_akses_id = pengguna.hak_akses_id');
		$query = $this->db->get_where('pengguna', $user);
		return $query->row_array();

		// $query = $this->db->get_where('pengguna',$user);
		// return $query->row_array();
	}

	public function lihat_pengguna()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->join('hak_akses', 'hak_akses.hak_akses_id = pengguna.hak_akses_id');
		$this->db->order_by('pengguna_date_created', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	// public function ambil_hakakses(){
	// 	$this->db->select('*');
	// 	$this->db->from('pengguna');
	// 	$this->db->group_by('pengguna_hak_akses');
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	public function lihat_satu_pengguna($id)
	{
		$this->db->where('pengguna_id', $id);
		$this->db->join('karyawan', 'pengguna.pengguna_id = karyawan.karyawan_pengguna_id', 'left');
		$query = $this->db->get('pengguna');
		return $query->row_array();
	}

	public function lihat_satu_pengguna_by_username($username)
	{
		$this->db->where('pengguna_username', $username);
		$query = $this->db->get('pengguna');
		return $query->row_array();
	}

	public function tambah_pengguna($data)
	{
		$this->db->insert('pengguna', $data);
		return $this->db->affected_rows();
	}

	public function update_pengguna($id, $data)
	{
		$this->db->where('pengguna_id', $id);
		$this->db->update('pengguna', $data);
		return $this->db->affected_rows();
	}


	public function hapus_pengguna($id)
	{
		$this->db->where('pengguna_id', $id);
		$this->db->delete('pengguna');
		return $this->db->affected_rows();
	}

	public function lihat_manajer()
	{
		$this->db->where('hak_akses_id', 2);
		$query = $this->db->get('pengguna');
		return $query->row_array();
	}
}
