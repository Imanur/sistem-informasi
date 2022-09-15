<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $data['title'] = "Dashboard";
        // $data = $this->auth_model->set_adm();
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['tampil'] = $this->admin_model->tampil()->result_array();

        $data['total_penyakit'] = $this->penyakit_model->total_penyakit()->row_array();
        $data['total_user'] = $this->admin_model->total_user()->row_array();
        $data['total_gejala'] = $this->gejala_model->total_gejala()->row_array();
        $data['total_pertanyaan'] = $this->pertanyaan_model->total_pertanyaan()->row_array();

        $this->load->view('layout/dash_header', $data);
        $this->load->view('layout/dash_sidebar_admin', $data);
        $this->load->view('layout/dash_topbar', $data);
        $this->load->view('admin/dash_admin', $data);
        $this->load->view('layout/dash_footer', $data);
    }

    public function user()
    {
        $data['title'] = "Management User";

        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['tampil_pengguna'] = $this->admin_model->tampil_pengguna();

        $data['tampil'] = $this->admin_model->tampil()->result_array();

        $this->load->view('layout/dash_header', $data);
        $this->load->view('layout/dash_sidebar_admin', $data);
        $this->load->view('layout/dash_topbar', $data);
        $this->load->view('admin/manajemen_user', $data);
        $this->load->view('layout/dash_footer', $data);
    }

    public function hapus_pengguna($id)
    {
        $this->admin_model->hapus_pengguna($id);
        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        //     Selamat, anda berhasil menghapus data!
        //   </div>');
        redirect('admin/user');
    }

    public function verification($id = '')
    {
        $response = $this->admin_model->process_verif($id);
        if ($response) {
            redirect('admin/user');
        }
    }

    public function unverification($id = '')
    {
        $response = $this->admin_model->process_unverif($id);
        if ($response) {
            redirect('admin/user');
        }
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

    //             if ($old_image != 'default.png') {
    //                 unlink(FCPATH . 'assets/img/' . $old_image);
    //             }
    //             $new_image = $this->upload->data('file_name');
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //             Maaf, anda gagal mengubah data!
    //           </div>');
    //             redirect('admin');
    //         }
    //     }


    //     if ($username == '' && $email == '' && $new_image == '') {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //         Maaf, form tidak boleh kosong!
    //       </div>');
    //         redirect('admin');
    //     } else {


    //         $this->admin_model->ubah_profil($id, $username, $email, $new_image);

    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //         Selamat, anda berhasil mengubah data!
    //       </div>');
    //         redirect('admin');
    //     }
    // }
}
