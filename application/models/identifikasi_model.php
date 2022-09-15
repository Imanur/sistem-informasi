<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Identifikasi_model extends CI_Model
{
    public function tambah_data_diri($nama, $jenis_kelamin, $tgl_lahir)
    {

        $data = [
            'id_user'       => $this->session->userdata('id'),
            'nama'          => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'tgl_lahir'     => $tgl_lahir
        ];

        $this->db->insert('tb_identifikasi', $data);

        $last_id = $this->db->insert_id();
        return $last_id;
    }

    public function tampil_data_diri($last_id)
    {

        $query = $this->db->query("SELECT id, nama, jenis_kelamin , TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS usia 
        FROM tb_identifikasi WHERE id = '$last_id'");
        return $query;
    }

    public function id_pengguna($id_pengguna)
    {
        $query = $this->db->get_where('tb_identifikasi', ['id' => $id_pengguna]);
        return $query;
    }

    public function get_question($parent = '', $id_identifikasi = '')
    {
        $pertanyaan = [];
        $dt_gejala = [];
        $is_user   = $this->session->userdata('id');

        // total pertanyaan dengan parent tertentu pada tb_pertanyaan
        $is_jumlah = $this->db->query("SELECT COUNT(*) total 
        FROM tb_pertanyaan
        WHERE parent='$parent' ")->row_array();

        //jika is_jumlah->total ada dan tidak null maka eksekusi, jika tidak return 0
        $jumlah_data = isset($is_jumlah['total']) ? $is_jumlah['total'] : 0;

        //jika jumlah data > 1 (jumlah parent tidak kosong)
        if ($jumlah_data > 1) {

            //semua rule pada tb_rule berdasarkan kolom rule_ke serta di urutkan berdasarkan rule_ke asc
            $gt_rule = $this->db->query("SELECT rule_ke AS rule 
            FROM tb_rule 
            GROUP BY rule_ke
            ORDER BY rule_ke ASC")->result();

            //total proses identifikasi pada tb_pertanyaan_detail di minta berdasarkan id_identifikasi
            $gt_identifikasi_detail = $this->db->query("SELECT COUNT(*) AS total 
            FROM tb_identifikasi_detail
            WHERE id_identifikasi='$id_identifikasi'")->row_array();

            //jika gt_identifikasi_detail->total ada dan tidak null maka eksekusi, jika tidak return 0
            $total_identifikasi_detail = isset($gt_identifikasi_detail['total']) ? $gt_identifikasi_detail['total'] : 0;


            //jika true
            if ($gt_rule) {
                foreach ($gt_rule as $k => $val) {
                    $rule_ke = $val->rule;

                    //penggabungan antara tb_identifikasi detail dengan tb_rule dimana di saring berdasarkan id_identifikasi dan rule_ke
                    $matching_data = $this->db->query("SELECT *, tb_rule.`urutan` FROM tb_identifikasi_detail
                    JOIN (SELECT * FROM tb_rule WHERE rule_ke = '$rule_ke') tb_rule 
                    ON tb_identifikasi_detail.`id_pertanyaan` = tb_rule.`id_pertanyaan` 
                    AND tb_identifikasi_detail.`kode_gejala` = tb_rule.`kode_gejala`
                    WHERE tb_identifikasi_detail.`id_identifikasi` = '$id_identifikasi'")->result_array();

                    //jumlah_match = total matching_data
                    $jumlah_match = count($matching_data);

                    //jika total proses identifikasi detail == total matching data
                    if ($total_identifikasi_detail == $jumlah_match) {
                        //maka

                        $last_index = $jumlah_match - 1;

                        //matching_data
                        $urutan = $matching_data[$last_index]['urutan'];

                        //
                        $next_urutan = $urutan + 1;

                        //pilih semua data pada tb_rule dimana di saring berdasarkan rule_ke dan urutan yang mengikutinya
                        $gt_pertanyaan = $this->db->query("SELECT * FROM tb_rule
                        WHERE rule_ke='$rule_ke'
                        AND urutan='$next_urutan'")->row_array();

                        //jika gt_pertanyaan->id_pertanyaan ada dan tidak null maka eksekusi, jika tidak return string kosong
                        $id_pertanyaan = isset($gt_pertanyaan['id_pertanyaan']) ? $gt_pertanyaan['id_pertanyaan'] : '';

                        //ambil pertanyaan berdasarkan parent dan id_pertanyaan
                        $pertanyaan = $this->db->get_where('tb_pertanyaan', ['parent' => $parent, 'id' => $id_pertanyaan])->row_array();

                        //ambil seluruh data pada tb_pertanyaan_detail dimana dicocokan berdasarkan id_pertanyaan yang sudah di gabungkan antara tb_pertanyaan_detail dengan tb_gejala untuk mengetahui keterangan kode gejala tsb
                        $dt_gejala = $this->db->query("SELECT * FROM tb_pertanyaan_detail 
                        JOIN tb_gejala ON tb_pertanyaan_detail.`kode_gejala` = tb_gejala.`kode`
                        WHERE tb_pertanyaan_detail.`id_pertanyaan`= '$id_pertanyaan'")->result_array();
                    }
                }
            }
        } else {
            //ambil pertanyan pada tb_pertanyaan berdasarkan parent
            $pertanyaan = $this->db->get_where('tb_pertanyaan', ['parent' => $parent])->row_array();

            //jika id pertanyaan ada dan tidak nul maka eksekusi, jika tidak return string kosong
            $id_pertanyaan = isset($pertanyaan['id']) ? $pertanyaan['id'] : '';

            //ambil seluruh data pada tb_pertanyaan_detail dimana dicocokan berdasarkan id_pertanyaan yang sudah di gabungkan antara tb_pertanyaan_detail dengan tb_gejala untuk mengetahui keterangan kode gejala tsb
            $dt_gejala = $this->db->query("SELECT * FROM tb_pertanyaan_detail 
            JOIN tb_gejala ON tb_pertanyaan_detail.`kode_gejala` = tb_gejala.`kode`
            WHERE tb_pertanyaan_detail.`id_pertanyaan`= '$id_pertanyaan'")->result_array();

            if (empty($pertanyaan)) {
                $pertanyaan = [];
                $dt_gejala = [];
            }
        }

        $response = [
            'parent' => $pertanyaan,
            'dt_gejala' => $dt_gejala
        ];

        return $response;
    }

    public function tambah_pertanyaan_selanjutnya($kode_gejala, $last_id, $id_pertanyaan)
    {
        $data = [
            'kode_gejala' => $kode_gejala,
            'id_pertanyaan' => $id_pertanyaan,
            'id_identifikasi' => $last_id,
        ];

        $this->db->insert('tb_identifikasi_detail', $data);
    }

    public function get_hasil_identifikasi($id_identifikasi = '')
    {
        $hasil = '';
        $hasil_rule = 0;

        $gt_identifikasi = $this->db->query("SELECT d.*, p.`is_last`
        FROM tb_identifikasi_detail d
        JOIN tb_pertanyaan p ON d.`id_pertanyaan`=p.`id`
        WHERE d.`id_identifikasi`='$id_identifikasi'")->result_array();
        if ($gt_identifikasi) {
            $total_identifikasi = COUNT($gt_identifikasi);
            $last_index = $total_identifikasi - 1;

            $gt_last_data = $gt_identifikasi[$last_index]['is_last'];
            if ($gt_last_data == 1) {
                $gt_rule = $this->db->query("SELECT rule_ke AS rule 
                FROM tb_rule 
                GROUP BY rule_ke
                ORDER BY rule_ke ASC")->result();

                if ($gt_rule) {
                    foreach ($gt_rule as $val) {
                        $rule_ke = $val->rule;

                        $gt_matching = $this->db->query("SELECT COUNT(*) AS total 
                        FROM tb_identifikasi_detail d 
                        JOIN (
                                SELECT * FROM tb_rule 
                                WHERE rule_ke='$rule_ke'
                        ) r ON d.`id_pertanyaan`=r.`id_pertanyaan` AND d.`kode_gejala`=r.`kode_gejala`
                        WHERE d.`id_identifikasi`='$id_identifikasi' ")->row();
                        $total_match = isset($gt_matching->total) ? $gt_matching->total : 0;

                        if ($total_identifikasi == $total_match) {
                            $hasil_rule = $rule_ke;
                        }
                    }
                }

                if ($hasil_rule != 0) {
                    $gt_penyakit = $this->db->query("SELECT r.`rule_ke`, r.* 
                    FROM tb_rule_penyakit r 
                    -- JOIN tb_penyakit p ON r.`kode_penyakit`=p.`kode`
                    WHERE r.`rule_ke`='$hasil_rule'")->row();

                    $penyakit = isset($gt_penyakit->penyakit) ? $gt_penyakit->penyakit : '';

                    $hasil = '<h5>Jadi, berdasarkan hasil identifikasi anda di diagnosa mengidap penyakit kulit <b>' . $penyakit . " / " . $gt_penyakit->alias . '</b></h5>';
                }
            }
        }


        $response = [
            'hasil' => $hasil
        ];
        return $response;
    }

    public function get_identifikasi()
    {

        $id_user = $this->session->userdata('id');
        $query = $this->db->query("SELECT *,  
        CASE 
                WHEN usia < 6 THEN 'Balita'
                WHEN usia > 5 AND usia < 17 THEN 'Anak - anak'
                ELSE 'Dewasa'
            END AS kategori
    FROM ( SELECT i.*, TIMESTAMPDIFF(YEAR, i.tgl_lahir, CURDATE()) AS usia, 
            GROUP_CONCAT(DISTINCT(g.`gejala`) SEPARATOR ', ') AS gejala, rp.`penyakit`, rp.`alias`, rp.`rule_ke` 
    FROM tb_identifikasi i
    JOIN tb_identifikasi_detail d ON i.`id` = d.`id_identifikasi` 
    JOIN tb_gejala g ON d.`kode_gejala`= g.`kode`
    JOIN tb_rule r ON d.`id_pertanyaan` = r.`id_pertanyaan` AND d.`kode_gejala` = r.`kode_gejala` 
    JOIN tb_rule_penyakit rp ON r.`rule_ke` = rp.`rule_ke`
    WHERE i.`id_user` = $id_user
    GROUP BY i.`id`
    )d")->result_array();

        return $query;
    }

    public function cari_identifikasi()
    {

        $query = $this->db->query("SELECT *,  
        CASE 
                WHEN usia < 6 THEN 'Balita'
                WHEN usia > 5 AND usia < 17 THEN 'Anak - anak'
                ELSE 'Dewasa'
            END AS kategori
    FROM ( SELECT i.*, TIMESTAMPDIFF(YEAR, i.tgl_lahir, CURDATE()) AS usia, 
            GROUP_CONCAT(DISTINCT(g.`gejala`) SEPARATOR ', ') AS gejala, rp.`penyakit`, rp.`alias`, rp.`rule_ke` 
    FROM tb_identifikasi i
    JOIN tb_identifikasi_detail d ON i.`id` = d.`id_identifikasi` 
    JOIN tb_gejala g ON d.`kode_gejala`= g.`kode`
    JOIN tb_rule r ON d.`id_pertanyaan` = r.`id_pertanyaan` AND d.`kode_gejala` = r.`kode_gejala` 
    JOIN tb_rule_penyakit rp ON r.`rule_ke` = rp.`rule_ke`
    GROUP BY i.`id`
    )d")->result_array();

        return $query;
    }
}
