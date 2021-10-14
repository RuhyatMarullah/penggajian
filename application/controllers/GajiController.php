<?php

defined('BASEPATH') or exit('No direct script access allowed');

class GajiController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('GajiModel', 'PinjamModel', 'KaryawanModel', 'AbsenModel');
		$helper = array('tgl_indo', 'nominal');
		$this->load->model($model);
		$this->load->helper($helper);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$data = array(
			'gaji' => $this->GajiModel->lihat_gaji(),
			'title' => 'Gaji'
		);
		$data['user'] = $this->db->get_where('pengguna', ['pengguna_username' =>
		$this->session->userdata('session_username')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('backend/gaji/index', $data);
		$this->load->view('templates/footer');
	}

	public function detail($id)
	{
		$data = array(
			'karyawan' => $this->KaryawanModel->lihat_satu_karyawan($id),
			'gaji' => $this->GajiModel->lihat_gaji_perorang($id),
			'title' => 'Gaji',
			'user' => $this->db->get_where('pengguna', ['hak_akses_id' =>
			2])->row_array(),
		);

		// echo json_encode($data);
		// exit;
		$data['user'] = $this->db->get_where('pengguna', ['pengguna_username' =>
		$this->session->userdata('session_username')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('backend/gaji/detail', $data);
		$this->load->view('templates/footer');
	}

	public function lihat($id)
	{
		$data = $this->GajiModel->lihat_satu_gaji_by_id($id);
		echo json_encode($data);
	}

	public function pinjam($id)
	{
		$data = $this->GajiModel->lihat_satu_gaji_pinjam($id);
		echo json_encode($data);
	}

	public function bayar()
	{
		$generate = substr(time(), 5);
		$karyawan_id = $this->input->post('gaji_karyawan_id');
		$jabatan_id = $this->input->post('gaji_jabatan_id');
		$bulan = $this->input->post('gaji_tgl');
		$absen = $this->AbsenModel->jumlah_absen($karyawan_id, $bulan);
		$id = 'GAJ-' . $generate;

		$data = array(
			'gaji_id' => $id,
			'gaji_karyawan_id' => $karyawan_id,
			'gaji_jabatan_id' => $jabatan_id,
			'gaji_total_absen' => $absen,
			'gaji_bulan' => $bulan,
		);

		$return = $this->GajiModel->tambah_gaji($data);
		if ($return > 0) {
			$this->session->set_flashdata('alert', 'tambah_gaji');
			redirect('gaji/detail/' . $karyawan_id);
		} else {
			redirect('gaji/detail/' . $karyawan_id);
		}
	}
}
