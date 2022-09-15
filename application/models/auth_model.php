<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    // public function regis()
    // {

    //     $data = [
    //         'username'            => $this->input->post('username'),
    //         'password'            => $this->input->post('password'),
    //         'email'               => $this->input->post('email'),
    //         'foto'                => 'default.png',
    //         'is_verification'     => 0,
    //         'is_admin'            => 0
    //     ];

    //     return $this->db->insert('tb_user', $data);
    // }

    public function get_user()
    {
        $username = $this->session->userdata('username');
        $get = $this->db->query("SELECT * FROM tb_user
        WHERE username='$username'")->row_array();



        return $get;
    }
}
