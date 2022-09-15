<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Cek Penyakit Kulit';

        // $data['tampil_penyakit'] = $this->penyakit_model->tampil_penyakit()->result_array();

        $config = array();
        $config['base_url'] = base_url();
        $config['total_rows'] = $this->penyakit_model->get_count_penyakit();
        $config['per_page'] = 6;
        // $config['uri_segment'] = 1;

        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-end">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        $data['page'] = $this->uri->segment(1) ?? 0;

        $data['links'] = $this->pagination->create_links() ?? "";

        $data['penyakit'] = $this->penyakit_model->get_nilai_penyakit($config['per_page'], $data['page']);

        $this->load->view('layout/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('layout/footer');
    }
}
