<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

defined('BASEPATH') or exit('No direct script access allowed');

class Gejala_model extends CI_Model
{

    public function tampil_gejala()
    {
        $query = $this->db->get('tb_gejala');
        return $query;
    }

    public function tambah_gejala($kode, $gejala)
    {
        $data = [
            'kode'      => $kode,
            'gejala'    => $gejala
        ];

        $this->db->insert('tb_gejala', $data);
    }

    public function ubah_gejala($id, $kode, $gejala)
    {
        $data = [
            'id'        => $id,
            'kode'      => $kode,
            'gejala'    => $gejala
        ];

        $this->db->where('id', $id);
        $this->db->update('tb_gejala', $data);
    }

    public function hapus_gejala($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_gejala');
    }

    public function pilihan_gejala()
    {
        $gejala = $this->db->get('tb_gejala')->result_array();
        $data = [];

        $data[''] = ' -Pilih Gejala- ';
        foreach ($gejala as $g => $val) {
            $kode_gejala = $val['kode'];
            $data[$kode_gejala] = $val['kode'] . ' - ' . $val['gejala'];
        }
        return $data;
    }

    public function total_gejala()
    {
        $query = $this->db->query("SELECT id, COUNT(tb_gejala.`id`) AS total_gejala FROM tb_gejala");
        return $query;
    }
}
