<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function edit_profile($data, $table)
    {
        $this->db->where('username', $data['username']);
        $this->db->update($table, $data);
    }
}
