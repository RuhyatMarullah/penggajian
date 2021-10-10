<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KaryawanController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$model = array('JabatanModel', 'KaryawanModel', 'PenggunaModel');
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
		$data = array(
			'karyawan' => $this->KaryawanModel->lihat_karyawan(),
			'jabatan' => $this->JabatanModel->lihat_jabatan(),
			'title' => 'Karyawan'
		);
		$data['user'] = $this->db->get_where('pengguna', ['pengguna_username' =>
		$this->session->userdata('session_username')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('backend/karyawan/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		if (isset($_POST['simpan'])) {
			$email = $this->input->post('email');
			$password = md5('password');
			$date = date("Y-m-d");
			$nama = $this->input->post('nama');

			$data_pengguna = array(
				'pengguna_username' => $email,
				'pengguna_password' => $password,
				'pengguna_nama' => $nama,
				'pengguna_foto' => 'default.png',
				'hak_akses_id' => 3,
				'pengguna_date_created' => $date
			);

			$save_pengguna = $this->PenggunaModel->tambah_pengguna($data_pengguna);
			$pengguna = $this->PenggunaModel->lihat_satu_pengguna_by_username($email);


			$generate = substr(time(), 5);
			$id = 'PEG-' . $generate;
			$tempatLahir = $this->input->post('tempat_lahir');
			$tanggalLahir = $this->input->post('tanggal_lahir');
			$alamat = $this->input->post('alamat');
			$tanggalGabung = $this->input->post('tanggal_gabung');
			$gajiId = $this->input->post('jabatan');
			$nomorHp = $this->input->post('nomor_hp');
			$nomorRek = $this->input->post('nomor_rekening');

			$this->load->library('ciqrcode');

			$config['cacheable'] = true;
			$config['cachedir'] = 'assets/';
			$config['errorlog'] = 'assets/'; //string, the default is application/logs/
			$config['imagedir'] = 'assets/images/qr_code/'; //direktori penyimpanan qr code
			$config['quality'] = true; //boolean, the default is true
			$config['size'] = '1024'; //interger, the default is 1024
			$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);

			$image_qr = $id . '.png';

			$params['data'] = $id;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_qr;

			$this->ciqrcode->generate($params);



			$data = array(
				'karyawan_id' => $id,
				'karyawan_nama' => $nama,
				'karyawan_tempat_lahir' => $tempatLahir,
				'karyawan_tanggal_lahir' => $tanggalLahir,
				'karyawan_alamat' => $alamat,
				'karyawan_tanggal_gabung' => $tanggalGabung,
				'karyawan_nomor_hp' => $nomorHp,
				'karyawan_no_rekening' => $nomorRek,
				'karyawan_jabatan_id' => $gajiId,
				'karyawan_pengguna_id' => $pengguna['pengguna_id'],
				'karyawan_qrcode' => $image_qr
			);
			$save = $this->KaryawanModel->tambah_karyawan($data);
			if ($save > 0) {
				$this->session->set_flashdata('alert', 'tambah_karyawan');
				redirect('karyawan');
			} else {
				redirect('karyawan');
			}
		}
	}

	public function lihat($id)
	{
		$data = $this->KaryawanModel->lihat_satu_karyawan($id);
		echo json_encode($data);
	}

	public function update()
	{
		if (isset($_POST['update'])) {
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$tempatLahir = $this->input->post('tempat_lahir');
			$tanggalLahir = $this->input->post('tanggal_lahir');
			$alamat = $this->input->post('alamat');
			$tanggalGabung = $this->input->post('tanggal_gabung');
			$gajiId = $this->input->post('jabatan');
			$nomorHp = $this->input->post('nomor_hp');
			$nomorRek = $this->input->post('nomor_rekening');
			$data = array(
				'karyawan_nama' => $nama,
				'karyawan_tempat_lahir' => $tempatLahir,
				'karyawan_tanggal_lahir' => $tanggalLahir,
				'karyawan_alamat' => $alamat,
				'karyawan_tanggal_gabung' => $tanggalGabung,
				'karyawan_nomor_hp' => $nomorHp,
				'karyawan_no_rekening' => $nomorRek,
				'karyawan_jabatan_id' => $gajiId
			);
			$save = $this->KaryawanModel->update_karyawan($id, $data);
			if ($save > 0) {
				$this->session->set_flashdata('alert', 'update_karyawan');
				redirect('karyawan');
			} else {
				redirect('karyawan');
			}
		}
	}

	public function hapus($id)
	{
		$hapus = $this->KaryawanModel->hapus_karyawan($id);
		if ($hapus > 0) {
			$this->session->set_flashdata('alert', 'hapus_karyawan');
			redirect('karyawan');
		} else {
			redirect('karyawan');
		}
	}

	public function ajaxIndex()
	{
		echo json_encode($this->KaryawanModel->lihat_karyawan());
	}
}
