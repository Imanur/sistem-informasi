<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
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

        $data['title'] = "Penyakit Kulit";

        $data['user'] = $this->auth_model->get_user();

        $data['tampil_penyakit'] = $this->penyakit_model->get_penyakit()->result_array();

        $data['tampil'] = $this->admin_model->tampil()->result_array();

        $this->load->view('layout/dash_header', $data);
        $this->load->view('layout/dash_sidebar_admin', $data);
        $this->load->view('layout/dash_topbar', $data);
        $this->load->view('master/master_penyakit', $data);
        $this->load->view('layout/dash_footer', $data);
    }

    public function tambah_penyakit()
    {
        $kode = $this->input->post('kode');
        $penyakit = $this->input->post('penyakit');

        if ($kode == '' || $penyakit == '') {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf, form tidak boleh kosong!
          </div>');
            redirect('penyakit');
        }

        $this->penyakit_model->tambah_penyakit($kode, $penyakit);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat anda berhasil menambah data!
          </div>');
        redirect('penyakit');
    }

    public function ubah_penyakit($id)
    {
        $kode = $this->input->post('kode');
        $penyakit = $this->input->post('penyakit');

        if ($kode == '' || $penyakit == '') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf, form tidak boleh kosong!
          </div>');
            redirect('penyakit');
        } else {

            $this->penyakit_model->ubah_penyakit($id, $kode, $penyakit);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat, anda berhasil mengubah data!
          </div>');
            redirect('penyakit');
        }
    }

    public function hapus_penyakit($id)
    {

        $this->penyakit_model->hapus_penyakit($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat, anda berhasil menghapus data!
          </div>');
        redirect('penyakit');
    }
}
