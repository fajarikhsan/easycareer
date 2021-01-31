<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Timeline extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Timeline_model');
    }

    public function index() {
        $data['judul'] = 'Timeline';
        $data['data_jasa'] = $this->Timeline_model->getAllDataJasa();
        $data['profesi'] = $this->Timeline_model->getAllProfesi();
        $this->load->view('templates/header', $data);
        $this->load->view('timeline/index',$data);
        $this->load->view('templates/modal');
        $this->load->view('templates/footer');
    }
    
    public function detail($id, $prof) {
        $data['judul'] = 'Detail';
        $data['data_user'] = $this->Timeline_model->getJasaByIdPenyedia($id, $prof);
        $data['profesi'] = $this->Timeline_model->getPenyediaByIdJasa($prof);
        $data['rating'] = $this->Timeline_model->getRatingByIdJasa($id);
        $data['avg'] = $this->Timeline_model->getAvgRating($id);
        $this->load->view('templates/header', $data);
        $this->load->view('timeline/detail',$data);
        $this->load->view('templates/modal');
        $this->load->view('templates/footer');
    }
    
    public function cekSession($url, $id) {
        if ( !$this->session->has_userdata('id_customer') ) {
            $this->session->set_flashdata('pesan-login', 'Harap login');
            redirect(base_url('timeline/detail/' . $url . '/' . $id)); die;
        }
    }
    
    public function filter() {
        $this->Timeline_model->getJasaById();
    }

    public function cari() {
        $this->Timeline_model->getCari();
    }

    public function pesan() {
        $url = $this->input->post('url');
        $id = $this->input->post('id-penyedia');
        $this->cekSession($url, $id);
        $data['judul'] = 'Detail';
        $data['data_user'] = $this->Timeline_model->getJasaByIdPenyedia($url, $id);
        $data['profesi'] = $this->Timeline_model->getPenyediaByIdJasa($id);
        $data['rating'] = $this->Timeline_model->getRatingByIdJasa($url);
        $data['avg'] = $this->Timeline_model->getAvgRating($url);

        $this->form_validation->set_rules('detail-pekerjaan', 'Detail pekerjaan', 'required');

        if ( $this->form_validation->run() == FALSE ) {
            // INVALID
            $this->session->set_tempdata('detail-kosong', 'Detail pekerjaan', 1);
            $this->load->view('templates/header', $data);
            $this->load->view('timeline/detail', $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        } else {
            // VALID
            $this->session->set_flashdata('pesan-berhasil', 'Pesanan');
            $this->Timeline_model->tambahTransaksi();
            redirect(base_url('profile/transaksi'));
        }
    }

    public function filter_rating() {
        $this->Timeline_model->getRatingByValue();
    }
}