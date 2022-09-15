<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertanyaan extends CI_Controller
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
        $data['title'] = "Pemetaan Pertanyaan";

        $data['pilihan_gejala'] = $this->gejala_model->pilihan_gejala();

        $data['tampil_pertanyaan'] = $this->pertanyaan_model->tampil_pertanyaan();

        $data['tampil'] = $this->admin_model->tampil()->result_array();

        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('layout/dash_header', $data);
        $this->load->view('layout/dash_sidebar_admin', $data);
        $this->load->view('layout/dash_topbar', $data);
        $this->load->view('master/master_pertanyaan', $data);
        $this->load->view('layout/dash_footer', $data);
    }

    public function tambah_pertanyaan()
    {
        $parent     = $this->input->post('parent');
        $pertanyaan = $this->input->post('pertanyaan');
        $is_last    = $this->input->post('is_last');
        $is_last    = ($is_last == 1) ? 1 : 0;


        if ($pertanyaan == '') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf, anda gagal menambah data!
          </div>');
            redirect('pertanyaan');
        }
        $this->pertanyaan_model->tambah_pertanyaan($parent, $pertanyaan, $is_last);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat, anda berhasil menambah data!
          </div>');
        redirect('pertanyaan');
    }

    public function ubah_pertanyaan($id)
    {
        $parent     = $this->input->post('parent');
        $pertanyaan = $this->input->post('pertanyaan');


        if ($pertanyaan == '') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf, anda gagal mengubah data!
          </div>');
            redirect('pertanyaan');
        }
        $this->pertanyaan_model->ubah_pertanyaan($id, $pertanyaan, $parent);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Selamat, anda berhasil mengubah data!
      </div>');
        redirect('pertanyaan');
    }

    public function hapus_pertanyaan($id)
    {
        $this->pertanyaan_model->hapus_pertanyaan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat, anda berhasil menghapus data!
          </div>');
        redirect('pertanyaan');
    }

    public function pertanyaan_detail($id)
    {
        $data['title'] = "Pertanyaan Detail";

        $data['pilihan_gejala'] = $this->gejala_model->pilihan_gejala();

        $data['tampil'] = $this->admin_model->tampil()->result_array();

        $data['tampil_kode_gejala'] = $this->pertanyaan_model->tampil_kode_gejala($id);

        $data['pd'] = $this->pertanyaan_model->pertanyaan_id($id)->row_array();

        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('layout/dash_header', $data);
        $this->load->view('layout/dash_sidebar_admin', $data);
        $this->load->view('layout/dash_topbar', $data);
        $this->load->view('master/master_pertanyaan_detail', $data);
        $this->load->view('layout/dash_footer', $data);
    }

    public function tambah_gejala_pertanyaan_detail()
    {
        $id_pertanyaan = $this->input->post('id_pertanyaan');
        $kode_gejala = $this->input->post('kode_gejala');


        $this->pertanyaan_model->tambah_gejala_pertanyaan_detail($id_pertanyaan, $kode_gejala);

        redirect('pertanyaan/pertanyaan_detail/' . $id_pertanyaan);
    }

    public function hapus_gejala_pertanyaan_detail($id_pertanyaan_detail)
    {
        if ($id_pertanyaan_detail) {
            $data['id'] = $id_pertanyaan_detail;

            $get_pertanyaan = $this->pertanyaan_model->pertanyaan_detail_id($id_pertanyaan_detail)->row_array();

            $id_pertanyaan = $get_pertanyaan['id_pertanyaan'];

            $this->pertanyaan_model->hapus_kode_gejala_pertanyaan_detail($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat, anda berhasil menghapus data!
          </div>');
            redirect('pertanyaan/pertanyaan_detail/' . $id_pertanyaan);
        }
    }
}
