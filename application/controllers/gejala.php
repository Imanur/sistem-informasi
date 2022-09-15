<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
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
        $data['title'] = "Gejala Penyakit Kulit";

        $data['user'] = $this->auth_model->get_user();

        $data['tampil_gejala'] = $this->gejala_model->tampil_gejala()->result_array();

        $data['tampil'] = $this->admin_model->tampil()->result_array();

        $this->load->view('layout/dash_header', $data);
        $this->load->view('layout/dash_sidebar_admin', $data);
        $this->load->view('layout/dash_topbar', $data);
        $this->load->view('master/master_gejala', $data);
        $this->load->view('layout/dash_footer', $data);
    }

    public function tambah_gejala()
    {
        $kode = $this->input->post('kode');
        $gejala = $this->input->post('gejala');

        if ($kode == '' || $gejala == '') {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf, form tidak boleh kosong!
          </div>');
            redirect('admin/gejala');
        }

        $this->gejala_model->tambah_gejala($kode, $gejala);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat, anda berhasil menambah data!
          </div>');
        redirect('gejala');
    }

    public function ubah_gejala($id)
    {
        $kode = $this->input->post('kode');
        $gejala = $this->input->post('gejala');

        if ($kode == '' || $gejala == '') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf, form tidak boleh kosong!
          </div>');
            redirect('gejala');
        } else {

            $this->gejala_model->ubah_gejala($id, $kode, $gejala);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat, anda berhasil mengubah data!
          </div>');
            redirect('gejala');
        }
    }

    public function hapus_gejala($id)
    {
        $this->gejala_model->hapus_gejala($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat, anda berhasil menghapus data!
          </div>');
        redirect('gejala');
    }
}
