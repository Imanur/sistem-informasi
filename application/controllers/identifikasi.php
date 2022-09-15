<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Identifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek apakah sudah login?
        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['title'] = "Identifikasi Penyakit Kulit";

        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['tampil'] = $this->admin_model->tampil()->result_array();

        $this->load->view('layout/dash_header', $data);
        $this->load->view('layout/dash_sidebar_admin', $data);
        $this->load->view('layout/dash_topbar', $data);
        $this->load->view('master/master_identifikasi', $data);
        $this->load->view('layout/dash_footer', $data);
    }

    public function tambah()
    {
        $nama           = $this->input->post('nama');
        $jenis_kelamin  = $this->input->post('jenis_kelamin');
        $tgl_lahir      = $this->input->post('tgl_lahir');


        $last_id = $this->identifikasi_model->tambah_data_diri($nama, $jenis_kelamin, $tgl_lahir);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Selamat, anda berhasil menambah data!
      </div>');
        redirect('identifikasi/tampil_data_diri?id=' . $last_id . '&p=');
    }

    public function tampil_data_diri()
    {
        $last_id = $this->input->get('id', TRUE);
        $parent = $this->input->get('p', TRUE);

        $data['title'] = "Identifikasi Penyakit Kulit";

        $data['tampil'] = $this->admin_model->tampil()->result_array();

        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['tp'] = $this->identifikasi_model->tampil_data_diri($last_id)->row_array();

        $data['arr_data'] = $this->identifikasi_model->get_question($parent, $last_id);

        $data['id_identifikasi'] = $last_id;

        $data['hasil'] = $this->identifikasi_model->get_hasil_identifikasi($last_id);

        $this->load->view('layout/dash_header', $data);
        $this->load->view('layout/dash_sidebar_admin', $data);
        $this->load->view('layout/dash_topbar', $data);
        $this->load->view('master/master_identifikasi_detail', $data);
        $this->load->view('layout/dash_footer', $data);
    }

    public function tambah_pertanyaan()
    {
        $kode_gejala = $this->input->post('kode_gejala');
        $id_pertanyaan = $this->input->post('id_pertanyaan');
        $last_id = $this->input->post('id_identifikasi');

        $this->identifikasi_model->tambah_pertanyaan_selanjutnya($kode_gejala, $last_id, $id_pertanyaan);


        redirect('identifikasi/tampil_data_diri?id=' . $last_id . '&p=' . $kode_gejala);
    }


    public function history_identifikasi()
    {
        $data['title'] = "Riwayat Identifikasi Penyakit Kulit";

        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['tampil'] = $this->admin_model->tampil()->result_array();

        $data['history_identifikasi'] = $this->identifikasi_model->cari_identifikasi();

        $this->load->view('layout/dash_header', $data);
        $this->load->view('layout/dash_sidebar_admin', $data);
        $this->load->view('layout/dash_topbar', $data);
        $this->load->view('master/master_history_identifikasi', $data);
        $this->load->view('layout/dash_footer', $data);
    }
}
