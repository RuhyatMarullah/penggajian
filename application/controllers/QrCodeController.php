<?php

defined('BASEPATH') or exit('No direct script access allowed');

class QrCodeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $model = array('PenggunaModel', 'AbsenModel');
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
        $this->load->view('backend/qr_code/scan', $data);
        $this->load->view('templates/footer');
    }

    public function scan_qr_code()
    {
        $data = array(
            'title' => 'Scan QR-code'
        );
        $data['user'] = $this->db->get_where('pengguna', ['pengguna_username' =>
        $this->session->userdata('session_username')])->row_array();

        $data['hakakses'] = $this->db->get('hak_akses')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('backend/qr_code/scan', $data);
        $this->load->view('templates/footer');
    }
}
