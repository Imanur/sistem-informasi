<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Auth extends CI_Controller
{
    public function login()
    {
        //set rules login
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Kata sandi tidak cocok!',
        ]);


        //cek jika gagal?
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Login';
            $this->load->view('layout/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('layout/auth_footer');
        } else {
            //validasi sukses

            //ambil inputan email dan password
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

            //usernya ada
            if ($user) {
                if ($user['is_verification'] == 1) {

                    // print_r($user['username']);
                    // exit;
                    //cek password
                    if ($password === $user['password']) {

                        // print_r($user['password']);
                        // exit;
                        $data = [
                            'id'    => $user['id'],
                            'username' => $user['username'],
                            'is_admin' => $user['is_admin']
                        ];

                        //set data session saat login
                        $this->session->set_userdata($data);

                        //set role admin dan user
                        if ($user['is_admin'] == 1) {
                            redirect('admin');
                        } else {
                            redirect('user');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                         Maaf, kata sandi anda salah!
                        </div>');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                         Maaf, akun anda belum di aktivasi. Silahkan cek email untuk aktivasi akun!
                    </div>');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf, nama pengguna anda belum terdaftar!
          </div>');
            }
            redirect('auth/login');
        }
    }


    public function register()
    {
        //set rules regis
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.username]', [
            'is_unique' => 'Maaf, nama pengguna sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('rpassword', 'Password', 'required|trim|matches[password]', [
            'matches' => 'Kata sandi tidak cocok!',
            'min_length' => 'Kata sandi terlalu pendek, minimal 4 karakter!'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[rpassword]|is_unique[tb_user.password]', [
            'matches' => 'Kata sandi tidak cocok!',
            'min_length' => 'Kata sandi terlalu pendek, minimal 4 karakter!',
            'is_unique' => 'Maaf, kata sandi sudah terdaftar!'
        ]);

        //cek jika gagal?
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Register';
            $this->load->view('layout/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('layout/auth_footer');
        } else {

            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $data = [
                'username'            => $username,
                'password'            => $this->input->post('password'),
                'email'               => $email,
                'foto'                => 'default.png',
                'is_verification'     => 0,
                'is_admin'            => 0
            ];


            //siapkan token
            // $token = base64_encode(random_bytes(32));
            // $user_token = [
            //     'username' => $username,
            //     'token' => $token
            // ];
            //validasi sukses
            $this->db->insert('tb_user', $data);

            // $this->db->insert('tb_user_token', $user_token);

            $this->sendMail();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat, anda berhasil membuat akun. Silahkan cek email anda untuk aktivasi akun!
          </div>');
            redirect('auth/register');
        }
    }

    private function sendMail()
    {

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'interviewidview@gmail.com',
            'smtp_pass' => 'qlvfdqyqiodzrjnc',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email');
        $this->email->initialize($config);

        $this->email->from('interviewidview@gmail.com', 'Interviewer');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Aktivasi Akun Pengguna');
        $this->email->message('<div class="alert alert-success" role="alert">
        Silahkan aktivasi akun dengan klik link berikut : <a href="' . base_url() . 'auth/verify?username=' . $this->input->post('username') .  '">Aktivasi<a/>
      </div>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $username = $this->input->get('username');
        // $token = $this->input->get('token');

        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();
        $is_verif = $this->db->get_where('tb_user', ['is_verification' => 0])->row_array();

        if ($user) {
            // $user_token = $this->db->get_where('tb_user_token', ['token' => $token])->row_array();

            // print_r($user_token);
            // exit;

            if ($is_verif == true) {

                $this->db->set('is_verification', 1);
                $this->db->where('username', $username);
                $this->db->update('tb_user');
                // $this->db->delete('tb_user_token', ['username' => $username]);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Selamat, akun anda berhasil di aktivasi. Silahkan masuk.
              </div>');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Maaf, aktivasi akun gagal karena token tidak sesuai!
              </div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Maaf, aktivasi akun gagal karena email tidak terdaftar!
          </div>');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        //hapus userdata email dan is_admin di session
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('is_admin');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat, anda berhasil keluar!
          </div>');
        redirect('auth/login');
    }
}
