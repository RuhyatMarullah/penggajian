<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PenggunaController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$model = array('PenggunaModel');
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
			'pengguna' => $this->PenggunaModel->lihat_pengguna(),
			'title' => 'Pengguna'
		);
		$data['user'] = $this->db->get_where('pengguna', ['pengguna_username' =>
		$this->session->userdata('session_username')])->row_array();

		$data['hakakses'] = $this->db->get('hak_akses')->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('backend/pengguna/index', $data);
		$this->load->view('templates/footer');
	}

	public function tambah()
	{
		if (isset($_POST['simpan'])) {

			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('username', 'Username', 'required|trim');
			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
				'matches' => 'Password dont match!',
				'min_length' => 'Password too short!'
			]);
			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

			if ($this->form_validation->run() == false) {
				$data = array(
					'pengguna' => $this->PenggunaModel->lihat_pengguna(),
					'title' => 'Pengguna'
				);
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menambahkan User Baru!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('pengguna');
				$this->load->view('templates/header', $data);
				$this->load->view('backend/pengguna/index', $data);
				$this->load->view('templates/footer');
			} else {

				$username = $this->input->post('username');
				$nama = $this->input->post('nama');
				$password = $this->input->post('password1');
				$hakakses = $this->input->post('pengguna_hak_akses');
				//$tanggalGabung = $this->input->post('tanggal_gabung');

				$data = array(
					'pengguna_username' => htmlspecialchars($username),
					'pengguna_nama' => htmlspecialchars($nama),
					'pengguna_foto' => 'default.jpg',
					'pengguna_password' => md5($password),
					'hak_akses_id' => $hakakses,
					'pengguna_date_created' => time()
				);
				$save = $this->PenggunaModel->tambah_pengguna($data);
				if ($save > 0) {
					$this->session->set_flashdata('alert', 'tambah_karyawan');
					redirect('pengguna');
				} else {
					redirect('pengguna');
				}
			}
		}
	}

	public function lihat($id)
	{
		$data = $this->PenggunaModel->lihat_satu_pengguna($id);
		echo json_encode($data);
	}

	public function update()
	{
		if (isset($_POST['update'])) {

			$this->form_validation->set_rules('pengguna_username', 'Pengguna_username', 'required|trim');
			$this->form_validation->set_rules('pengguna_nama', 'Pengguna_nama', 'required|trim');
			// $this->form_validation->set_rules('pengguna_password', 'Passwordbaru1', 'trim|min_length[3]|matches[passwordbaru2]', [
			// 	'matches' => 'Password dont match!',
			// 	'min_length' => 'Password too short!'
			// ]);
			// $this->form_validation->set_rules('passwordbaru2', 'Passwordbaru2', 'trim|matches[passwordbaru1]');

			if ($this->form_validation->run() == false) {
				$data = array(
					'pengguna' => $this->PenggunaModel->lihat_pengguna(),
					'title' => 'Pengguna'
				);
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengupdate Data User!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('pengguna');
				$this->load->view('templates/header', $data);
				$this->load->view('backend/pengguna/index', $data);
				$this->load->view('templates/footer');
			} else {
				$id = $this->input->post('pengguna_id');
				$spengguna = $this->PenggunaModel->lihat_satu_pengguna($id);

				$username = $this->input->post('pengguna_username');
				$nama = $this->input->post('pengguna_nama');
				$hakakses = $this->input->post('pengguna_hak_akses');

				//cek jika ada gambar yang di upload
				// $upload_image = $_FILES['pengguna_foto']['name'];

				// if ($upload_image) {
				// 	$config['allowed_types'] = 'gif|jpg|png';
				// 	$config['max_size']     = '2048';
				// 	$config['upload_path'] = './assets/images/profile/';

				// 	$this->load->library('upload', $config);

				// 	//cek folder asset img, hapus img lama ketika sudah diedit
				// 	if ($this->upload->do_upload('pengguna_foto')) {
				// 		$old_image = $spengguna['pengguna_foto'];
				// 		if ($old_image != 'default.jpg') {
				// 			unlink(FCPATH . './assets/images/profile/' . $old_image);
				// 		}
				// 		//set img baru
				// 		$new_image = $this->upload->data('file_name');
				// 		$this->db->set('pengguna_foto', $new_image);
				// 	} else {
				// 		echo $this->upload->display_errors();
				// 	}
				// }

				if ($this->input->post('pengguna_password') == '') {
					$this->db->set('pengguna_username', htmlspecialchars($username));
					$this->db->set('pengguna_nama', htmlspecialchars($nama));
					$this->db->set('hak_akses_id', $hakakses);
					$this->db->where('pengguna_id', $id);
					$this->db->update('pengguna');
				} else {
					$password = md5($this->input->post('pengguna_password'));

					$this->db->set('pengguna_username', htmlspecialchars($username));
					$this->db->set('pengguna_nama', htmlspecialchars($nama));
					$this->db->set('pengguna_password', $password);
					$this->db->set('hak_akses_id', $hakakses);
					$this->db->where('pengguna_id', $id);
					$this->db->update('pengguna');
				}

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Mengupdate Data User!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('pengguna');
			}
		}
	}

	public function hapus($id)
	{
		$hapus = $this->PenggunaModel->hapus_pengguna($id);
		if ($hapus > 0) {
			$this->session->set_flashdata('alert', 'hapus pengguna');
			redirect('pengguna');
		} else {
			redirect('pengguna');
		}
	}

	public function ajaxIndex()
	{
		echo json_encode($this->PenggunaModel->lihat_satu_pengguna());
	}

	public function profile($id)
	{
		$pengguna = $this->PenggunaModel->lihat_satu_pengguna($id);
		$data = array(
			'pengguna' => $pengguna,
			'title' => 'Pengguna'
		);
		$this->form_validation->set_rules('pengguna_username', 'Pengguna_username', 'required|trim');
		$this->form_validation->set_rules('pengguna_nama', 'Pengguna_nama', 'required|trim');

		$this->load->view('templates/header', $data);
		$this->load->view('backend/profile/index', $data);
		$this->load->view('templates/footer');
	}

	public function update_foto()
	{

		$img = $_FILES['img']['name'];

		if ($img) {

			$config['upload_path'] = './assets/images/profile/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = '10000';


			// $this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('img')) {

				$new_img = $this->upload->data('file_name');
				$this->db->set('pengguna_foto', $new_img);
				$this->db->where('pengguna_id', $this->session->userdata('session_id'));
				$this->db->update('pengguna');
			} else {

				echo $this->upload->display_errors();
				exit;
			}
		} else {
			redirect('profile/' . $this->session->userdata('session_id'));
		}

		$old_img = $this->session->userdata('session_foto');

		if ($old_img != 'default.png') {
			unlink(FCPATH . 'assets/images/profile/' . $old_img);
		}

		$this->session->set_userdata(['session_foto' => $new_img]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile Berhasil Diubah!</div>');
		redirect('profile/' . $this->session->userdata('session_id'));
	}
}
