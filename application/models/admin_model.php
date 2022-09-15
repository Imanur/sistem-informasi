<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{


    public function tampil_pengguna()
    {
        $query = $this->db->get_where('tb_user', ['is_admin' => 0])->result_array();
        return $query;
    }


    public function hapus_pengguna($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_user');
    }

    public function process_verif($id)
    {
        $data = [
            'is_verification' => 1
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_user', $data);

        $is_success = $this->db->affected_rows();

        if ($is_success) {
            return true;
        } else {
            return false;
        }
    }

    public function process_unverif($id)
    {
        $data = [
            'is_verification' => 0
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_user', $data);

        $is_success = $this->db->affected_rows();
        if ($is_success) {
            return true;
        } else {
            return false;
        }
    }

    public function tampil()
    {
        $query = $this->db->get('tb_user');
        return $query;
    }

    public function ubah_profil($id, $username, $email, $new_image)
    {
        $data = [
            'email' => $email,
            'username' => $username,
            'foto' => $new_image,
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_user', $data);
    }

    public function total_user()
    {
        $query = $this->db->query("SELECT id, COUNT(tb_user.`id`) AS total_user FROM tb_user WHERE is_verification  IN(1,0) AND is_admin IN(0)");
        return $query;
    }
}
