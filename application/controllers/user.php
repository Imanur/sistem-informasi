<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }
    }
    public function index()
    {

        $data['title'] = "Dashboard";

        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('layout/dash_header', $data);
        $this->load->view('layout/dash_sidebar_user', $data);
        $this->load->view('layout/dash_topbar_user', $data);
        $this->load->view('user/dash_user', $data);
        $this->load->view('layout/dash_footer_user', $data);
    }

    // public function Edit($username)
    // {
    //     $data = [
    //         'username' => $username
    //     ];

    //     $this->user_model->edit_profile('tb_user', $data);

    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //         Selamat, anda berhasil mengubah profil
    //       </div>');
    //     redirect('user');
    // }

    public function diagnose()
    {
        $data['title'] = "Identifikasi Penyakit Kulit";

        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('layout/dash_header', $data);
        $this->load->view('layout/dash_sidebar_user', $data);
        $this->load->view('layout/dash_topbar_user', $data);
        $this->load->view('user/diagnosa', $data);
        $this->load->view('layout/dash_footer_user', $data);
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
        redirect('user/tampil_data_diri?id=' . $last_id . '&p=');
    }

    public function tampil_data_diri()
    {
        $last_id = $this->input->get('id', TRUE);
        $parent = $this->input->get('p', TRUE);

        $data['title'] = "Identifikasi Penyakit";

        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['tp'] = $this->identifikasi_model->tampil_data_diri($last_id)->row_array();

        $data['arr_data'] = $this->identifikasi_model->get_question($parent, $last_id);

        $data['id_identifikasi'] = $last_id;

        $data['hasil'] = $this->identifikasi_model->get_hasil_identifikasi($last_id);

        $this->load->view('layout/dash_header', $data);
        $this->load->view('layout/dash_sidebar_user', $data);
        $this->load->view('layout/dash_topbar_user', $data);
        $this->load->view('user/identifikasi_detail', $data);
        $this->load->view('layout/dash_footer_user');
    }

    public function tambah_pertanyaan()
    {
        $kode_gejala = $this->input->post('kode_gejala');
        $id_pertanyaan = $this->input->post('id_pertanyaan');
        $last_id = $this->input->post('id_identifikasi');

        $this->identifikasi_model->tambah_pertanyaan_selanjutnya($kode_gejala, $last_id, $id_pertanyaan);
        redirect('user/tampil_data_diri?id=' . $last_id . '&p=' . $kode_gejala);
    }

    // public function edit($id)
    // {
    //     $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

    //     $email = $this->input->post("email");
    //     $username = $this->input->post("username");
    //     $upload_image = $_FILES['foto'];

    //     if ($upload_image) {
    //         $config['allowed_types'] = 'jpeg|jpg|png';
    //         $config['max_size']      = '4096';
    //         $config['upload_path']   = './assets/img/';

    //         $this->load->library('upload', $config);

    //         if ($this->upload->do_upload('foto')) {
    //             $old_image = $data['user']['foto'];

    //             if ($old_image !== 'default.png') {
    //                 unlink(FCPATH . 'assets/img/' . $old_image);
    //             }
    //             $new_image = $this->upload->data('file_name');
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //             Maaf, anda gagal mengubah data!
    //           </div>');
    //             redirect('user');
    //         }
    //     }


    //     if ($username == '' && $email == '' && $new_image == '') {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //         Maaf, form tidak boleh kosong!
    //       </div>');
    //         redirect('user');
    //     } else {


    //         $this->admin_model->ubah_profil($id, $username, $email, $new_image);

    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //         Selamat, anda berhasil mengubah data!
    //       </div>');
    //         redirect('user');
    //     }
    // }

    public function riwayat_identifikasi()
    {
        $data['title'] = "Riwayat Identifikasi";

        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['history_identifikasi'] = $this->identifikasi_model->get_identifikasi();

        $this->load->view('layout/dash_header', $data);
        $this->load->view('layout/dash_sidebar_user', $data);
        $this->load->view('layout/dash_topbar_user', $data);
        $this->load->view('user/history_identifikasi', $data);
        $this->load->view('layout/dash_footer_user', $data);
    }
}
