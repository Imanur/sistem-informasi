<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit_model extends CI_Model
{

    public function get_penyakit()
    {
        $query = $this->db->get('tb_penyakit');
        return $query;
    }

    public function tampil_penyakit()
    {

        $query = $this->db->query("SELECT DISTINCT kode_penyakit, penyakit, alias 
        FROM tb_rule_penyakit ORDER BY kode_penyakit ASC");
        return $query;
    }

    public function tambah_penyakit($kode, $penyakit)
    {
        $data = [
            'kode'      => $kode,
            'penyakit'  => $penyakit
        ];

        $this->db->insert('tb_penyakit', $data);
    }

    public function ubah_penyakit($id, $kode, $penyakit)
    {
        $data = [
            'id'        => $id,
            'kode'      => $kode,
            'penyakit'  => $penyakit
        ];
        $this->db->where('id', $id);
        $this->db->update('tb_penyakit', $data);
    }

    public function hapus_penyakit($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_penyakit');
    }

    public function total_penyakit()
    {
        $query = $this->db->query("SELECT id, COUNT(tb_penyakit.`id`) AS total_penyakit FROM tb_penyakit ");
        return $query;
    }

    public function get_count_penyakit()
    {
        $count = $this->db->get('tb_rule_penyakit')->num_rows();
        return $count;
    }

    public function get_nilai_penyakit($limit = null, $start = null)
    {
        // $query = $this->db->get('tb_penyakit')->result_array();
        $this->db->distinct();
        $this->db->select('*, GROUP_CONCAT(DISTINCT(tb_gejala.gejala) SEPARATOR ", ") as gejala');
        $this->db->from('tb_rule_penyakit');
        // $this->db->join('tb_rule_penyakit', ' tb_penyakit.kode = tb_rule_penyakit.kode_penyakit');
        $this->db->join('tb_rule', 'tb_rule_penyakit.rule_ke = tb_rule.rule_ke');
        $this->db->join('tb_gejala', 'tb_rule.kode_gejala = tb_gejala.kode');
        $this->db->group_by('tb_rule_penyakit.id');
        $this->db->order_by('tb_rule_penyakit.kode_penyakit');
        $this->db->limit($limit, $start);
        $query = $this->db->get()->result_array();
        // $query = $this->db->query("SELECT DISTINCT p.id`, rp.`kode_penyakit`, rp.`penyakit`, rp.`alias` 
        // FROM tb_penyakit p
        // JOIN tb_rule_penyakit rp ON p.`kode` = rp.`kode_penyakit`
        // ORDER BY rp.`kode_penyakit` ASC LIMIT 0,10")->result_array();
        return $query;
    }
}
