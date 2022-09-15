<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pertanyaan_model extends CI_Model
{
    public function tampil_pertanyaan()
    {
        $query = $this->db->query("SELECT tb_pertanyaan.`id`, tb_pertanyaan.`parent`,  tb_pertanyaan.`pertanyaan`, tb_gejala.`gejala`, COUNT(tb_pertanyaan_detail.`id`) AS total_gejala, tb_gejala.`kode`
                                    FROM tb_pertanyaan 
                                    LEFT JOIN tb_gejala ON tb_pertanyaan.`parent` = tb_gejala.`kode`
                                    LEFT JOIN tb_pertanyaan_detail ON tb_pertanyaan.`id`= tb_pertanyaan_detail.`id_pertanyaan`
                                    GROUP BY tb_pertanyaan.`id`")->result_array();

        return $query;
    }

    public function tambah_pertanyaan($parent, $pertanyaan, $is_last)
    {
        $data = [
            'parent' => $parent,
            'pertanyaan' => $pertanyaan,
            'is_last' => $is_last
        ];

        $this->db->insert('tb_pertanyaan', $data);
    }

    public function hapus_pertanyaan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pertanyaan');
    }

    public function ubah_pertanyaan($id, $pertanyaan, $parent)
    {
        $data = [
            'parent'     => $parent,
            'pertanyaan' => $pertanyaan
        ];
        $this->db->where('id', $id);
        $this->db->update('tb_pertanyaan', $data);
    }

    public function tampil_kode_gejala($id_pertanyaan)
    {
        $query = $this->db->query("SELECT tb_pertanyaan_detail.`id`,tb_pertanyaan_detail.`kode_gejala`, tb_gejala.`gejala` FROM tb_pertanyaan_detail
                                    JOIN tb_gejala ON tb_pertanyaan_detail.`kode_gejala`= tb_gejala.`kode`
                                    WHERE tb_pertanyaan_detail.`id_pertanyaan`= '$id_pertanyaan'")->result_array();

        return $query;
    }

    public function tambah_gejala_pertanyaan_detail($id_pertanyaan, $kode_gejala)
    {
        $data = [
            'id_pertanyaan' => $id_pertanyaan,
            'kode_gejala' => $kode_gejala
        ];
        $this->db->insert('tb_pertanyaan_detail', $data);
    }

    public function pertanyaan_id($id)
    {
        $query = $this->db->get_where('tb_pertanyaan', ['id' => $id]);
        return $query;
    }

    public function hapus_kode_gejala_pertanyaan_detail($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('tb_pertanyaan_detail', $data);
    }

    public function pertanyaan_detail_id($id_pertanyaan_detail)
    {
        $query = $this->db->get_where('tb_pertanyaan_detail', ['id' => $id_pertanyaan_detail]);
        return $query;
    }

    public function total_pertanyaan()
    {
        $query = $this->db->query("SELECT id, COUNT(tb_pertanyaan.`id`) AS total_pertanyaan FROM tb_pertanyaan ");
        return $query;
    }
}
