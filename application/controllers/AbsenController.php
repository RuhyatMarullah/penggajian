<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AbsenController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('KaryawanModel', 'AbsenModel', 'GajiModel');
		$helper = array('tgl_indo_helper');
		$this->load->model($model);
		$this->load->helper($helper);
		if (!$this->session->has_userdata('session_id')) {
			$this->session->set_flashdata('alert', 'belum_login');
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		if ($this->session->userdata('session_hak_akses') == 'karyawan') {
			$karyawan = $this->KaryawanModel->get_karyawan_by_pengguna($this->session->userdata('session_id'));

			$this->db->select('*');
			$this->db->from('absen');
			$this->db->join('karyawan', 'karyawan.karyawan_id = absen.absen_karyawan_id');
			$this->db->order_by('absen_date_created', 'DESC');
			$this->db->where('absen_karyawan_id', $karyawan['karyawan_id']);
			$query = $this->db->get();

			$data = array(
				'absen' => $query->result_array(),
				// 'karyawan' => json_encode($this->KaryawanModel->lihat_karyawan()),
				'title' => 'Absen'
			);
		} else {
			$data = array(
				'absen' => $this->AbsenModel->lihat_absen(),
				// 'karyawan' => json_encode($this->KaryawanModel->lihat_karyawan()),
				'title' => 'Absen'
			);
		}

		$data['user'] = $this->db->get_where('pengguna', ['pengguna_username' =>
		$this->session->userdata('session_username')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('backend/absen/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah($id)
	{
		$generate = substr(time(), 5);
		$id_genarate = 'ABS-' . $generate;
		$tgl = date("Y-m");
		$tgl_cek = date("Y-m-d");
		$cek_id = $this->KaryawanModel->lihat_satu_karyawan($id);
		if ($cek_id != null) {
			$cek_sudah_absen = $this->AbsenModel->cek_absen($id, $tgl_cek);
			if ($cek_sudah_absen == null) {
				$data = array(
					'absen_id' => $id_genarate,
					'absen_karyawan_id' => $id,
					'absen_tanggal' => $tgl_cek,
					'absen_bulan' => $tgl,
				);
				$this->AbsenModel->tambah_absen($data);

				$return =  array(
					'status' => 200,
					'pesan' => 'Absen berhasil!',
				);
				echo json_encode($return);
			} else {
				$return =  array(
					'status' => 300,
					'pesan' => 'Anda sudah absen!',
				);
				echo json_encode($return);
			}
		} else {
			$return =  array(
				'status' => 400,
				'pesan' => 'Data karyawan tidak di temukan!',
			);
			echo json_encode($return);
		}
	}

	public function lembur($id)
	{
		$dataAbsen = array(
			'absen_status' => 'lembur'
		);

		$updateAbsen = $this->AbsenModel->update_absen($id, $dataAbsen);
		if ($updateAbsen > 0) {
			$cekAbsen = $this->AbsenModel->lihat_satu_absen($id);

			$gaji = $this->GajiModel->lihat_satu_gaji($cekAbsen['karyawan_id']);
			$gajiId = $gaji['gaji_id'];
			$gajiLembur = $gaji['gaji_lembur'];
			$gajiLembur = $gajiLembur + $gaji['jabatan_gaji'];
			$dataGaji = array(
				'gaji_lembur' => $gajiLembur
			);
			$updateGaji = $this->GajiModel->update_gaji($gajiId, $dataGaji);

			$this->session->set_flashdata('alert', 'update_absen');
			redirect('absen');
		} else {
			redirect('absen');
		}
	}
}
